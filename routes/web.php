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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/vet-home', function () {
    return view('vet_home');
});

Route::get('/book-appointment', function () {
    return view('book_appointment');
})->name('book.appointment');

Route::get('/adopt-home', function () {
    return view('adopt_home');
});

Route::get('/pet-supplies', function () {
    return view('pet_supplies');
})->name('pet.supplies');

Route::get('/shop-food', function () {
    return view('shop_food');
})->name('shop.food');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

