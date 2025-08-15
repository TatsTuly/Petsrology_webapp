<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionPost;

class AdoptionFormController extends Controller
{
    public function show(Request $request)
    {
        $petName = $request->query('pet');
        $adoptionPost = null;
        if ($petName) {
            $adoptionPost = AdoptionPost::whereRaw('LOWER(pet_name) = ?', [strtolower($petName)])->first();
        }
        return view('adoption_form', compact('adoptionPost'));
    }
}
