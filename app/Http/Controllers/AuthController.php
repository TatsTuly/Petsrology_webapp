<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registration for app_users
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'confirmed_password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        // Check if email already exists
        if (AppUser::where('email', $request->email)->exists()) {
            return back()->with('alert', 'This email is already registered.')->withInput();
        }

        if ($request->password !== $request->confirmed_password) {
            return back()->with('alert', 'Password and Confirmed Password do not match!')->withInput();
        }

        $user = new AppUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->confirmed_password = $request->confirmed_password;
        $user->role = $request->role;
        $user->save();

        // Redirect to login page after successful registration
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    // Login for app_users
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = AppUser::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            session([
                'user_authenticated' => true,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role,
                'user_email' => $user->email,
            ]);
            // Redirect based on role
            if ($user->role === 'vet') {
                return redirect('/vet-homepage');
            } else {
                return redirect('/welcome');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
