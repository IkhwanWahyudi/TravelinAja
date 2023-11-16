<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signupAction(Request $request)
    {
        if ($request->password == $request->cpassword) {
            $usernameExist = User::where("username", $request->username)->first();
            if ($usernameExist) {
                session()->flash('error', 'Username sudah digunakan!');
                return redirect('/signup');
            }
            User::create([
                'name' => $request->name,
                'nik' => $request->nik,
                'address' => $request->address,
                'username' => $request->username,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            session()->flash('success', 'Akun berhasil dibuat!');
            return redirect('/signup');
        } else {
            session()->flash('error', 'Konfirmasi password anda salah!');
            return redirect('/signup');
        }
    }

    public function signinAction(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user();
            session(['user_id' => Auth::id()]);
            if ($user->role == "customer") {
                return redirect('/customer/home');
            } elseif ($user->role == "admin") {
                return redirect('/admin/dashboard');
            }
        } else {
            session()->flash('error', 'Username or password is incorrect!');
            return redirect('/auth');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('user_id');
        return redirect('/');
    }
}
