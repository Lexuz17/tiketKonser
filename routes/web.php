<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

// Beberapa kondisi
// Sudah login dan belum verify -> auth, notVerified v
// Blm login -> guest v
// Sudah login, verify, tapi belum memiliki profile detail. -> auth, verified, ensureNoProfile v
// Sudah login, verify, memiliki profile detail. -> auth, verified, ensureProfile v

// Index -> show all listing.
// show -> show single concert / detailnya
// store -> store new listing.
// edit -> show form to edit listing.
// update -> update listing.
// creata -> show form to create new listing.

Route::get('/', [ConcertController::class, 'index'])->name('home');
Route::get('/discover', [ConcertController::class, 'allIndex'])->name('jelajah');

Route::get('/about', function () {
    return view('about');
});

// ini buat detail companynya
Route::get('/company/{id}', [CompanyController::class, 'index'])->name('company.index');

// Ini buat Detail konsertnya
Route::get('/event/{name}', [ConcertController::class, 'show']);

// Hanya yang belum login
Route::middleware('guest')->group(function(){
    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    // Register
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

// Yang sudah login
Route::middleware('auth')->group(function() {
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

// yang sudah login, verify, tapi belum memiliki profile detail.
Route::middleware(['auth','verified','ensureNoProfile'])->group(function () {
    Route::get('/user-add-notice', [UserController::class, 'createNotice'])->name('addProfileWarning');
    // Add profile after register.
    Route::get('/user-add', [UserController::class, 'create'])->name('addProfile');
    Route::post('/user-add', [UserController::class, 'store']); // menyimpan data user ke dlm db.
});

// Yang sudah login, verify dan memiliki profile detail.
Route::middleware(['auth','verified', 'ensureProfile'])->group(function () {
    Route::get('/user-edit', [UserController::class, 'edit'])->name('editProfile');
    Route::put('/user-update', [UserController::class, 'update']);

    // transactions section

    // transferData
    Route::get('/get-event-data', [TransactionController::class, 'getEventData']);
    Route::post('/get-event-data', [TransactionController::class, 'storeHalf'])->name('transactions.store');

    // Menampilkan semua transacion.
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

    // Menampilkan formmulir konfirmasi transaction dan membuat transaction baru
    Route::get('/transaction/{id}/confirmation', [TransactionController::class, 'getConfirmTransaction'])->name('transactions.confirm');
    Route::post('/transaction/{id}/confirmation', [TransactionController::class, 'storeFull'])->name('transactions.storeFull');

    // Ini buat tampilih invoice
    Route::get('/transactions/{id}/show', [TransactionController::class, 'show'])->middleware('verifyInvoice'); // buat handle yang mau akses dari luar jadi ga ada csrf
    Route::post('/transactions/{id}/show', [TransactionController::class, 'show'])->name('transactions.show')->middleware('verifyInvoice');

    // Menampilkan formulir untuk mengonfirmasi pembayaran
    Route::get('/transactions/{id}/confirm-payment', [TransactionController::class, 'confirmPayment'])->name('transactions.confirm-payment');
    // Menyimpan konfirmasi pembayaran ke dalam database
    Route::post('/transactions/{id}/confirm-payment', [TransactionController::class, 'storePaymentConfirmation'])->name('transactions.store-payment-confirmation');

    Route::get('/debug', [TransactionController::class, 'debug']);
});

// Yang sudah login tapi belum verify
Route::middleware(['auth','notVerified'])->group(function () {
    // Resend Email Verif
    Route::get('/email/verify/resend-notice', [VerificationController::class, 'noticeResend'])->name('verification.noticeResend');
    Route::post('/email/verify/resend-verification', [VerificationController::class, 'send'])->middleware('throttle:6,1')->name('verification.send'); //pengguna hanya diizinkan untuk mengakses route yang dilindungi oleh middleware throttle ini sebanyak 6 kali dalam waktu 1 menit.
    // Email Verify
    Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
});

// Test Send email
// Route::get('send-email', [SendEmail::class, 'index']);
