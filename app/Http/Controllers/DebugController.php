<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function checkGoogleConfig()
    {
        return response()->json([
            'google_client_id' => config('services.google.client_id'),
            'google_client_secret' => config('services.google.client_secret') ? 'SET' : 'NOT SET',
            'google_redirect' => config('services.google.redirect'),
            'app_url' => config('app.url'),
        ]);
    }
}
