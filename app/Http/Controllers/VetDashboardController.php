<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetDetails;

class VetDashboardController extends Controller
{
    /**
     * Show the vet dashboard
     */
    public function index()
    {
        // Check if user is authenticated
        if (!session('user_authenticated') || session('user_role') !== 'vet') {
            return redirect('/landing');
        }

        $userEmail = session('user_email');
        $userId = session('user_id');
        
        // Get vet application status
        $vetApplication = VetDetails::where('user_email', $userEmail)
            ->orWhere('user_id', $userId)
            ->first();

        // Get vet's appointments if approved
        $appointments = collect();
        $upcomingAppointments = collect();
        $todayAppointments = collect();
        
        // Additional statistics
        $thisWeekAppointments = collect();
        $thisMonthAppointments = collect();
        $completedAppointments = collect();
        $cancelledAppointments = collect();
        
        if ($vetApplication && $vetApplication->status === 'approved') {
            $appointments = \App\Models\Appointment::with('user')
                ->where('vet_id', $vetApplication->id)
                ->orderBy('preferred_date', 'desc')
                ->orderBy('preferred_time', 'desc')
                ->get();
                
            $upcomingAppointments = \App\Models\Appointment::with('user')
                ->where('vet_id', $vetApplication->id)
                ->where('preferred_date', '>=', today())
                ->whereIn('status', ['pending', 'confirmed'])
                ->orderBy('preferred_date', 'asc')
                ->orderBy('preferred_time', 'asc')
                ->get();
                
            $todayAppointments = \App\Models\Appointment::with('user')
                ->where('vet_id', $vetApplication->id)
                ->whereDate('preferred_date', today())
                ->whereIn('status', ['pending', 'confirmed'])
                ->orderBy('preferred_time', 'asc')
                ->get();
                
            // Additional statistics for enhanced dashboard
            $thisWeekAppointments = \App\Models\Appointment::where('vet_id', $vetApplication->id)
                ->whereBetween('preferred_date', [now()->startOfWeek(), now()->endOfWeek()])
                ->get();
                
            $thisMonthAppointments = \App\Models\Appointment::where('vet_id', $vetApplication->id)
                ->whereMonth('preferred_date', now()->month)
                ->whereYear('preferred_date', now()->year)
                ->get();
                
            $completedAppointments = \App\Models\Appointment::where('vet_id', $vetApplication->id)
                ->where('status', 'completed')
                ->get();
                
            $cancelledAppointments = \App\Models\Appointment::where('vet_id', $vetApplication->id)
                ->where('status', 'cancelled')
                ->get();
        }

        return view('vet_dashboard', compact(
            'vetApplication', 
            'appointments', 
            'upcomingAppointments', 
            'todayAppointments',
            'thisWeekAppointments',
            'thisMonthAppointments', 
            'completedAppointments',
            'cancelledAppointments'
        ));
    }
}
