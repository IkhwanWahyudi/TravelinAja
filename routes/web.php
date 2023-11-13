<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\VehicleController;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\Tujuan;
use App\Models\User;
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

Route::get('/customer/home', function () {
    $userId = session('user_id');

    return view('customer.dashboard', [
        'destination' => Tujuan::all(),
        'account' => User::find($userId),
        'kendaraan' => Kendaraan::all(),
    ]);
})->name('customer');

Route::get('/admin/user', function () {
    return view('admin.user', [
        'user'=>Pemesanan::where('role', '==', 'customer')->get()
    ]);
})->name('user');

Route::get('/admin/booking', function () {
    return view('admin.booking', [
        'pemesanan'=>Pemesanan::where('status', '==', 'waiting')->get()
    ]);
})->name('booking');

Route::get('/admin/history', function () {
    return view('admin.history', [
        'history'=>Pemesanan::where('status', '==', 'done')->get()
    ]);
})->name('history');

Route::get('/admin/add-destination', function () {
    return view('admin.add-destination');
})->name('add-des');

Route::get('/admin/edit-destination', function () {
    return view('admin.edit-destination');
})->name('edit-des');

Route::get('/admin/add-vehicle', function () {
    return view('admin.add-vehicle');
})->name('add-veh');

Route::get('/admin/edit-vehicle', function () {
    return view('admin.edit-vehicle');
})->name('edit-veh');


Route::controller(DestinationsController::class)->group(function () {
    Route::post('/admin/add-destination/action', 'store')->name('destination.store');
    // Route::get('/admin/edit-destination/{id}', 'edit')->name('destination.edit');
    // Route::post('/admin/edit-destination/{id}/action','update')->name('destination.update');
    // Route::post('/admin/dashboard/delete/{id}/action', 'delete')->name('admin.delete');
});

Route::controller(VehicleController::class)->group(function () {
    Route::post('/admin/add-vehicle/action', 'store')->name('vehicle.store');
    // Route::get('/admin/edit/{id}', 'edit')->name('admin.edit');
    // Route::post('/admin/edit/{id}/action','update')->name('admin.update');
    // Route::post('/admin/dashboard/delete/{id}/action', 'delete')->name('admin.delete');
});

Route::get('/signout', [
    AuthController::class, 'logout'
])->name('signout');
