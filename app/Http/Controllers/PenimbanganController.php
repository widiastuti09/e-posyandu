<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penimbangan;
use App\Registrasibalita;
use PDF;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penimbangan()
    {
        $penimbangans = Penimbangan::with('registrasibalitas')->get();
        // $penimbangans = Penimbangan::with('registrasibalitas')->paginate(5);
        // dd($penimbangans);
        // $penimbangans =  Penimbangan::paginate(5);

        return view('HalamanUser.penimbangan',compact('penimbangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addpenimbangan()
    {
        $regbal = Registrasibalita::all();
        return view('Penimbangan.addpenimbangan',compact('regbal'));
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
            'namabalita_id' => 'required',
            'tanggal'       => 'required',
            'jenis_imunisasi' => 'required',
            'beratbadan'    => 'required',
            'imp'           => 'required',
            'kia'           => 'required',
            'vitamin'       => 'required'
        ]);
        // dd($request->all());
        Penimbangan::create([
            
            'namabalita_id' => $request->namabalita_id,
            'tanggal' => $request->tanggal,
            'jenis_imunisasi' => $request->jenis_imunisasi,
            'beratbadan' => $request->beratbadan,
            'imp' => $request->imp,
            'kia' => $request->kia,
            'vitamin' => $request->vitamin,
            'penyakit' => $request->penyakit
        ]);

        return redirect('penimbangan')->with('toast_success', 'Data berhasil disimpan!');
        ;
    }
   



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pen = Penimbangan::findorfail($id);
        return view ('Penimbangan.detailpenimbangan', compact('pen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpenimbangan($id)
    {
        $regbal = Registrasibalita::all();
        $pen = Penimbangan::with('registrasibalitas')->findOrFail($id);
        
        return view('Penimbangan.editpenimbangan', compact('pen','regbal'));
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
        $pen = Penimbangan::findOrFail($id);
        $rules=[
            'namabalita_id' => 'required',
            'tanggal'       => 'required',
            'jenis_imunisasi' => 'required',
            'beratbadan'    => 'required',
            'imp'           => 'required',
            'kia'           => 'required',
            'vitamin'       => 'required'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);
        $pen->update($request->all());
        return redirect('penimbangan')->with('toast_success', 'Data berhasil diedit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pen = Penimbangan::findOrFail($id);
        $pen->delete();
        // return back()->with('toast_success', 'Data berhasil dihapus!');
        return response()->json(['status'=>'Data Berhasil dihapus !']);


    }

    public function print()
    {
        $penimbangan = Penimbangan::with('registrasibalitas')->get();
        $pdf = PDF::loadview('Laporan.CetakBalita', compact('penimbangan'))->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
