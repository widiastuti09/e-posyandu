<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        // dd($request->all());
        $rules = [
            'email' => 'required',
            'password' => 'required|min:8',
        ];
        $messages = [
            'required' => ':attribute harus diisi',
            'min:8'     => ':attribute minimal 8 karakter'
        ];
        $this->validate($request, $rules, $messages);
        if(Auth::attempt($request->only('email','password'))){
            
            $user = User::where('email', $request->email)->first();
            if($user->level == 'admin'){
                // dd("INI ADMIN");
                return redirect('/beranda');
            }else if($user->level == 'user'){
                return redirect('/beranda');
            }else{
                return redirect('/beranda');
            }
        }
        return redirect ('login');
    }
    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    
}
