<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrasibalita;
use App\Lansia;
use App\Ibuhamil;
use App\User;


class BerandaController extends Controller
{
    public function index(Request $request)
    {
        return view('HalamanDepan.beranda');
    } 
 
 
    public function dashboard()
    {
        
        $jumlahregister_balita = Registrasibalita::all()->count();
        $jumlahregister_lansia = Lansia::all()->count(); 
        $jumlahregister_ibuhamil = Ibuhamil::all()->count();
        $jumlahregister_umum = User::all()->count();
        return view('HalamanDepan.dashboard',compact('jumlahregister_balita','jumlahregister_lansia','jumlahregister_ibuhamil', 'jumlahregister_umum'));
          
          
    }

}
