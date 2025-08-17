<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    // Google Authentication Methods
    public function redirectToGoogle()
    {
        // Check if Google credentials are configured
        if (!config('services.google.client_id') || config('services.google.client_id') === 'your_google_client_id_here') {
            return redirect('/login')->withErrors(['google' => 'Google OAuth is not configured. Please check your .env file and Google Cloud Console setup.']);
        }

        try {
            return Socialite::driver('google')
                ->stateless()  // Add stateless mode to avoid session issues
                ->redirect();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['google' => 'Google OAuth configuration error: ' . $e->getMessage()]);
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')
                ->stateless()  // Add stateless mode to match redirect
                ->user();
            
            // Check if user already exists with Google ID
            $user = AppUser::where('google_id', $googleUser->id)->first();
            
            if ($user) {
                // User exists, log them in
                $this->loginUser($user);
                return $this->redirectBasedOnRole($user->role);
            }
            
            // Check if user exists with same email
            $existingUser = AppUser::where('email', $googleUser->email)->first();
            
            if ($existingUser) {
                // Update existing user with Google information
                $existingUser->google_id = $googleUser->id;
                $existingUser->avatar = $googleUser->avatar;
                $existingUser->save();
                
                $this->loginUser($existingUser);
                return $this->redirectBasedOnRole($existingUser->role);
            }
            
            // Get role from session (set during signup) or default to 'user'
            $role = session('signup_role', 'user');
            session()->forget('signup_role'); // Clear the session
            
            // Create new user
            $newUser = AppUser::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'role' => $role,
                'password' => null,
                'confirmed_password' => null,
            ]);
            
            $this->loginUser($newUser);
            return $this->redirectBasedOnRole($newUser->role);
            
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            // Clear any existing sessions and redirect to login
            session()->flush();
            return redirect('/login')->withErrors(['google' => 'Authentication session invalid. Please clear your browser cache and try again.']);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return redirect('/login')->withErrors(['google' => 'Google OAuth error: Invalid credentials or configuration.']);
        } catch (\Exception $e) {
            // Log the detailed error for debugging
            \Log::error('Google OAuth Error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/login')->withErrors(['google' => 'Google authentication failed: ' . $e->getMessage()]);
        }
    }

    public function googleSignup(Request $request)
    {
        // Store role in session and redirect to Google
        session(['signup_role' => $request->role ?? 'user']);
        return $this->redirectToGoogle();
    }

    private function loginUser($user)
    {
        session([
            'user_authenticated' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
            'user_email' => $user->email,
        ]);
    }

    private function redirectBasedOnRole($role)
    {
        if ($role === 'vet') {
            return redirect('/vet-homepage');
        } else {
            return redirect('/welcome');
        }
    }
}
