<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;  // Add this line at the top

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('splash_screen');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/welcome', function () {
    // Simple session-based authentication check
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/signup', function () {
        return view('signup');
    });

    Route::get('/login', function () {
        return view('login');
    });
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    // Simple demo authentication - in real app, you'd validate against database
    if ($request->filled('email') && $request->filled('password') && $request->filled('role')) {
        // Create a simple session to simulate authentication
        session([
            'user_authenticated' => true, 
            'user_email' => $request->email,
            'user_role' => $request->role
        ]);
        
        // Redirect based on role
        if ($request->role === 'vet') {
            return redirect('/vet-dashboard');
        } else {
            return redirect('/welcome');
        }
    }
    
    return back()->withErrors(['email' => 'Invalid credentials or missing role']);
})->name('login.submit');

Route::post('/signup', function (Illuminate\Http\Request $request) {
    // Simple demo registration - in real app, you'd save to database
    if ($request->filled('email') && $request->filled('password') && $request->filled('role')) {
        // Create a simple session to simulate authentication after signup
        session([
            'user_authenticated' => true, 
            'user_email' => $request->email,
            'user_role' => $request->role
        ]);
        
        // Redirect based on role
        if ($request->role === 'vet') {
            return redirect('/vet-home');
        } else {
            return redirect('/welcome');
        }
    }
    
    return back()->withErrors(['email' => 'Please fill in all required fields']);
})->name('signup.submit');

Route::post('/logout', function () {
    session()->forget(['user_authenticated', 'user_email', 'user_role']);
    return redirect('/landing');
})->name('logout');

Route::get('/vet-home', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('vet_home');
});

Route::get('/vet-dashboard', function () {
    if (!session('user_authenticated') || session('user_role') !== 'vet') {
        return redirect('/landing');
    }
    return view('vet_dashboard');
});

Route::get('/book-appointment', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('book_appointment');
})->name('book.appointment');

Route::get('/all-vets', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('all_vets');
})->name('all.vets');

Route::get('/vaccination-schedule', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('vaccination_schedule');
})->name('vaccination.schedule');

Route::get('/adopt-home', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('adopt_home');
});

Route::get('/adoption-details', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('adoption_details');
});

Route::get('/adoption-form', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('adoption_form');
});

Route::post('/adoption-form', function (Illuminate\Http\Request $request) {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    
    // Validate the form data
    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'age' => 'required|integer|min:18|max:100',
        'address' => 'required|string|max:500',
        'city' => 'required|string|max:255',
        'housingType' => 'required|string',
        'ownRent' => 'required|string',
        'currentPets' => 'required|string',
        'previousPets' => 'required|string',
        'reasonForAdoption' => 'required|string|max:1000',
        'veterinaryCare' => 'required|string|max:1000',
        'financialCommitment' => 'required|string',
        'agreements' => 'required|array|min:5',
    ]);
    
    // In a real application, you would save this to a database
    // For now, we'll just simulate success and redirect
    
    session()->flash('success', 'Your adoption application has been submitted successfully! We will contact you within 2-3 business days.');
    
    // Redirect back to the pet details page
    $petName = $request->get('pet', 'milo');
    return redirect('/adoption-details?pet=' . urlencode($petName));
})->name('adoption.form.submit');

Route::get('/pet-supplies', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('pet_supplies');
})->name('pet.supplies');

Route::get('/shop-food', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('shop_food');
})->name('shop.food');

Route::get('/shop-toys', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('shop_toys');
})->name('shop.toys');

Route::get('/shop', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('shop');
})->name('shop');

Route::get('/contact', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('contact');
})->name('contact');

// User Dashboard Route
Route::get('/user/dashboard', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('user_dashboard');
})->name('user.dashboard');

// Admin Routes
Route::get('/admin/login', function () {
    return view('admin_login');
})->name('admin.login');

Route::post('/admin/login', function (Illuminate\Http\Request $request) {
    // Simple demo admin authentication - in real app, you'd validate against admin table
    if ($request->filled('admin_email') && $request->filled('admin_password')) {
        // For demo purposes, accept any admin credentials
        // In production, you'd validate against a secure admin database
        session([
            'admin_authenticated' => true, 
            'admin_email' => $request->admin_email,
            'admin_role' => 'admin'
        ]);
        
        // Redirect to admin dashboard (you'll create this later)
        return redirect('/admin/dashboard');
    }
    
    return back()->withErrors(['admin_email' => 'Invalid admin credentials']);
})->name('admin.login.submit');

Route::post('/admin/logout', function () {
    session()->forget(['admin_authenticated', 'admin_email', 'admin_role']);
    return redirect('/landing');
})->name('admin.logout');

Route::get('/admin/dashboard', function () {
    if (!session('admin_authenticated')) {
        return redirect('/admin/login');
    }
    // For now, just return a simple view - you can create admin dashboard later
    return view('admin_dashboard');
})->name('admin.dashboard');

