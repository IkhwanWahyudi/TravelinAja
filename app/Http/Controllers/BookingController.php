<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\Tujuan;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function add($id)
    {
        $userId = session('user_id');
        return view('customer.booking', [
            'account' => User::find($userId),
            'tujuans' => Tujuan::all()->where('id', $id)->first(),
            'kendaraan' => Kendaraan::where('status', 'available')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle' => 'required|string',
            'passengers' => 'required|integer',
            'departure_date' => 'required|date|after_or_equal:today',
            'duration' => 'required|integer',
            'total_price' => 'required|integer',
        ]);

        $kendaraan = Kendaraan::where('id', $request->vehicle)->first();
        $tujuan = Tujuan::where('id', $request->tujuan_id)->first();

        Pemesanan::create([
            'user_id' => $request->user,
            'departure_date' => $request->departure_date,
            'tujuan_id' => $request->tujuan_id,
            'kendaraan_id' => $request->vehicle,
            'duration' => $request->duration,
            'number_of_passengers' => $request->passengers,
            'total_price' => ($request->duration * $kendaraan->price) + ($request->passengers * $tujuan->price),
            'status' => 'progress',
        ]);

        return redirect()->route('customer')->with('success', '');
    }
}
