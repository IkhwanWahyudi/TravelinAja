<?php

use App\Http\Controllers\AuthController;
use App\Models\Pemesanan;
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
        'pemesanans'=>Pemesanan::all()
    ]);
})->name('admin');
