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
        $validatedData = $request->validate([
            'destination' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $validatedData['image'] = '';
        $validatedData['status'] = 'available';

        $data = Tujuan::create($validatedData);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $data->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/tujuan'), $imageName);

            $data->update(['image' => $imageName]);
        }

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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'status' => 'required|string',
        ]);

        $des = Tujuan::findOrFail($id);

        $des->update([
            'destination' => $request->destination,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
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
        $tujuan = Tujuan::findOrFail($id);

        $imagePath = $tujuan->image;

        if (!empty($imagePath)) {
            $imagePath = public_path('assets/images/tujuan/') . $imagePath;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $tujuan->delete();

        return redirect()->route('admin')->with('success', 'Produk berhasil dihapus.');
    }
}
