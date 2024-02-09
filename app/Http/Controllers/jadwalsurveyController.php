<?php

namespace App\Http\Controllers;

use App\Models\reportsurvey;
use App\Models\datacekcoverage;
use App\Models\jadwalsurvey;
use App\Models\jadwalsurveyteknisi;
use App\Models\jadwalpemasangan;
use Illuminate\Http\Request;

class jadwalsurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalsurvey  =  jadwalsurvey::all(); 
        return  view('jadwalsurvey.index',  [
            'jadwalsurvey'  =>  $jadwalsurvey
            ]);    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan form tambah user
        return view('jadwalsurvey.create', [
            'jadwalsurvey' => jadwalsurvey::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data distributor baru
    $request->validate([  

    'nama' => 'required',
    'nomor_handphone' => 'required',
    'nama_paket' => 'required',
    'alamat_pemasangan' => 'required',
    'titik_kordinat' => 'required',
    'hasil_soft_survey' => 'nullable',
    'tanggal_survey' => 'nullable',
    'waktu' => 'nullable',
    'id_cekcoverage' => 'required',
    
    

]);
$array = $request->only([
    
    'nama',
    'nomor_handphone', 
    'nama_paket',
    'alamat_pemasangan',
    'titik_kordinat',
    'hasil_soft_survey',
    'tanggal_survey',
    'waktu',
    'id_cekcoverage'
   

   ]);


   return redirect()->route('jadwalsurvey.index') 
       ->with('success_message', 'Berhasil menambah datacalonpelanggan baru');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwalsurvey = jadwalsurvey::find($id);
        if (!$jadwalsurvey) return redirect()->route('jadwalsurvey.index')
        ->with('error_message', 'jadwalsurvey dengan id'.$id.' tidak
        ditemukan');
        return view('jadwalsurvey.edit', [
        'jadwalsurvey' => $jadwalsurvey
        ]);
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
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'nomor_handphone' => 'required',
            'nama_paket' => 'required',
            'alamat_pemasangan' => 'required',
            'titik_kordinat' => 'required',
            'hasil_soft_survey' =>'nullable',
            'tanggal_survey' =>'nullable',
            'waktu' =>'nullable',
            

            ]);
            $jadwalsurvey = jadwalsurvey::find($id);
            $jadwalsurvey->nama = $request->nama;
            $jadwalsurvey->nomor_handphone = $request->nomor_handphone;
            $jadwalsurvey->nama_paket = $request->nama_paket;
            $jadwalsurvey->alamat_pemasangan = $request->alamat_pemasangan;
            $jadwalsurvey->titik_kordinat = $request->titik_kordinat;
            $jadwalsurvey->hasil_soft_survey = $request->hasil_soft_survey;
            $jadwalsurvey->tanggal_survey = $request->tanggal_survey;
            $jadwalsurvey->waktu = $request->waktu;
            $jadwalsurvey->save();
            $result = reportsurvey::create([
                'nama' => $request->nama,
                'nomor_handphone'=> $request->nomor_handphone,
                'tanggal_survey'=> $request->tanggal_survey,

                'id_jadwalsurvey' => $jadwalsurvey->id,
            ]);
            return redirect()->route('jadwalsurvey.index')
            ->with('success_message', 'Berhasil mengubah jadwalsurvey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Menghapus distributor
         $jadwalsurvey = jadwalsurvey::find($id);

         // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
         // sendiri.');
         if ($jadwalsurvey) $jadwalsurvey->delete();
         return redirect()->route('jadwalsurvey.index')->with('success_message', 'Berhasil menghapus data jadwal survey');
    }
}
