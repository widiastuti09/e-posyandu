<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCodeVerification;

class AuthController extends Controller{

    public function __construct(){
        $this->middleware('auth_mobile')->except(['login']);
    }

    public function login(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];
        $validation = Validator::make($request->all(),$rules, $messages);

        if($validation->fails()) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'status' => 401,
                'error' => $validation->errors()
            ], 401);
        }

        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            $user = User::findOrFail(Auth::user()->id);
            $user->update(['api_token' => bcrypt($request->email)]);

            return response()->json([
                'message' => 'Login berhasil',
                'status' => 200,
                'data' => $user
            ]);
        }else{
            return response()->json([
                'message'=>'Login gagal',
                'status' => 401,
                'error' => 'Username or Password is salah'
            ], 401); 
        }


    }

    public function user(){
        $user = Auth::user();

        return response()->json([
            'message'=>'Berhasil',
            'status' => 200,
            'data' => $user
        ]);
    }
    public function updateUser(Request $request, $id){
        $nama = $request->name;
        $email = $request->email; 

        $umum = User::findOrFail($id);
        $umum->update([
            'name' => $nama,
            'email' => $email,
            'password' => $request->password ? bcrypt($request->password) : $umum->password
        ]);

        return response()->json([
            'message' => 'berhasil',
            'status' => 200,
            'data'  => $umum
        ]);

    }

    public function saveDeviceToken(Request $request){
        auth()->user()->update(['device_token' => $request->device_token]);
        return response()->json([
            'message'=>'Berhasil menyimpan token',
            'status' => 200,
        ], 200);
    }

    public function resetPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        // dd($user);

        if($user){
            $random = rand(100000,999999);
            $user->update([
                'code_digit' => $random
            ]);
            $sendMail = Mail::to($user->email)
            ->send(new SendCodeVerification($random, $user->name));
            
            return response()->json([
                'message' => 'Berhasil kirim code',
                'status' => 200
            ], 200);
        }else{
            return response()->json([
                'message' => 'Gagal kirim code',
                'status' => 403
            ], 403);   
        }
    }

    public function verificationCode(Request $request){
        $user = User::where('code_digit', $request->code_digit)->first();
        // dd($user);

        if($user){
            return response()->json([
                'message' => 'Berhasil verification code',
                'status' => 200
            ], 200);
        }else{
            return response()->json([
                'message' => 'Gagal verifikasi code',
                'status' => 403
            ], 403);   
        }
    }

    public function gantiPassword(Request $request){
        $rules = [
            'password' => 'required',
            'konfirmasi_password' => 'required',
            'code_digit' => 'required'
        ];

        $messages = [
            'required' => ':attribute harus diisi'
        ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if($validation->fails()){
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'status' => 409,
                'error' => $validation->errors()
            ], 409);
        }

        $user = User::where('code_digit', $request->code_digit)->first();
        
        if($user){
            $user->update([
                'password' => bcrypt($request->password),
                'code_digit' => null
            ]);
    
            return response()->json([
                'message' => 'Ubah password berhasil',
                'status' => 200
            ], 200);  
        }else{
            return response()->json([
                'message' => 'Gagal password berhasil',
                'status' => 403
            ], 403);  
        }
    }

}
