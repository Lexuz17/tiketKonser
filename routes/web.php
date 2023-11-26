<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return view('home');
})->middleware(['auth', 'verified']);

// Register
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProcess']);

Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify/resend-verification', [VerificationController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send'); //pengguna hanya diizinkan untuk mengakses route yang dilindungi oleh middleware throttle ini sebanyak 6 kali dalam waktu 1 menit.

// Test Send email
Route::get('send-email', [SendEmail::class, 'index']);

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('/about', function () {
    return view('about');

});

Route::get('/cart', function () {
    return view('cart');

});

Route::get('/detail', function () {
    return view('detail_konser');
});

Route::get('/history', function () {
    return view('transaction_history');

});

Route::get('/transaction', function () {
    return view('transaction');

});
