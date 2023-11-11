<?php

use App\Http\Controllers\AuthController;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\Tujuan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/auth', function () {
    return view('auth.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::post('/signup/action', [
    AuthController::class, 'signupAction'
])->name('signup.action');

Route::post(
    '/signin/action',
    [AuthController::class, 'signinAction']
)->name('signin.action');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'destination'=>Tujuan::all(),
        'kendaraan'=>Kendaraan::all()
    ]);
})->name('admin');

Route::get('/admin/user', function () {
    return view('admin.user', [
        'user'=>Pemesanan::where('role', '==', 'customer')->get()
    ]);
})->name('booking');

Route::get('/admin/booking', function () {
    return view('admin.booking', [
        'pemesanan'=>Pemesanan::where('status', '==', 'waiting')->get()
    ]);
})->name('booking');

Route::get('/admin/history', function () {
    return view('admin.history', [
        'history'=>Pemesanan::where('status', '==', 'done')->get()
    ]);
})->name('booking');
