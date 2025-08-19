<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\VetDetails;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Show the appointment booking form
     */
    public function index()
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing');
        }

        // Get available vets for the dropdown
        $vets = VetDetails::where('status', 'approved')
            ->orderBy('name')
            ->get();

        // Get user information
        $user = null;
        if (session('user_id')) {
            $user = AppUser::find(session('user_id'));
        }

        return view('book_appointment', compact('vets', 'user'));
    }

    /**
     * Store a new appointment
     */
    public function store(Request $request)
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing');
        }

        $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',
            'owner_email' => 'nullable|email|max:255',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'pet_age' => 'nullable|string|max:50',
            'pet_breed' => 'nullable|string|max:255',
            'service_type' => 'required|string',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required',
            'urgency_level' => 'required|in:routine,urgent,emergency',
            'symptoms' => 'nullable|string|max:1000',
            'additional_notes' => 'nullable|string|max:1000',
            'vet_id' => 'nullable|exists:vet_details,id'
        ]);

        // Create the appointment
        $appointment = Appointment::create([
            'user_id' => session('user_id'),
            'vet_id' => $request->vet_id,
            'appointment_number' => Appointment::generateAppointmentNumber(),
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email ?? session('user_email'),
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'pet_age' => $request->pet_age,
            'pet_breed' => $request->pet_breed,
            'service_type' => $request->service_type,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'urgency_level' => $request->urgency_level,
            'symptoms' => $request->symptoms,
            'additional_notes' => $request->additional_notes,
            'status' => 'pending',
            'estimated_cost' => $this->getEstimatedCost($request->service_type, $request->vet_id)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment booked successfully!',
            'appointment_number' => $appointment->appointment_number,
            'data' => $appointment->load('vet')
        ]);
    }

    /**
     * Get user's appointments
     */
    public function getUserAppointments()
    {
        if (!session('user_authenticated') || !session('user_id')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $appointments = Appointment::with('vet')
            ->where('user_id', session('user_id'))
            ->orderBy('preferred_date', 'desc')
            ->orderBy('preferred_time', 'desc')
            ->get();

        return response()->json($appointments);
    }

    /**
     * Get vet's appointments
     */
    public function getVetAppointments($vetId)
    {
        if (!session('user_authenticated')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $appointments = Appointment::with('user')
            ->where('vet_id', $vetId)
            ->orderBy('preferred_date', 'desc')
            ->orderBy('preferred_time', 'desc')
            ->get();

        return response()->json($appointments);
    }

    /**
     * Update appointment status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed,no_show',
            'assigned_time' => 'nullable',
            'final_cost' => 'nullable|numeric|min:0'
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'status' => $request->status,
            'assigned_time' => $request->assigned_time,
            'final_cost' => $request->final_cost,
            'confirmed_at' => $request->status === 'confirmed' ? now() : null
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment status updated successfully!',
            'data' => $appointment->load('vet', 'user')
        ]);
    }

    /**
     * Cancel appointment
     */
    public function cancel($id)
    {
        if (!session('user_authenticated')) {
            return redirect('/landing');
        }

        $appointment = Appointment::findOrFail($id);

        // Check if user owns the appointment or is admin
        if ($appointment->user_id != session('user_id') && !session('admin_authenticated')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if (!$appointment->canBeCancelled()) {
            return response()->json(['error' => 'This appointment cannot be cancelled'], 400);
        }

        $appointment->update(['status' => 'cancelled']);

        return response()->json([
            'success' => true,
            'message' => 'Appointment cancelled successfully!'
        ]);
    }

    /**
     * Get available time slots for a specific date and vet
     */
    public function getAvailableSlots(Request $request)
    {
        // Return basic time slots - no complex logic for now
        $timeSlots = [
            '09:00' => '9:00 AM',
            '10:00' => '10:00 AM',
            '11:00' => '11:00 AM',
            '12:00' => '12:00 PM',
            '14:00' => '2:00 PM',
            '15:00' => '3:00 PM',
            '16:00' => '4:00 PM',
            '17:00' => '5:00 PM',
            '18:00' => '6:00 PM'
        ];
        
        return response()->json($timeSlots);
    }

    /**
     * Get estimated cost for service
     */
    private function getEstimatedCost($serviceType, $vetId = null)
    {
        $baseCosts = [
            'general-checkup' => 1500,
            'vaccination' => 800,
            'surgery' => 5000,
            'grooming' => 2000,
            'emergency' => 2500,
            'dental' => 3000,
            'skin-treatment' => 2200
        ];

        $baseCost = $baseCosts[$serviceType] ?? 1500;

        // If vet is specified, use their pricing
        if ($vetId) {
            $vet = VetDetails::find($vetId);
            if ($vet) {
                if ($serviceType === 'general-checkup' && $vet->general_price) {
                    return $vet->general_price;
                }
                if ($serviceType === 'surgery' && $vet->surgery_price_min) {
                    return $vet->surgery_price_min;
                }
            }
        }

        return $baseCost;
    }
}
