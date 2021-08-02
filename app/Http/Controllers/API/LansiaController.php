<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lansia;
use App\Pemeriksaanlansia;
use Auth;

class LansiaController extends Controller 
{
    public function __construct(){
        $this->middleware('auth_mobile');
    }

    public function lansia() {
        $lansia = Lansia::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'message' => 'Berhasil mengambil data lansia',
            'status' => 200,
            'data' => $lansia
        ]);
    }

    public function detailLansia($id){
        $lansia = Lansia::findOrFail($id);
        
        return response()->json([
            'message' => 'Berhasil mengambil data ibu hamil',
            'status' => 200,
            'data' => $lansia
        ]);
    }

    public function periksaLansia($id){
        $pemeriksaanlansia = Pemeriksaanlansia::where('namalansia_id',$id)->get();

        return response()->json([
            'message' => 'Berhasil mengambil data pemeriksaan ibu hamil',
            'status' => 200,
            'data' => $pemeriksaanlansia
        ]);
    }

}