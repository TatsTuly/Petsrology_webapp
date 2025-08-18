<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    /**
     * Display the user management page
     */
    public function index()
    {
        // Check if admin is authenticated
        if (!session('admin_authenticated')) {
            return redirect('/admin/login');
        }

        // Get all users ordered by creation date
        $users = AppUser::orderBy('created_at', 'desc')->get();

        return view('admin_user_management', compact('users'));
    }

    /**
     * Store a new user
     */
    public function store(Request $request)
    {
        // Check if admin is authenticated
        if (!session('admin_authenticated')) {
            return redirect('/admin/login');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:app_users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:user,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            AppUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'registration_time' => now(),
            ]);

            return redirect()->back()->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing user
     */
    public function update(Request $request, $id)
    {
        // Check if admin is authenticated
        if (!session('admin_authenticated')) {
            return redirect('/admin/login');
        }

        $user = AppUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:app_users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:user,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];

            // Only update password if provided
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            return redirect()->back()->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    /**
     * Delete a user
     */
    public function destroy($id)
    {
        // Check if admin is authenticated
        if (!session('admin_authenticated')) {
            return redirect('/admin/login');
        }

        try {
            $user = AppUser::findOrFail($id);
            
            // Prevent deleting the current admin user (if they're in the same table)
            if ($user->role === 'admin' && $user->email === session('admin_email')) {
                return redirect()->back()->with('error', 'You cannot delete your own admin account.');
            }

            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }

    /**
     * Get user statistics for dashboard
     */
    public function getUserStats()
    {
        return [
            'total_users' => AppUser::count(),
            'admin_users' => AppUser::where('role', 'admin')->count(),
            'regular_users' => AppUser::where('role', 'user')->count(),
            'new_this_week' => AppUser::where('created_at', '>=', now()->subDays(7))->count(),
            'new_this_month' => AppUser::where('created_at', '>=', now()->subDays(30))->count(),
        ];
    }
}
