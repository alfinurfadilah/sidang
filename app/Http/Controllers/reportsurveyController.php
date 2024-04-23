<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Teknisi;
use App\Models\Jadwalsurvey;
use App\Models\Jadwalpemasangan;
use App\Models\Reportsurvey;
use Illuminate\Http\Request;

class ReportsurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportsurvey = Reportsurvey::with('teknisis')->get();
        $site = site::all(); 
        return view('reportsurvey.index', [
            'reportsurvey' => $reportsurvey,
            'site' => $site,
            'teknisis' => Teknisi::all(),
            'site' => Site::all(),
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
        return view('reportsurvey.create', [
            'reportsurvey' => reportsurvey::all(),

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
    $request->validate([  
        'nama' => 'required',
        'site' => 'nullable',
        'tanggal_survey' => 'required',
        'waktu' => 'required',
        'nama_teknisi' => 'required',
        'hard_survey' => 'required',
        'status' => 'required',
        'id_jadwalsurvey' => 'nullable'
    ]);

    // Tangkap data teknisi yang dipilih dari formulir
    $selectedTeknisiIds = $request->input('nama_teknisi');

    // Buat entri baru survei laporan
    $reportsurvey = Reportsurvey::create($request->only([
        'nama',
        'site', 
        'tanggal_survey',
        'waktu',
        'nama_teknisi',
        'hard_survey',
        'status',
        'id_jadwalsurvey'
    ]));

    // Hubungkan teknisi yang dipilih dengan entri survei laporan baru
    $reportsurvey->fteknisi()->sync($selectedTeknisiIds);

    return redirect()->route('reportsurvey.index')->with('success_message', 'Berhasil menambah reportsurvey baru');
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
        $reportsurvey = Reportsurvey::find($id);
        if (!$reportsurvey) return redirect()->route('reportsurvey.index')
        ->with('error_message', 'reportsurvey dengan id'.$id.' tidak
        ditemukan');
        return view('reportsurvey.edit', [
        'reportsurvey' => $reportsurvey,
        'site' => Site::all(),
        'teknisi' => Teknisi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ReportsurveyController.php
// ReportsurveyController.php
public function update(Request $request, $id)
{
    // Validasi input
    // dd($request)->all();
    $request->validate([
        'nama' => 'required',
        'site' => 'nullable',
        'tanggal_survey' => 'nullable',
        'waktu' => 'nullable',
        'nama_teknisi' => 'required', // Ubah validasi menjadi nama_teknisi
        'hard_survey' => 'nullable',
        'status' => 'nullable',
    ]);

    // Ambil instance Reportsurvey berdasarkan ID
    $reportsurvey = Reportsurvey::find($id);
    $reportsurvey->nama = $request->nama;
    $reportsurvey->id_site = $request->id_site;
    $reportsurvey->tanggal_survey = $request->tanggal_survey;
    $reportsurvey->waktu = $request->waktu;
    
    $reportsurvey->save();
    

    // Ambil nama teknisi dari input dan cari ID-nya
    $nama_teknisi = explode(", ", $request->input('nama_teknisi', ''));
    $id_teknisi_array = [];
    foreach ($nama_teknisi as $nama) {
        // Tambahkan tanda kutip pada nilai nama dalam kueri
        $teknisi = Teknisi::where('nama_teknisi', $nama)->first();
        if ($teknisi) {
            $id_teknisi_array[] = $teknisi->id;
        }
    }
    // Sinkronkan relasi many-to-many antara Reportsurvey dan Teknisi
    $reportsurvey = Reportsurvey::find($id);
    $reportsurvey->teknisis()->sync($id_teknisi_array);
    $reportsurvey->hard_survey = $request->hard_survey;
    $reportsurvey->status = $request->status; 
    $reportsurvey->save();

    // Buat instance Jadwalpemasangan
    $result = Jadwalpemasangan::create([
        'nama' => $request->nama,
        'id_reportsurvey' => $reportsurvey->id,
    ]);

    return redirect()->route('reportsurvey.index')
        ->with('success_message', 'Berhasil mengubah reportsurvey');
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
        $reportsurvey = Reportsurvey::find($id);
        if ($reportsurvey) $reportsurvey->delete();
        return redirect()->route('reportsurvey.index')->with('success_message', 'Berhasil menghapus reportsurvey');
    }
}
