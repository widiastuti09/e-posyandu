<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemeriksaanlansia;
use App\Lansia;
use PDF;

class PemeriksaanLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pemeriksaanlansias = Pemeriksaanlansia::with('lansias')->get();
        // dd($pemeriksaanlansias);

        return view('HalamanUser.pemeriksaanLansia',compact('pemeriksaanlansias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plansia = Lansia::all();
        return view('PemeriksaanLansia.addpemeriksaan',compact('plansia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response'
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'namalansia_id'     =>  'required',
            'tanggal_periksa'   =>  'required',
            'berat_badan'       =>  'required|integer',
            'tinggi_badan'      =>  'required|integer',
            'lingkar_pinggang'  =>  'required|',
            'tekanan_darah'     =>  'required|',
            'glukosa_darah'     =>  'required',
            'lemak_tubuh'       =>  'required',
            'imt'               =>  'required',
            'lemak_perut'       =>  'required',
            'kolestrol'         =>  'required',
            'asam_urat'         =>  'required',
            'makan_berlemak'    =>  'required|integer',
            'makan_manis'       =>  'required|integer',
            'zat_adiktif'       =>  'required|integer',
            'jelantah'          =>  'required',
            'merokok'           =>  'required',
            'olahraga'          =>  'required|integer',
            'keterangan'        =>  'required|string',

        ],
        [
            'namalansia_id.required'    => 'Nama Lansia harus di isi',     
            'tanggal_periksa.required'  => 'Tanggal Periksa harus di isi',   
            'berat_badan.required'      => 'Berat badan harus di isi',
            'berat_badan.integer'       => 'Berat badan harus di isi angka',
            'tinggi_badan.required'     => 'Tinggi badan harus di isi',
            'tinggi_badan.integer'      => 'Tinggi badan harus di isi angka',
            'lingkar_pinggang.required' => 'Lingkar pinggang harus di isi',
            'tekanan_darah.required'    => 'Tekanan darah harus di isi',
            'glukosa_darah.required'    => 'Glukosa darah harus di isi',
            'lemak_tubuh.required'      => 'Lemak tubuh harus di isi',
            'imt.required'              => 'IMT harus di isi',
            'lemak_perut.required'      => 'Lemak perut harus di isi',
            'kolestrol.required'        => 'Kolestrol harus di isi',
            'asam_urat.required'        => 'Asam urat harus di isi',
            'makan_berlemak.required'   => 'Makan berlemak harus di isi',
            'makan_berlemak.integer'   => 'Makan berlemak harus di isi angka',
            'makan_manis.required'      => 'Makan Manis harus di isi',
            'makan_manis.integer'      => 'Makan Manis harus di isi angka',
            'zat_adiktif.required'      => 'Zat Adiktif harus di isi', 
            'zat_adiktif.integer'      => 'Zat Adiktif harus di isi angka', 
            'jelantah.required'         => 'Jelantah harus di isi',
            'jelantah.integer'         => 'Jelantah harus di isi angka',
            'merokok.required'          => 'Merokok harus di isi',
            'olahraga.required'         => 'Olahraga harus di isi',
            'olahraga.integer'         => 'Olahraga harus di isi angka',
            'keterangan.required'       => 'Keterangan harus di isi'

        ]);
        Pemeriksaanlansia::create([
            'namalansia_id'     => $request ->namalansia_id, 
            'tanggal_periksa'   => $request ->tanggal_periksa, 
            'berat_badan'       => $request ->berat_badan, 
            'tinggi_badan'      => $request ->tinggi_badan,     
            'lingkar_pinggang'  => $request ->lingkar_pinggang, 
            'tekanan_darah'     => $request ->tekanan_darah,
            'glukosa_darah'     => $request ->glukosa_darah, 
            'lemak_tubuh'       => $request ->lemak_tubuh, 
            'imt'               => $request ->imt, 
            'lemak_perut'       => $request ->lemak_perut, 
            'kolestrol'         => $request ->kolestrol, 
            'asam_urat'         => $request ->asam_urat, 
            'makan_berlemak'    => $request ->makan_berlemak,
            'makan_manis'       => $request ->makan_manis, 
            'zat_adiktif'       => $request ->zat_adiktif, 
            'jelantah'          => $request ->jelantah, 
            'merokok'           => $request ->merokok, 
            'olahraga'          => $request ->olahraga, 
            'keterangan'        => $request -> keterangan,
            'penyakit'          => $request ->penyakit,

        ]);

        return redirect('pemeriksaanlansia')->with('toast_success','Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plansia = Pemeriksaanlansia::findorfail($id);
        return view ('PemeriksaanLansia.detailpemeriksaan',Compact('plansia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lansia = Lansia::all();
        $plansia = Pemeriksaanlansia::with('lansias')->findOrFail($id);

        return view('PemeriksaanLansia.editpemeriksaanlansia',compact('plansia','lansia'));
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
        $plansia = Pemeriksaanlansia::findOrfail($id);
        $rules = [
            'namalansia_id'     =>  'required',
            'tanggal_periksa'   =>  'required',
            'berat_badan'       =>  'required|integer',
            'tinggi_badan'      =>  'required|integer',
            'lingkar_pinggang'  =>  'required|',
            'tekanan_darah'     =>  'required|',
            'glukosa_darah'     =>  'required',
            'lemak_tubuh'       =>  'required',
            'imt'               =>  'required',
            'lemak_perut'       =>  'required',
            'kolestrol'         =>  'required',
            'asam_urat'         =>  'required',
            'makan_berlemak'    =>  'required|integer',
            'makan_manis'       =>  'required|integer',
            'zat_adiktif'       =>  'required|integer',
            'jelantah'          =>  'required',
            'merokok'           =>  'required',
            'olahraga'          =>  'required|integer',
            'keterangan'        =>  'required|string',
        ];
        $messages = [
            'namalansia_id.required'    => 'Nama Lansia harus di isi',     
            'tanggal_periksa.required'  => 'Tanggal Periksa harus di isi',   
            'berat_badan.required'      => 'Berat badan harus di isi',
            'berat_badan.integer'       => 'Berat badan harus di isi angka',
            'tinggi_badan.required'     => 'Tinggi badan harus di isi',
            'tinggi_badan.integer'      => 'Tinggi badan harus di isi angka',
            'lingkar_pinggang.required' => 'Lingkar pinggang harus di isi',
            'tekanan_darah.required'    => 'Tekanan darah harus di isi',
            'glukosa_darah.required'    => 'Glukosa darah harus di isi',
            'lemak_tubuh.required'      => 'Lemak tubuh harus di isi',
            'imt.required'              => 'IMT harus di isi',
            'lemak_perut.required'      => 'Lemak perut harus di isi',
            'kolestrol.required'        => 'Kolestrol harus di isi',
            'asam_urat.required'        => 'Asam urat harus di isi',
            'makan_berlemak.required'   => 'Makan berlemak harus di isi',
            'makan_berlemak.integer'   => 'Makan berlemak harus di isi angka',
            'makan_manis.required'      => 'Makan Manis harus di isi',
            'makan_manis.integer'      => 'Makan Manis harus di isi angka',
            'zat_adiktif.required'      => 'Zat Adiktif harus di isi', 
            'zat_adiktif.integer'      => 'Zat Adiktif harus di isi angka', 
            'jelantah.required'         => 'Jelantah harus di isi',
            'jelantah.integer'         => 'Jelantah harus di isi angka',
            'merokok.required'          => 'Merokok harus di isi',
            'olahraga.required'         => 'Olahraga harus di isi',
            'olahraga.integer'         => 'Olahraga harus di isi angka',
            'keterangan.required'       => 'Keterangan harus di isi'
        ];
        $this->validate($request, $rules, $messages);
        $plansia->update($request->all());
        return redirect('pemeriksaanlansia')->with('toast_success','Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plansia = Pemeriksaanlansia::findOrFail($id);
        $plansia->delete();
        // return back()->with('toast_success', 'Data berhasil dihapus!');
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }
    public function print()
    {
        $pemeriksaanlansias = Pemeriksaanlansia::with('lansias')->get();
        $pdf = PDF::loadview('Laporan.CetakLansia', compact('pemeriksaanlansias'))->setPaper('A4','lanscape');
        return $pdf->stream();

    }
}
