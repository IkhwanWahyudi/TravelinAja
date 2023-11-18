<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function edit($id)
    {
        return view('customer.account',[
            'users'=> User::all()->where('id',$id)->first(),
        ]);
    }

    public function update(Request $request,$id)
    {
        $users = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'address' => 'required|string',
            'nik' => 'required|integer',
        ]);

        $us = User::findOrFail($id);

        $us->update([
            'name' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'nik' => $request->nik,
        ]);
        return redirect()->route('account')->with('success', '');
    }
}
