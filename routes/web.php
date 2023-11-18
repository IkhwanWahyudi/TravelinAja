<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
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

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.dashboard', [
                'destination' => Tujuan::all(),
                'kendaraan' => Kendaraan::where('status', 'available')->get(),
            ]);
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('admin');

    Route::get('/admin/user', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.user', [
                'user' => User::where('role', 'customer')->get()
            ]);
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('user');

    Route::get('/admin/booking', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.booking', [
                'pemesanan' => Pemesanan::where('status', 'waiting')->get()
            ]);
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('booking');

    Route::get('/admin/history', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.history', [
                'history' => Pemesanan::all()
            ]);
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('history');

    Route::get('/admin/add-destination', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.add-destination');
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('add-des');

    Route::get('/admin/add-vehicle', function () {
        $userId = session('user_id');
        $user = User::find($userId);

        if ($user->role == 'admin') {
            return view('admin.add-vehicle');
        } else {
            return redirect()->route('customer')->with('error', 'Unauthorized access.');
        }
    })->name('add-veh');

    Route::get('/customer/home', function () {
        $userId = session('user_id');

        return view('customer.dashboard', [
            'destination' => Tujuan::all(),
            'account' => User::find($userId),
            'kendaraan' => Kendaraan::where('status', 'available')->get(),
        ]);
    })->name('customer');

    Route::get('/customer/home', function () {
        $userId = session('user_id');

        return view('customer.dashboard', [
            'destination' => Tujuan::all(),
            'account' => User::find($userId),
            'kendaraan' => Kendaraan::where('status', 'available')->get(),
        ]);
    })->name('customer');

    Route::get('/customer/account', function () {
        $userId = session('user_id');
        return view('customer.account', [
            'account' => User::find($userId),
        ]);
    })->name('account');
    Route::get('/customer/history', function () {
        $userId = session('user_id');

        $pemesanan = Pemesanan::where('user_id', $userId)->first();

        if ($pemesanan) {
            $tujuan = Tujuan::find($pemesanan->tujuan_id);
            $kendaraan = Kendaraan::find($pemesanan->kendaraan_id);

            return view('customer.history', [
                'account' => User::find($userId),
                'pemesanan' => $pemesanan,
                'tujuan' => $tujuan,
                'kendaraan' => $kendaraan,
            ]);
        } else {
            // Handle the case where no reservation is found
            return redirect()->route('customer')->with('error', '');
        }
    })->name('history');
});

Route::controller(DestinationsController::class)->group(function () {
    Route::post('/admin/add-destination/action', 'store')->name('destination.store');
    Route::get('/admin/edit-destination/{id}', 'edit')->name('destination.edit');
    Route::get('/customer/booking/{id}', 'booking')->name('book');
    Route::post('/admin/edit-destination/{id}/action', 'update')->name('destination.update');
    Route::post('/admin/dashboard/delete-destination/{id}/action', 'delete')->name('destination.delete');
});

Route::controller(VehicleController::class)->group(function () {
    Route::post('/admin/add-vehicle/action', 'store')->name('vehicle.store');
    Route::get('/admin/edit-vehicle/{id}', 'edit')->name('vehicle.edit');
    Route::post('/admin/edit-vehicle/{id}/action', 'update')->name('vehicle.update');
    Route::post('/admin/dashboard/delete-vehicle/{id}/action', 'delete')->name('kendaraan.delete');
});

Route::controller(AccountController::class)->group(function () {
    // Route::get('/customer/account/{id}', 'edit')->name('user.edit');
    Route::post('/admin/account/{id}/action', 'update')->name('user.update');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/customer/booking/{id}', 'add')->name('user.booking1');
    Route::post('/customer/booking/action', 'store')->name('user.booking');
});

Route::get('/signout', [
    AuthController::class, 'logout'
])->name('signout');
