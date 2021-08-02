<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ibuhamil;
use App\User;

class RegisterIbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerhamil()
    {
        $ibuhamils = Ibuhamil::all();
     return view('HalamanAdmin.registeribuhamil',compact('ibuhamils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('level', 'umum')->get();
        return view('RegisterIbuHamil.addregister', compact('users'));
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
            'nama'          => 'required|string',
            'tgllahir'      => 'required',
            'namasuami'     => 'required|string',
            'goldarah'      => 'required',
            'usia'          => 'required|max:2',
            'rt'            => 'required|max:2',
            'rw'            => 'required|max:2',
            'telp'          => 'required|max:13',
            'tglregister'   => 'required'
        ],
        [
            'nama.required'         => 'Nama Harus di isi',
            'tgllahir.required'     => 'Tanggal Lahir Harus di isi',
            'namasuami.required'    => 'Nama Suami Harus di isi',
            'namasuami.alpha'       => 'Nama Suami Harus di isi Karakter Huruf',
            'goldarah.required'     => 'Golongan Darah Harus di isi',
            'usia.required'         => 'Usia Harus di isi',
            'usia.max'              => 'Usia Maksimal 2 Karakter',
            'rt.required'           => 'RT Harus di isi',
            'rt.max'                => ' RT Maksimal 2 Karakter',
            'rw.required'           => 'RW Harus di isi',
            'telp.required'         => 'Telp Harus di isi',
            'tglregister.required'  => 'Tanggal Register Harus di isi' 
        ]);
        // dd($request->all());
        Ibuhamil::create([
            'nama'          =>$request->nama, 
            'tgllahir'      =>$request->tgllahir, 
            'namasuami'     =>$request->namasuami, 
            'goldarah'      =>$request->goldarah, 
            'usia'          =>$request->usia,
            'rt'            =>$request ->rt, 
            'rw'            =>$request ->rw,
            'telp'          =>$request ->telp, 
            'tglregister'   =>$request ->tglregister,
            'user_id'       =>$request ->punya ? $request -> user_id : null
        ]);

        return redirect('registeribuhamil')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regmil = Ibuhamil::findorfail($id);
        return view ('RegisterIbuHamil.detail',Compact('regmil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regmil = Ibuhamil::findorfail($id);
        return view('RegisterIbuHamil.editregister', Compact('regmil'));
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
        $regmil = Ibuhamil::findorfail($id);
        $rules= [
            'nama'          => 'required|string',
            'tgllahir'      => 'required',
            'namasuami'     => 'required|string',
            'goldarah'      => 'required',
            'usia'          => 'required|max:2',
            'rt'            => 'required|max:2',
            'rw'            => 'required|max:2',
            'telp'          => 'required|max:13',
            'tglregister'   => 'required' 
        ];

        $messages= [
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, $rules, $messages);
        $regmil->update($request->all());
        return redirect('registeribuhamil')->with('toast_success','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regmil = Ibuhamil::findorfail($id);
        $regmil->delete();
        // return back()->with('toast_success','Data Berhasil Dihapus');
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }
}
