<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getDestination()
    {
        $destinasi = Tujuan::get();

        $response = [
            'status'=>'success',
            'message'=>'Data Berhasil Diambil',
            'data'=>$destinasi
        ];
        return response()->json($response);
    }

    public function getVehicle()
    {
        $kendaraan = Kendaraan::get();

        $response = [
            'status'=>'success',
            'message'=>'Data Berhasil Diambil',
            'data'=>$kendaraan
        ];
        return response()->json($response);
    }
}
