<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{
    public function index()
    {
        $endpoint = env('BASE_ENV').'/api/admin/dashboard';
        $data = Http::get($endpoint);
        return view('admin.dashboard',[
            'kendaraan'=>$data
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'license_plate' => 'required|string',
            'maximum_passengers' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|string',
        ]);

        Kendaraan::create($validatedData);

        return redirect()->route('admin')->with('success', '');
    }

    public function edit($id)
    {
        return view('admin.edit-vehicle', [
            'kendaraans' => Kendaraan::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'license_plate' => 'required|string',
            'maximum_passengers' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $kd = Kendaraan::findOrFail($id);
        $kd->update([
            'type' => $request->type,
            'license_plate' => $request->license_plate,
            'maximum_passengers' => $request->maximum_passengers,
            'price' => $request->price,
        ]);
        return redirect()->route('admin')->with('success', '');
    }

    public function delete($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('admin')->with('success', '');
    }
}
