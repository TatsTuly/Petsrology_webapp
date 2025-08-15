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

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

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

Route::get('/vaccination-booking', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('vaccination_booking');
})->name('vaccination.booking');

Route::get('/adopt-home', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('adopt_home');
});

Route::get('/first-time-adopter', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('first_time_adopter');
})->name('first.time.adopter');

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

    $userId = session('user_id');
    $adoptionPostId = $request->get('adoption_post_id'); // Optional, if form includes post id

    \App\Models\AdoptionRequest::create([
        'adoption_post_id' => $adoptionPostId,
        'user_id' => $userId,
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'phone' => $request->phone,
        'age' => $request->age,
        'address' => $request->address,
        'city' => $request->city,
        'housingType' => $request->housingType,
        'ownRent' => $request->ownRent,
        'currentPets' => $request->currentPets,
        'previousPets' => $request->previousPets,
        'reasonForAdoption' => $request->reasonForAdoption,
        'veterinaryCare' => $request->veterinaryCare,
        'financialCommitment' => $request->financialCommitment,
        'agreements' => json_encode($request->agreements),
        'status' => 'pending',
    ]);

    session()->flash('success', 'Your adoption application has been submitted successfully! We will contact you within 2-3 business days.');
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
    $user = null;
    if (session('user_id')) {
        $user = \App\Models\AppUser::find(session('user_id'));
    }
    return view('user_dashboard', ['user' => $user]);
})->name('user.dashboard');

// Admin Routes
use App\Models\AdoptionPost;
use App\Models\AdoptionRequest;
use Illuminate\Support\Facades\Storage;
Route::get('/admin/login', function () {
    return view('admin_login');
})->name('admin.login');

Route::post('/admin/login', function (Illuminate\Http\Request $request) {
    $request->validate([
        'admin_username' => 'required|string',
        'admin_password' => 'required|string',
    ]);

    $admin = \App\Models\AdminLogin::where('username', $request->admin_username)
        ->where('password', $request->admin_password)
        ->first();

    if ($admin) {
        session([
            'admin_authenticated' => true,
            'admin_username' => $admin->username,
            'admin_role' => 'admin'
        ]);
        return redirect('/admin/dashboard');
    }

    return back()->withErrors(['admin_username' => 'Invalid admin credentials']);
})->name('admin.login.submit');

Route::post('/admin/logout', function () {
    session()->forget(['admin_authenticated', 'admin_email', 'admin_role']);
    return redirect('/landing');
})->name('admin.logout');

Route::get('/admin/dashboard', function () {
    if (!session('admin_authenticated')) {
        return redirect('/admin/login');
    }
    $adoptionPosts = AdoptionPost::with('requests')->orderBy('id','desc')->get();
    return view('admin_dashboard', compact('adoptionPosts'));


// Admin Adoption Management Actions
Route::post('/admin/adoption-post', function (Illuminate\Http\Request $request) {
    $request->validate([
        'title' => 'required',
        'pet_name' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('adoptions', 'public');
    }
    AdoptionPost::create([
        'title' => $request->title,
        'pet_name' => $request->pet_name,
        'description' => $request->description,
        'image' => $imagePath,
    ]);
    return redirect()->back()->with('success', 'Adoption post created!');
});

Route::post('/admin/adoption-post/{id}/delete', function ($id) {
    $post = AdoptionPost::findOrFail($id);
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }
    $post->delete();
    return redirect()->back()->with('success', 'Adoption post deleted!');
});

Route::post('/admin/adoption-request/{id}/approve', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 'approved';
    $req->save();
    return redirect()->back()->with('success', 'Adoption request approved!');
});
})->name('admin.dashboard');

