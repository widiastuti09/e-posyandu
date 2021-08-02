<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lansia;
use App\User;

class RegisterLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerlansia()
    {
        $lansias = Lansia::all();
        return view('HalamanAdmin.registerlansia',compact('lansias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('level', 'umum')->get();
        return view('Lansia.addregisterlansia', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tanggal_register'  => 'required',
            'nama'              => 'required|string',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'rt'                => 'required|integer',
            'rw'                => 'required|integer',
            'alamat'            => 'required|string',
        ],
        [
            'tanggal_register.required'          => 'Tanggal register harus di isi',
            'nama.required'                      => 'Nama Harus Diisi',        
            'tanggal_lahir.required'             => 'Tanggal lahir harus di isi',
            'jenis_kelamin.required'             => 'Jenis Kelamin harus di isi',
            'rt.required'                        => 'RT harus di isi',
            'rt.integer'                          => 'RT harus di isi angka',
            'rw.required'                        => 'RW harus di isi',
            'rw,integer'                          => 'RW harus di isi angka',
            'alamat.required'                    => 'Alamat harus di isi'
    
        

        ]);
       

        lansia::create([
        'tanggal_register' => $request -> tanggal_register,
        'nama'             => $request -> nama,
        'tanggal_lahir'    => $request -> tanggal_lahir,
        'jenis_kelamin'    => $request -> jenis_kelamin,
        'rt'               => $request -> rt,
        'rw'               => $request -> rw,
        'alamat'           => $request -> alamat,
        'user_id'       =>$request ->punya ? $request -> user_id : null
        ]);

     
        return redirect('registerlansia')->with('toast_success', 'Data berhasil Disimpan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lansias = Lansia::findorfail($id);
        return view ('Lansia.detailLansia',Compact('lansias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lansias = Lansia::findorfail($id);
        return view('Lansia.editLansia', Compact('lansias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lansias = Lansia::findorfail($id);
        $rules = [
            'tanggal_register'  => 'required',
            'nama'              => 'required|string',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'rt'                => 'required|integer',
            'rw'                => 'required|integer',
            'alamat'            => 'required|string',
        ];
        $messages = [
            'tanggal_register.required'          => 'Tanggal register harus di isi',
            'nama.required'                      => 'Nama Harus Diisi',        
            'tanggal_lahir.required'             => 'Tanggal lahir harus di isi',
            'jenis_kelamin.required'             => 'Jenis Kelamin harus di isi',
            'rt.required'                        => 'RT harus di isi',
            'rt.integer'                          => 'RT harus di isi angka',
            'rw.required'                        => 'RW harus di isi',
            'rw,integer'                          => 'RW harus di isi angka',
            'alamat.required'                    => 'Alamat harus di isi'
        ];
        $this->validate($request, $rules, $messages);
        $lansias -> update($request->all());
        return redirect('registerlansia')->with('toast_success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lansias = Lansia::findorfail($id);
        $lansias->delete();
        // return back()->with('toast_success','Data Berhasil dihapus');
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }
}
