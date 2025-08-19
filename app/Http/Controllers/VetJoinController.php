<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetDetails;
use Illuminate\Support\Facades\Storage;

class VetJoinController extends Controller
{
    /**
     * Show the vet join form
     */
    public function show()
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing')->with('error', 'Please login to access this page.');
        }

        $userEmail = session('user_email');
        $userId = session('user_id');
        
        // Get user's actual name from session first, then database if needed
        $userName = session('user_name');
        
        // If no name in session, get from database
        if (empty($userName) && $userId) {
            $user = \App\Models\AppUser::find($userId);
            $userName = $user ? $user->name : '';
        }
        
        // If still no name found, fallback to email-based name
        if (empty($userName) && $userEmail) {
            $userName = explode('@', $userEmail)[0];
        }
        
        // Check if user already has a vet application
        $existingApplication = VetDetails::where('user_email', $userEmail)
            ->orWhere('user_id', $userId)
            ->first();

        return view('vet_join', compact('existingApplication', 'userName'));
    }

    /**
     * Store a newly created vet application
     */
    public function store(Request $request)
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing')->with('error', 'Please login to submit an application.');
        }

        $userEmail = session('user_email');
        $userId = session('user_id');
        $userName = session('user_name');
        
        // If no name in session, get from database
        if (empty($userName) && $userId) {
            $user = \App\Models\AppUser::find($userId);
            $userName = $user ? $user->name : '';
        }
        
        // Check if user already has a vet application
        $existingApplication = VetDetails::where('user_email', $userEmail)
            ->orWhere('user_id', $userId)
            ->first();

        if ($existingApplication) {
            if ($existingApplication->isPending()) {
                return redirect()->route('vet.join')->with('info', 'Your application is still under review. Please wait for admin approval.');
            } elseif ($existingApplication->isApproved()) {
                return redirect()->route('vet.join')->with('success', 'You are already registered as a veterinarian!');
            } elseif ($existingApplication->isRejected()) {
                return redirect()->route('vet.join')->with('error', 'Your previous application was rejected. Please contact support for more information.');
            }
        }

        // Validate the form data
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
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicVetProfilesDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'vet_profiles';
            if (!file_exists($publicVetProfilesDir)) {
                mkdir($publicVetProfilesDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }
        
        // Create vet details record
        VetDetails::create([
            'user_id' => $userId,
            'user_email' => $userEmail,
            'name' => $userName ?: $request->name, // Use session name or fallback to form input
            'phone' => $request->phone,
            'location' => $request->location,
            'role' => $request->role,
            'general_price' => $request->general_price,
            'surgery_price_min' => $request->surgery_price_min,
            'surgery_price_max' => $request->surgery_price_max,
            'experience' => $request->experience,
            'profile_image' => $imagePath,
            'status' => 'pending',
            'visit_start_time' => $request->visit_start_time,
            'visit_end_time' => $request->visit_end_time,
            'available_days' => $request->available_days,
        ]);
        
        return redirect()->route('vet.join')->with('success', 'Your application has been submitted successfully! We will review it and get back to you soon.');
    }
}
