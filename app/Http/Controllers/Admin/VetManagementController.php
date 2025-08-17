<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VetDetails;
use Illuminate\Support\Facades\Storage;

class VetManagementController extends Controller
{
    public function index()
    {
        $vets = VetDetails::orderBy('created_at', 'desc')->get();
        return view('admin_vet_management', compact('vets'));
    }

    public function create()
    {
        return view('admin_add_vet');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'role' => 'required|in:general_checkup,surgery,both',
            'general_price' => 'nullable|numeric|min:0',
            'surgery_price_min' => 'nullable|numeric|min:0',
            'surgery_price_max' => 'nullable|numeric|min:0|gte:surgery_price_min',
            'experience' => 'required|integer|min:0',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visit_start_time' => 'required',
            'visit_end_time' => 'required|after:visit_start_time',
            'available_days' => 'required|array|min:1',
            'available_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);
        
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('vet_profiles', 'public');
        }
        
        // Create vet details record with 'confirmed' status (admin added)
        VetDetails::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
            'role' => $request->role,
            'general_price' => $request->general_price,
            'surgery_price_min' => $request->surgery_price_min,
            'surgery_price_max' => $request->surgery_price_max,
            'experience' => $request->experience,
            'profile_image' => $imagePath,
            'status' => 'approved', // Admin added vets are automatically approved
            'visit_start_time' => $request->visit_start_time,
            'visit_end_time' => $request->visit_end_time,
            'available_days' => $request->available_days,
        ]);
        
        return redirect()->route('admin.vet.management')->with('success', 'Vet added successfully!');
    }

    public function edit($id)
    {
        $vet = VetDetails::findOrFail($id);
        return view('admin_edit_vet', compact('vet'));
    }

    public function update(Request $request, $id)
    {
        $vet = VetDetails::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'role' => 'required|in:general_checkup,surgery,both',
            'general_price' => 'nullable|numeric|min:0',
            'surgery_price_min' => 'nullable|numeric|min:0',
            'surgery_price_max' => 'nullable|numeric|min:0|gte:surgery_price_min',
            'experience' => 'required|integer|min:0',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visit_start_time' => 'required',
            'visit_end_time' => 'required|after:visit_start_time',
            'available_days' => 'required|array|min:1',
            'available_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);
        
        // Handle image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($vet->profile_image) {
                Storage::disk('public')->delete($vet->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('vet_profiles', 'public');
            $vet->profile_image = $imagePath;
        }
        
        // Update vet details
        $vet->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
            'role' => $request->role,
            'general_price' => $request->general_price,
            'surgery_price_min' => $request->surgery_price_min,
            'surgery_price_max' => $request->surgery_price_max,
            'experience' => $request->experience,
            'visit_start_time' => $request->visit_start_time,
            'visit_end_time' => $request->visit_end_time,
            'available_days' => $request->available_days,
        ]);
        
        return redirect()->route('admin.vet.management')->with('success', 'Vet updated successfully!');
    }

    public function destroy($id)
    {
        $vet = VetDetails::findOrFail($id);
        
        // Delete profile image
        if ($vet->profile_image) {
            Storage::disk('public')->delete($vet->profile_image);
        }
        
        $vet->delete();
        
        return redirect()->route('admin.vet.management')->with('success', 'Vet deleted successfully!');
    }

    public function requests()
    {
        $vets = VetDetails::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        
        // Calculate statistics for the view
        $pendingCount = $vets->count();
        $todayRequests = VetDetails::where('status', 'pending')
            ->whereDate('created_at', today())
            ->count();
        $weekRequests = VetDetails::where('status', 'pending')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();
        $totalRequests = VetDetails::where('status', 'pending')->count();
        
        return view('admin_vet_requests', compact('vets', 'pendingCount', 'todayRequests', 'weekRequests', 'totalRequests'));
    }

    public function approve($id)
    {
        $vet = VetDetails::findOrFail($id);
        $vet->status = 'approved';
        $vet->save();
        
        return redirect()->route('admin.vet.requests')->with('success', 'Vet request approved successfully!');
    }

    public function reject($id)
    {
        $vet = VetDetails::findOrFail($id);
        $vet->status = 'rejected';
        $vet->save();
        
        return redirect()->route('admin.vet.requests')->with('success', 'Vet request rejected successfully!');
    }

    public function showAll(Request $request)
    {
        $query = VetDetails::query();
        
        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        // Get paginated results
        $vets = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Calculate statistics
        $approvedCount = VetDetails::where('status', 'approved')->count();
        $pendingCount = VetDetails::where('status', 'pending')->count();
        $rejectedCount = VetDetails::where('status', 'rejected')->count();
        
        return view('admin_all_vets', compact('vets', 'approvedCount', 'pendingCount', 'rejectedCount'));
    }
}
