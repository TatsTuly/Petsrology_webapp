<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionPost;

class AdoptionManagementController extends Controller
{
    public function edit($id)
    {
        $post = AdoptionPost::findOrFail($id);
        return view('admin_adoption_edit', compact('post'));
    }
    public function index(Request $request)
    {
        $adoptionPosts = AdoptionPost::orderBy('created_at', 'desc')->get();
        return view('admin_adoption_management', compact('adoptionPosts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'title' => 'required',
            'breed' => 'nullable',
            'weight' => 'nullable',
            'location' => 'nullable',
            'tags' => 'nullable',
            'health_info' => 'nullable',
            'special_care' => 'nullable',
            'fee' => 'nullable',
            'fee_includes' => 'nullable',
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
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicAdoptionImagesDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'adoption_images';
            if (!file_exists($publicAdoptionImagesDir)) {
                mkdir($publicAdoptionImagesDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }

        try {
            AdoptionPost::create($validated);
            return redirect()->back()->with('success', 'Adoption post created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error creating adoption post: ' . $e->getMessage());
        }
    }
}
