<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Jadwalpemasangan;
use App\Models\Reportpemasangan;
use Illuminate\Http\Request;

class ReportpemasanganController extends Controller
{
    public function index()
    {
        //
        $reportpemasangan= Reportpemasangan::all();
        return view('reportpemasangan.index', [
            'reportpemasangan' => $reportpemasangan,
            'jadwalpemasangan' => Jadwalpemasangan::all(),
            'site' => Site::all()
            

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
        return view('reportpemasangan.create', [
            'reportpemasangan' => Reportpemasangan::all(),
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
    // dd($request->all()); //Menyimpan Data distributor baru
    $request->validate([  
    
    'nama' => 'required',
    'site' => 'nullable',
    'tanggal_pemasangan' => 'nullable',
    'waktu' => 'nullable',
    'nama_teknisi' => 'nullable',
    'hasil_radaman' => 'nullable',
    'status_pemasangan' => 'nullable',
    'kebutuhan_Access_Point' => 'nullable',
    'SN_Access_Point' => 'nullable',
    'kebutuhan_HTB' => 'nullable',
    // 'hard_survey' => 'required',
    // 'FDT' => 'required',
    // 'ODP' => 'required',
    // 'kabel' => 'required',
    // 'clamp' => 'required',
    // 'kabel_tis' => 'required',
    // 'fascon' => 'required',
    'id_jadwalpemasangan' => 'nullable'
    
        
]);

$array = $request->only([
    
    'nama',
    'site', 
    'tanggal_pemasangan',
    'waktu',
    'nama_teknisi',
    'hasil_redaman',
    'status_pemasangan',
    'kebutuhan_Access_Point',
    'SN_Access_Point',
    'kebutuhan_HTB',
    // 'FDT',
    // 'ODP',
    // 'kabel',
    // 'clamp',
    // 'kabel_tis',
    // 'fascon',
    'id_jadwalpemasangan'
    
    

   ]);
//    dd($request->all()); 
   $reportpemasangan = Reportpemasangan::create($array);
   //return redirect()->route('reportsurvey.index')->with('success_message', 'Berhasil menambah reportsurvey baru');
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
        $reportpemasangan = Reportpemasangan::find($id);
        if (!$reportpemasangan) return redirect()->route('reportpemasangan.index')
        ->with('error_message', 'reportpemasangan dengan id'.$id.' tidak
        ditemukan');
        return view('reportpemasangan.edit', [
        'reportpemasangan' => $reportpemasangan,
        'site' => Site::all()
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
        //dd($request->all);
        $request->validate([
            'nama' => 'required',
            'site' => 'nullable',
            'tanggal_pemasangan' => 'required',
            'waktu' => 'nullable',
            'nama_teknisi' => 'nullable',
            'hasil_redaman' => 'nullable',
            'status_pemasangan' => 'nullable',
            'kebutuhan_Access_Point' => 'nullable',
            'SN_Access_Point' => 'nullable',
            'kebutuhan_HTB' => 'nullable',
            // 'FDT' => 'nullable',
            // 'ODP' => 'nullable',
            // 'kabel' => 'nullable',
            // 'clamp' => 'nullable',
            // 'kabel_tis' => 'nullable',
            // 'fascon' => 'nullable',
            

            ]);
            $reportpemasangan = Reportpemasangan::find($id);
            $reportpemasangan->nama = $request->nama;
            // $reportpemasangan = Site::find($id);
            $reportpemasangan->id_site = $request->id_site;
            $reportpemasangan->tanggal_pemasangan = $request->tanggal_pemasangan;
            $reportpemasangan->waktu = $request->waktu;
            $reportpemasangan->nama_teknisi = $request->nama_teknisi;
            $reportpemasangan->hasil_redaman = $request->hasil_redaman;
            $reportpemasangan->status_pemasangan = $request->status_pemasangan;
            $reportpemasangan->kebutuhan_Access_Point = $request->kebutuhan_Access_Point;
            $reportpemasangan->SN_Access_Point = $request->SN_Access_Point;
            $reportpemasangan->kebutuhan_HTB = $request->kebutuhan_HTB;
            // $reportsurvey->FDT = $request->FDT;
            // $reportsurvey->ODP = $request->ODP;
            // $reportsurvey->kabel = $request->kabel;
            // $reportsurvey->clamp = $request->clamp;
            // $reportsurvey->kabel_tis = $request->kabel_tis;
            // $reportsurvey->fascon = $request->fascon;
            $reportpemasangan->save();
            // dd($reportsurvey);
            // $result = reportsurvey::create([
            //     'nama' => $request->nama,
            //     'id_jadwalsurvey' => $jadwalsurvey->id,
            // ]);
            return redirect()->route('reportpemasangan.index')
            ->with('success_message', 'Berhasil mengubah reportpemasangan');
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
        $reportpemasangan = Reportpemasangan::find($id);
        if ($reportpemasangan) $reportpemasangan->delete();
        return redirect()->route('reportpemasangan.index')->with('success_message', 'Berhasil menghapus reportpemasangan');
    }
}