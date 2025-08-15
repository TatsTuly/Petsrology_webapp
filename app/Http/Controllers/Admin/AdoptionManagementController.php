<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionPost;

class AdoptionManagementController extends Controller
{
    public function index()
    {
        return view('admin_adoption_management');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'adoption_number' => 'required|unique:adoption_posts,adoption_number',
            'title' => 'required',
            'pet_name' => 'required',
            'pet_age' => 'required|integer',
            'gender' => 'required',
            'character' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('adoption_images', 'public');
            $validated['image'] = $imagePath;
        }

        AdoptionPost::create($validated);

        return redirect()->back()->with('success', 'Adoption post created successfully!');
    }
}
