<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwalbalita;
use App\User;
use Carbon\Carbon;


class JadwalbalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jadbal = Jadwalbalita::all();
        $jadbal= Jadwalbalita::orderBy('tanggal','desc')->get();
        return view('Jadwal.Balita.jadwal',compact('jadbal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadbal = Jadwalbalita::all();
        return view('Jadwal.Balita.addjadwal', compact('jadbal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'waktu'     => 'required',
            'keterangan' => 'required',
            'status'       => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);

        $jadwal = Jadwalbalita::create([
            'tanggal' => $request -> tanggal,
            'waktu'     => $request -> waktu,
            'keterangan' => $request -> keterangan,
            'status'      => $request -> status,
        ]);

        
        $deviceToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $this->sendNotification("Jadwal", 
        "Jadwal pemeriksaan balita tanggal ".Carbon::parse($request->tanggal)->format('d M Y')." pukul ".$request->waktu, 
        $deviceToken,
        $jadwal);
        
        return redirect('/Jadwal-Balita')->with('toast_success', 'Data berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadbal = Jadwalbalita::findorfail($id);
        return view ('Jadwal.Balita.detailjadwal', Compact('jadbal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadbal = Jadwalbalita::findorfail($id);
        return view('Jadwal.Balita.editjadwal', Compact('jadbal'));
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
        $jadbal = Jadwalbalita::findorfail($id);
        $rules = [
            'tanggal' => 'required',
            'waktu'     => 'required',
            'keterangan' => 'required',
            'status'       => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);
        $jadbal ->update($request->all());
        
        return redirect('/Jadwal-Balita')->with('toast_success', 'Data berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadbal = Jadwalbalita::findOrFail($id);
        $jadbal->delete();
        // return back()->with('toast_success', 'Data berhasil Dihapus!');  
        return response()->json(['status'=>'Data Berhasil dihapus !']);

    }

    public function sendNotification($title, $body, $token, $jadwal){
        $data = [
            'title' => $title,
            'body' => $body,
            'click_action' => 'com.example.e_posyandu.JADWAL_BALITA'
        ];

        $device_token = [];

        foreach($token as $t){
            $device_token[] = $t;
        }
        $payload = [
            'registration_ids' => $device_token,
            'notification' => $data,
            'data' => $jadwal
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=".env('FIREBASE_SERVER_KEY')
            ),
        ));

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);
        
        return response()->json([
            'message' => 'Berhasil mengirim notif',
            'status' => 200,
            'data' => json_encode($response)
        ], 200);
    }
}
