<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetDetails;

class VetController extends Controller
{
    public function allVets()
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing');
        }

        // Fetch all approved vets with their details
        $vets = VetDetails::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate some statistics
        $totalVets = $vets->count();
        $generalVets = $vets->where('role', 'general_checkup')->count();
        $surgicalVets = $vets->where('role', 'surgery')->count();
        $bothVets = $vets->where('role', 'both')->count();

        // Debug log
        \Log::info('All Vets page loaded', [
            'total_vets' => $totalVets,
            'general_vets' => $generalVets,
            'surgical_vets' => $surgicalVets,
            'both_vets' => $bothVets,
            'vet_roles' => $vets->pluck('role', 'name')
        ]);

        return view('all_vets', compact('vets', 'totalVets', 'generalVets', 'surgicalVets', 'bothVets'));
    }

    public function showProfile($id)
    {
        // Check if user is authenticated
        if (!session('user_authenticated')) {
            return redirect('/landing');
        }

        // Find the vet by ID
        $vet = VetDetails::where('id', $id)
            ->where('status', 'approved')
            ->firstOrFail();

        return view('vet_profile', compact('vet'));
    }
}
