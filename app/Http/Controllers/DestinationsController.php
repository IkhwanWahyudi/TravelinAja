<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input, termasuk validasi gambar
        $validatedData = $request->validate([
            'destination' => 'required|string',
            'description' => 'required|string',
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

        Tujuan::create($validatedData);

        // Redirect ke halaman yang sesuai, dan beri pesan sukses jika diperlukan
        return redirect()->route('admin')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('admin.edit-destination', [
            'tujuans' => Tujuan::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);
        $des = Tujuan::findOrFail($id);
        $des->update([
            'destination' => $request->destination,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->route('admin')->with('success', '');
    }

    public function delete($id)
    {
        // Temukan produk berdasarkan ID
        $tujuan = Tujuan::findOrFail($id);

        // Dapatkan nama file gambar yang terkait dengan produk
        // $imagePath = $tujuan->image_path;

        // Hapus file gambar dari sistem file jika ada
        // if (!empty($imagePath)) {
        //     $imagePath = public_path('assets/images/produk/') . $imagePath;
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        // }

        // Hapus produk dari database
        $tujuan->delete();

        return redirect()->route('admin')->with('success', 'Produk berhasil dihapus.');
    }
}
