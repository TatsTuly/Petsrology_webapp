<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetDetails;
use Illuminate\Support\Facades\Storage;

class VetJoinController extends Controller
{
    public function store(Request $request)
    {
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
        }
        
        // Create vet details record
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
            'status' => 'pending',
            'visit_start_time' => $request->visit_start_time,
            'visit_end_time' => $request->visit_end_time,
            'available_days' => $request->available_days,
        ]);
        
        return redirect()->route('vet.join')->with('success', 'Your application has been submitted successfully! We will review it and get back to you soon.');
    }
}
