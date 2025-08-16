<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionPost;

class AdoptHomeController extends Controller
{
    public function index(Request $request)
    {
        $query = AdoptionPost::query();

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', strtolower($request->input('category')));
        }

        // Gender filter
        if ($request->filled('gender')) {
            $query->where('gender', strtolower($request->input('gender')));
        }

        // Age filter (young, adult, senior)
        if ($request->filled('age')) {
            $age = $request->input('age');
            if ($age === 'young') {
                $query->where('pet_age', '<', 1);
            } elseif ($age === 'adult') {
                $query->whereBetween('pet_age', [1, 2.99]);
            } elseif ($age === 'senior') {
                $query->where('pet_age', '>=', 3);
            }
        }

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('pet_name', 'like', "%$search%")
                  ->orWhere('breed', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$search%")
                  ->orWhere('title', 'like', "%$search%")
                  ->orWhere('tags', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ;
            });
        }

        $adoptionPosts = $query->orderBy('created_at', 'desc')->get();
        return view('adopt_home', compact('adoptionPosts'));
    }
}
