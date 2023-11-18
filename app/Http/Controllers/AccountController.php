<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'nik' => 'required|integer',
        ]);

        $us = User::findOrFail($id);

        $us->update([
            'name' => $request->name,
            'address' => $request->address,
            'nik' => $request->nik,
        ]);
        return redirect()->route('account')->with('success', '');
    }
}
