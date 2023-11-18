<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Tujuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DestinationsController extends Controller
{

    public function index()
    {
        $endpoint = env('BASE_ENV').'/api/admin/dashboard';
        $data = Http::get($endpoint);
        return view('admin.dashboard',[
            'destinasi'=>$data
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input, termasuk validasi gambar
        $validatedData = $request->validate([
            'destination' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240', // Validasi untuk gambar
        ]);

        $validatedData['image'] = '';

        $data = Tujuan::create($validatedData);

        // Simpan gambar ke direktori yang diinginkan (public/assets/images/tujuan)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $data->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/tujuan'), $imageName);

            // Update kolom image_path dengan nama file gambar
            $data->update(['image' => $imageName]);
        }

        // Redirect ke halaman yang sesuai, dan beri pesan sukses jika diperlukan
        return redirect()->route('admin')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('admin.edit-destination', [
            'tujuans' => Tujuan::all()->where('id', $id)->first(),
        ]);
    }

    public function booking($id)
    {
        $userId = session('user_id');

        return view('customer.booking', [
            'account' => User::find($userId),
            'kendaraan' => Kendaraan::all(),
            'tujuans' => Tujuan::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $tujuan = Tujuan::findOrFail($id);

        $imagePath = $tujuan->image;

        if (!empty($imagePath)) {
            $imagePath = public_path('assets/images/tujuan/') . $imagePath;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $request->validate([
            'destination' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240', // Validasi untuk gambar
        ]);

        $des = Tujuan::findOrFail($id);

        $des->update([
            'destination' => $request->destination,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $des->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/tujuan/'), $imageName);

            $des->update(['image' => $imageName]);
        }

        return redirect()->route('admin')->with('success', '');
    }

    public function delete($id)
    {
        // Temukan produk berdasarkan ID
        $tujuan = Tujuan::findOrFail($id);

        // Dapatkan nama file gambar yang terkait dengan produk
        $imagePath = $tujuan->image;

        // Hapus file gambar dari sistem file jika ada
        if (!empty($imagePath)) {
            $imagePath = public_path('assets/images/tujuan/') . $imagePath;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus produk dari database
        $tujuan->delete();

        return redirect()->route('admin')->with('success', 'Produk berhasil dihapus.');
    }
}
