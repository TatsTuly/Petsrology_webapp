<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionPost;

class AdoptHomeController extends Controller
{
    public function index()
    {
        $adoptionPosts = AdoptionPost::orderBy('created_at', 'desc')->get();
        return view('adopt_home', compact('adoptionPosts'));
    }
}
