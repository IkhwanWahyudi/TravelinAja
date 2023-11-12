<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input, termasuk validasi gambar
        $validatedData = $request->validate([
            'type' => 'required|string',
            'plat' => 'required|string',
            'max' => 'required|integer',
            'price' => 'required|integer',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar
        ]);

        // $lasttujuan = (int) Tujuan::max('id');
        // $newtujuanId = $lasttujuan + 1; // ID Tujuan terakhir + 1

        // // Simpan gambar ke direktori yang diinginkan (public/assets/images/tujuan)
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = $newtujuanId . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('assets/images/tujuan'), $imageName);

        //     // Update kolom image_path dengan nama file gambar
        //     $validatedData['image_path'] = $imageName;
        // }

        Kendaraan::create($validatedData);

        // Redirect ke halaman yang sesuai, dan beri pesan sukses jika diperlukan
        return redirect()->route('admin')->with('success', 'Produk berhasil ditambahkan.');
    }
}
