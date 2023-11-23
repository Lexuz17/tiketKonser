<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SendEmail;
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
});

Route::get('send-email', [SendEmail::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', [AuthController::class, 'register']);

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
