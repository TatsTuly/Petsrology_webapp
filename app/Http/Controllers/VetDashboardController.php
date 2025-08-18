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

        return view('vet_dashboard', compact('vetApplication'));
    }
}
