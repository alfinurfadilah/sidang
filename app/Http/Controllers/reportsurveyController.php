<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
        $reportsurvey = reportsurvey::all();
        return view('reportsurvey.index', [
        'reportsurvey' => $reportsurvey,
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
    // dd($request->all()); //Menyimpan Data distributor baru
    $request->validate([  
    
    'nama' => 'required',
    'site' => 'required',
    'tanggal_survey' => 'required',
    'waktu' => 'required',
    'nama_teknisi' => 'required',
    'hard_survey' => 'required',
    // 'FDT' => 'required',
    // 'ODP' => 'required',
    // 'kabel' => 'required',
    // 'clamp' => 'required',
    // 'kabel_tis' => 'required',
    // 'fascon' => 'required',
    'status' => 'required',
    'id_jadwalsurvey' => 'nullable'
    
        
]);

$array = $request->only([
    
    'nama',
    'site', 
    'tanggal_survey',
    'waktu',
    'nama_teknisi',
    'hard_survey',
    // 'FDT',
    // 'ODP',
    // 'kabel',
    // 'clamp',
    // 'kabel_tis',
    // 'fascon',
    'status',
    'id_jadwalsurvey'
    
    

   ]);
//    dd($request->all()); 
   $reportsurvey = Reportsurvey::create($array);
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
        $reportsurvey = Reportsurvey::find($id);
        if (!$reportsurvey) return redirect()->route('reportsurvey.index')
        ->with('error_message', 'reportsurvey dengan id'.$id.' tidak
        ditemukan');
        return view('reportsurvey.edit', [
        'reportsurvey' => $reportsurvey,
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
        // dd($request->all);
        $request->validate([
            'nama' => 'required',
            // 'site' => 'nullable',
            'tanggal_survey' => 'nullable',
            'waktu' => 'nullable',
            'nama_teknisi' => 'nullable',
            'hard_survey' => 'nullable',
            // 'FDT' => 'nullable',
            // 'ODP' => 'nullable',
            // 'kabel' => 'nullable',
            // 'clamp' => 'nullable',
            // 'kabel_tis' => 'nullable',
            // 'fascon' => 'nullable',
            'status' => 'nullable',
            

            ]);
            $reportsurvey = Reportsurvey::find($id);
            $reportsurvey->nama = $request->nama;
            $reportsurvey->id_site = $request->id_site;
            $reportsurvey->tanggal_survey = $request->tanggal_survey;
            $reportsurvey->waktu = $request->waktu;
            $reportsurvey->nama_teknisi = $request->nama_teknisi;
            $reportsurvey->hard_survey = $request->hard_survey;
            // $reportsurvey->FDT = $request->FDT;
            // $reportsurvey->ODP = $request->ODP;
            // $reportsurvey->kabel = $request->kabel;
            // $reportsurvey->clamp = $request->clamp;
            // $reportsurvey->kabel_tis = $request->kabel_tis;
            // $reportsurvey->fascon = $request->fascon;
            $reportsurvey->status = $request->status;
            $reportsurvey->save();
            // dd($reportsurvey);
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

        // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
        // sendiri.');
        if ($reportsurvey) $reportsurvey->delete();
        return redirect()->route('reportsurvey.index')->with('success_message', 'Berhasil menghapus reportsurvey');
    }
}
