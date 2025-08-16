<?php
use App\Http\Controllers\VetJoinController;

// Vet Join Page
Route::get('/vet-join', function () {
    return view('vet_join');
})->name('vet.join');

// Vet Join Form Submission
Route::post('/vet-join', [VetJoinController::class, 'store'])->name('vet.join.submit');
// Search adoption post by ID for admin update/delete
Route::get('/admin/adoption-management/search-by-id/{id}', function($id) {
    $post = \App\Models\AdoptionPost::find($id);
    if (!$post) {
        return response()->json(['error' => 'Not found'], 404);
    }
    // Return only fillable fields to match what the JS expects
    $data = $post->only($post->getFillable());
    $data['id'] = $post->id;
    return response()->json($data);
});
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdoptionManagementController;
use App\Models\AdoptionRequest;
use App\Models\AdoptionPost;

// Edit adoption post form
Route::get('/admin/adoption-management/edit/{id}', [AdoptionManagementController::class, 'edit'])->name('admin.adoption.edit');
// Admin Adoption Management store (create new post)
Route::post('/admin/adoption-management/store', [AdoptionManagementController::class, 'store'])->name('admin.adoption.store');

// Admin Adoption Management main page
Route::get('/admin/adoption-management', [AdoptionManagementController::class, 'index'])->name('admin.adoption.management');

// Allow GET for confirm/cancel for testing in browser
Route::get('/admin/adoption-request/{id}/confirm', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 1; // 1 = confirmed
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'adopted';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request confirmed and pet marked as adopted!');
});

Route::get('/admin/adoption-request/{id}/cancel', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 2; // 2 = cancelled
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'active';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request cancelled and pet marked as available!');
});
// POST routes for adoption request confirm/cancel (for form submissions)
Route::post('/admin/adoption-request/{id}/confirm', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 1; // 1 = confirmed
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'adopted';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request confirmed and pet marked as adopted!');
});

Route::post('/admin/adoption-request/{id}/cancel', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 2; // 2 = cancelled
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'active';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request cancelled and pet marked as available!');
});
// ...existing code...
Route::post('/admin/adoption-management/update/{id}', function(\Illuminate\Http\Request $request, $id) {
    $post = \App\Models\AdoptionPost::findOrFail($id);
    $validated = $request->validate([
        'title' => 'required',
        'pet_name' => 'required',
        'pet_age' => 'required|integer',
        'gender' => 'required',
        'character' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($request->hasFile('image')) {
        if ($post->image) { \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image); }
        $imagePath = $request->file('image')->store('adoption_images', 'public');
        $validated['image'] = $imagePath;
    }
    $post->update($validated);
    return redirect()->back()->with('success', 'Adoption post updated successfully!');
});

// Delete adoption post
Route::post('/admin/adoption-management/delete/{id}', function($id) {
    $post = \App\Models\AdoptionPost::findOrFail($id);
    if ($post->image) { \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image); }
    $post->delete();
    return redirect()->back()->with('success', 'Adoption post deleted successfully!');
});

use Illuminate\Support\Facades\Route;

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

// Vet Home (for support button)
Route::get('/vet-home', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('vet_home');
})->name('vet.home');

// Vet Dashboard (main vet page after login)
Route::get('/vet-dashboard', function () {
    if (!session('user_authenticated') || session('user_role') !== 'vet') {
        return redirect('/landing');
    }
    return view('vet_dashboard');
})->name('vet.dashboard');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
// Login route with error handling
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Fallback route for 404 errors
use Illuminate\Support\Facades\View;
Route::fallback(function () {
    return View::exists('errors.404')
        ? response()->view('errors.404', [], 404)
        : response('Page not found', 404);
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

// Vet Homepage (main vet page after login)
Route::get('/vet-homepage', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    if (session('user_role') !== 'vet') {
        return redirect('/welcome');
    }
    return view('vet_homepage');
});

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

use App\Http\Controllers\AdoptHomeController;
Route::get('/adopt-home', [AdoptHomeController::class, 'index'])->name('adopt.home');

Route::get('/first-time-adopter', function () {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }
    return view('first_time_adopter');
})->name('first.time.adopter');

use App\Http\Controllers\AdoptionDetailsController;
Route::get('/adoption-details', [AdoptionDetailsController::class, 'show'])->name('adoption.details');


use App\Http\Controllers\AdoptionFormController;
Route::get('/adoption-form', [AdoptionFormController::class, 'show'])->name('adoption.form');

Route::post('/adoption-form', function (Illuminate\Http\Request $request) {
    if (!session('user_authenticated')) {
        return redirect('/landing');
    }

    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
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
    $userEmail = session('user_email');
    $adoptionId = $request->get('adoption_id');

    \App\Models\AdoptionRequest::create([
        'adoption_id' => $adoptionId,
        'user_id' => $userId,
        'email' => $userEmail,
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
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
        'status' => 0, // 0 = pending
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
    $adoptionRequests = collect();
    if (session('user_id')) {
        $user = \App\Models\AppUser::find(session('user_id'));
        $adoptionRequests = \App\Models\AdoptionRequest::with('adoptionPost')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    }
    return view('user_dashboard', ['user' => $user, 'adoptionRequests' => $adoptionRequests]);
})->name('user.dashboard');

// Admin Routes
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

// POST routes for adoption request confirm/cancel (for form submissions)
Route::post('/admin/adoption-request/{id}/confirm', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 1; // 1 = confirmed
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'adopted';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request confirmed and pet marked as adopted!');
});

Route::post('/admin/adoption-request/{id}/cancel', function ($id) {
    $req = AdoptionRequest::findOrFail($id);
    $req->status = 2; // 2 = cancelled
    $req->save();
    $petUpdated = false;
    if ($req->adoption_id) {
        $pet = AdoptionPost::find($req->adoption_id);
        if ($pet) {
            $pet->status = 'active';
            $petUpdated = $pet->save();
        }
    }
    if (!$petUpdated) {
        \Log::error('Pet status not updated for adoption request ID: ' . $id);
    }
    return redirect()->back()->with('success', 'Adoption request cancelled and pet marked as available!');
});
})->name('admin.dashboard');

