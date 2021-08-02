<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrasibalita;
use App\Ibuhamil;
use App\User;

class RegistrasibalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $registrasibalitas = Registrasibalita::all();
        return view('HalamanAdmin.registerbalita',compact('registrasibalitas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addregisterbalita()
    {
        $ibuHamil = Ibuhamil::all();
        $users = User::where('level', 'umum')->get();
        return view('Registerbalita.addregister', compact('ibuHamil','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'namabalita'    => 'required|string',
            'tempatlahir'   => 'required|',
            'tanggallahir'  => 'required',
            'jeniskelamin'  => 'required',
            'namaayah'      => 'required|string',
            'rt'            => 'required|max:2',
            'rw'            => 'required|max:2',
            'usia'          => 'required|max:1',
            'bblahir'       => 'required',
            'pblahir'       => 'required',
            'nokk'          => 'required|min:16',
            'nikbalita'     => 'required|min:16',
            'telp'          => 'required|max:13|min:10',
            'namaibu'   => 'required',
            'punya_akun'    =>'required'
        
        ],
        [
            'namabalita.required'   => 'Nama Balita Harus diisi',
            'namabalita.required'   => 'Nama Balita Harus diisi',
            'tanggallahir.required' => 'Tanggal Lahir Harus diisi',
            'tempatlahir.required' => 'Tempat Lahir Harus diisi',
            'tempatlahir.alpha'   => 'Tempat Lahir Harus Diisi Dengan Huruf',
            'jeniskelamin.required' => 'Jenis Kelamin Harus diisi',
            'namaayah.required'     => 'Nama Ayah Harus diisi',
            'namaayah.alpha'   => 'Nama Ayah Harus Diisi Dengan Huruf',
            'namaibu.required'      => 'Nama Ibu Harus diisi',
            'namaibu.alpha'   => 'Nama Ibu Harus Diisi Dengan Huruf',
            'rt.required'           => 'RT Harus diisi',
            'rt.max'                => 'RT Maksimal 2 Karakter',
            'rw.required'           => 'RW Harus diisi',
            'rw.max'                => 'RW Maksimal 2 Karakter',
            'usia.required'         => 'Usia Harus diisi',
            'usia.max'              => 'Usia Maksimal 1 Karakter',
            'bblahir.required'      => 'Berat Badan Lahir Harus diisi',
            'pblahir.required'      => 'Panjang Badan Lahir Harus diisi',
            'nokk.required'         => 'No KK Harus diisi',
            'nokk.min'              => 'No KK Kurang dari 16 Karakter',
            'nikbalita.required'    => 'NIK Balita Harus diisi',
            'nikbalita.min'         => 'NIK Balita Kurang dari 16 Karakter',
            'telp.required'         => 'No Telp Harus Di isi',
            'telp.max'              => 'No Telp Maksimal 13 Karakter',
            'telp.min'              => 'No Telp Minimal 10 Karakter'
            
            
        ]);

        if($request->terdaftar){
            $ibuHamil = Ibuhamil::findOrFail($request->id_ibu);
        }

        Registrasibalita::create([
        'namabalita'    => $request -> namabalita,
        'tempatlahir'   => $request -> tempatlahir,
        'tanggallahir'  => $request -> tanggallahir,
        'jeniskelamin'  => $request -> jeniskelamin,
        'namaayah'      => $request -> namaayah,
        'namaibu'       => $request->terdaftar ? $ibuHamil->nama : $request -> namaibu,
        'id_ibu'        => $request->terdaftar ? $request -> id_ibu : null,
        'rt'            => $request -> rt,
        'rw'            => $request -> rw,
        'usia'          => $request -> usia,
        'bblahir'       => $request -> bblahir,
        'pblahir'       => $request -> pblahir,
        'nokk'          => $request -> nokk,
        'nikbalita'     => $request -> nikbalita,
        'telp'          => $request -> telp,
        'user_id'       => $request -> punya_akun ? $request-> user_id : null
        ]);

        return redirect('register')->with('toast_success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regbal = Registrasibalita::findorfail($id);
        return view('Registerbalita.detail',Compact('regbal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regbal = Registrasibalita::findorfail($id);
        return view('Registerbalita.editregister', Compact('regbal'));
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
        $regbal = Registrasibalita::findorfail($id);
        $rules = [
            'namabalita'    => 'required|string',
            'tempatlahir'   => 'required|',
            'tanggallahir'  => 'required',
            'jeniskelamin'  => 'required',
            'namaayah'      => 'required|string',
            'rt'            => 'required|max:2',
            'rw'            => 'required|max:2',
            'usia'          => 'required|max:1',
            'bblahir'       => 'required',
            'pblahir'       => 'required',
            'nokk'          => 'required|min:16',
            'nikbalita'     => 'required|min:16',
            'telp'          => 'required|max:13|min:10'
        ];
        $messages= [
            'namabalita.required'   => 'Nama Balita Harus diisi',
            'namabalita.required'   => 'Nama Balita Harus diisi',
            'tanggallahir.required' => 'Tanggal Lahir Harus diisi',
            'tempatlahir.required' => 'Tempat Lahir Harus diisi',
            'tempatlahir.alpha'   => 'Tempat Lahir Harus Diisi Dengan Huruf',
            'jeniskelamin.required' => 'Jenis Kelamin Harus diisi',
            'namaayah.required'     => 'Nama Ayah Harus diisi',
            'namaayah.alpha'   => 'Nama Ayah Harus Diisi Dengan Huruf',
            'namaibu.required'      => 'Nama Ibu Harus diisi',
            'namaibu.alpha'   => 'Nama Ibu Harus Diisi Dengan Huruf',
            'rt.required'           => 'RT Harus diisi',
            'rt.max'                => 'RT Maksimal 2 Karakter',
            'rw.required'           => 'RW Harus diisi',
            'rw.max'                => 'RW Maksimal 2 Karakter',
            'usia.required'         => 'Usia Harus diisi',
            'usia.max'              => 'Usia Maksimal 1 Karakter',
            'bblahir.required'      => 'Berat Badan Lahir Harus diisi',
            'pblahir.required'      => 'Panjang Badan Lahir Harus diisi',
            'nokk.required'         => 'No KK Harus diisi',
            'nokk.min'              => 'No KK Kurang dari 16 Karakter',
            'nikbalita.required'    => 'NIK Balita Harus diisi',
            'nikbalita.min'         => 'NIK Balita Kurang dari 16 Karakter',
            'telp.required'         => 'No Telp Harus Di isi',
            'telp.max'              => 'No Telp Maksimal 13 Karakter',
            'telp.min'              => 'No Telp Minimal 10 Karakter'
        ];
        $this->validate($request, $rules, $messages);
        $regbal->update($request->all());
        return redirect('register')->with('toast_success', 'Data berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regbal = Registrasibalita::findorfail($id);
        $regbal->delete();
        // return back()->with('toast_success', 'Data berhasil dihapus');
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }

    
}
