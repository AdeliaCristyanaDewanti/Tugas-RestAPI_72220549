<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelontong_549;

class APIController extends Controller
{
    public function searchkelontong_549(Request $request)
    {
        $cari = $request->input('q');

        $kelontong_549 = kelontong_549::where('produk', 'LIKE', "%$cari%")->get();
        if($kelontong_549->isEmpty())
        {
            return response()->json(['success' => false, 'data' => 'Data tidak Ditemukan'], 404,)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else
        {
            return response()->json(['success' => true, 'data' => $kelontong_549], 200,)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
    }
}
