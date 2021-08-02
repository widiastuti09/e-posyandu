<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registrasibalita;
use App\Penimbangan;
use App\Jadwalbalita;
use Auth;

class BalitaController extends Controller
{
    public function __construct(){
        $this->middleware('auth_mobile');
    }

    public function balita(){
        $balita = Registrasibalita::where('user_id', Auth::user()->id)->get();
        
        return response()->json([
            'message' => 'Berhasil mengambil data register balita',
            'status' => 200,
            'data' => $balita 

        ]);
    }

    public function detailBalita($id) {
        $balita = Registrasibalita::findOrFail($id);
        return response()->json([
            'message' => 'Berhasil mengambil data register balita',
            'status' => 200,
            'data' => $balita 

        ]);
    }

    public function penimbanganBalita($id){
        $penimbangan = Penimbangan::where('namabalita_id', $id)->get();
        return response()->json([
            'message' => 'Berhasil mengambil data penimbangan balita',
            'status' => 200,
            'data' => $penimbangan,
        ]);
    }


}
