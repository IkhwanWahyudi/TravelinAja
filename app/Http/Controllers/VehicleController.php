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
            'license_plate' => 'required|string',
            'maximum_passengers' => 'required|integer',
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
        // Temukan produk berdasarkan ID
        $kendaraan = Kendaraan::findOrFail($id);

        // Dapatkan nama file gambar yang terkait dengan produk
        // $imagePath = $kendaraan->image_path;

        // Hapus file gambar dari sistem file jika ada
        // if (!empty($imagePath)) {
        //     $imagePath = public_path('assets/images/produk/') . $imagePath;
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        // }

        // Hapus produk dari database
        $kendaraan->delete();

        return redirect()->route('admin')->with('success', 'Produk berhasil dihapus.');
    }
}
