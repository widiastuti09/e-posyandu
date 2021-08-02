<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemeriksaanIbuHamil;
use App\Ibuhamil;
use PDF;

class PemeriksaanIbuHamilController extends Controller
{
    public function index() {
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::orderBy('created_at', 'DESC')->get();

        return view('PemeriksaanIbuHamil.index', compact('pemeriksaan_ibu_hamil'));
    }

    public function create(){
        $ibuHamil = Ibuhamil::all();
        return view('PemeriksaanIbuHamil.create', compact('ibuHamil'));
    }

    public function store(Request $request){
        $rules = [
            'id_ibu' => 'required',
            'tinggibadan' => 'required',
            'hemoglobin_atas' => 'required',
            'hemoglobin_bawah' => 'required',
            'htp' => 'required',
            'hpht' => 'required',
            'beratbadan' => 'required',
            'hamilke' => 'required',
            'persalinanke' => 'required',
            'keguguranke' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);

        PemeriksaanIbuHamil::create($request->all());

        return redirect()->route('pemeriksaanibuhamil.index')->with('toast_success','Data Berhasil ditambahkan!');
    }

    public function show($id) {
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::findOrFail($id);

        return view('PemeriksaanIbuHamil.show', compact('pemeriksaan_ibu_hamil'));
    }

    public function edit($id) {
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::findOrFail($id);
        $ibuHamil = Ibuhamil::all();

        return view('PemeriksaanIbuHamil.edit', compact('pemeriksaan_ibu_hamil','ibuHamil'));
    }

    public function update(Request $request, $id){
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::findOrFail($id);
        $rules = [
            'id_ibu' => 'required',
            'tinggibadan' => 'required',
            'hemoglobin_atas' => 'required',
            'hemoglobin_bawah' => 'required',
            'htp' => 'required',
            'hpht' => 'required',
            'beratbadan' => 'required',
            'hamilke' => 'required',
            'persalinanke' => 'required',
            'keguguranke' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);
        $pemeriksaan_ibu_hamil->update($request->all());

        return redirect()->route('pemeriksaanibuhamil.index')->with('toast_success','Data Berhasil diubah!');
    }

    public function destroy($id) {
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::findOrFail($id);
        $pemeriksaan_ibu_hamil->delete();

        // return redirect()->route('pemeriksaanibuhamil.index')->with('toast_success','Data Berhasil dihapus!');
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }
    public function print()
    {
        $pemeriksaan_ibu_hamil = PemeriksaanIbuHamil::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadview('Laporan.CetakBumil', compact('pemeriksaan_ibu_hamil'))->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
