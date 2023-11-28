<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

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
    return view('home');
});

// Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerProcess'])->middleware('guest');

Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify/resend-verification', [VerificationController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send'); //pengguna hanya diizinkan untuk mengakses route yang dilindungi oleh middleware throttle ini sebanyak 6 kali dalam waktu 1 menit.

// Add profile after register.
Route::get('/user-add', [UserController::class, 'create'])->name('addProfile');
Route::post('/user-add', [UserController::class, 'store']); // menyimpan data user ke dlm db.
Route::get('/user-edit', [UserController::class, 'edit']); // show Update Profile detail
Route::put('/user-update', [UserController::class, 'update']);

// Test Send email
Route::get('send-email', [SendEmail::class, 'index']);

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
// Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware('verify')->group(function () {
    Route::get('/history', function () {
        return view('transaction_history');
    });

    Route::get('/transaction', function () {
        return view('transaction');
    });
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('cart', [EventsController::class, 'cart'])->name('cart');

Route::get('add-to-cart/{id}', [EventsController::class, 'addToCart'])->name('add_to_cart');

Route::get('/detail', function () {
    return view('detail_konser');
});
