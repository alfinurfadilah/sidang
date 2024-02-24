<?php

namespace App\Http\Controllers;

use App\Models\jadwalsurvey;
use App\Models\datacalonpelanggan;
use App\Models\datacekcoverage;

use Illuminate\Http\Request;

class datacekcoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacekcoverage  =  datacekcoverage::all();   
        // dd($datacekcoverage);
        return  view('datacekcoverage.index',  [
            'datacekcoverage'  =>  $datacekcoverage
            ]);    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'datacekcoverage.create',[
            'datacekcoverage' => datacekcoverage::all(),
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
        'Nama'=>'required',
        'Nomor_Handphone' => 'required',
        'Nama_Paket' =>'required',
        'Alamat_Pemasangan' =>'required',
        'Titik_Kordinat' =>'required',
        'Hasil_Soft_Survey' => 'nullable',
        'Id_Calon_Pelanggan' => 'required',

    ]);
    $array = $request->only([
    'Nama', 
    'Nomor_Handphone', 
    'Nama_Paket',
    'Alamat_Pemasangan',
    'Titik_Kordinat',
    'Hasil_Soft_Survey',
    'Id_Calon_Pelanggan'
    ]);

    // jadwalsurvey::create([
    //     'Nama' => $request->Nama,
    //     'Nomor_Handphone' => $request->Nomor_Handphone,
    //     'Nama_Paket' => $request->Nama_Paket,
    //     'Alamat_Survey' => $request->Alamat_Pemasangan,
    //     'Titik_Kordinat' => $request->Titik_Kordinat,
    //     'Hasil_Soft_Survey' => $request->Hasil_Soft_Survey,
    //     'Tanggal_Survey' => $request->Tanggal_Survey,
    //     'Waktu' => $request->Waktu,
    //     'id_cekcoverage' => $datacekcoverage->id,
    //     ]);

return redirect()->route('datacekcoverage.index') 
->with('success_message', 'Berhasil menambah data');
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
        $datacekcoverage = datacekcoverage::find($id);
        if (!$datacekcoverage) return redirect()->route('datacekcoverage.index')
        ->with('error_message', 'datacekcoverage dengan id'.$id.' tidak
        ditemukan');
        return view('datacekcoverage.edit', [
        'datacekcoverage' => $datacekcoverage
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
        // dd($request );
        $request->validate([
            'Nama' => 'required',
            'Nomor_Handphone' => 'required',
            'Nama_Paket' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
            'Hasil_Soft_Survey' =>'nullable',
            

            ]);
            $datacekcoverage = datacekcoverage::find($id);
            $datacekcoverage->Nama = $request->Nama;
            $datacekcoverage->Nomor_Handphone = $request->Nomor_Handphone;
            $datacekcoverage->Nama_Paket = $request->Nama_Paket;
            $datacekcoverage->Alamat_Pemasangan = $request->Alamat_Pemasangan;
            $datacekcoverage->Titik_Kordinat = $request->Titik_Kordinat;
            $datacekcoverage->Hasil_Soft_Survey = $request->Hasil_Soft_Survey;
            $datacekcoverage->save();
            $result = jadwalsurvey::updateOrCreate(
                ['id_cekcoverage' => $datacekcoverage->id],
                [
                'nama' => $request->Nama,
                'nomor_handphone' => $request->Nomor_Handphone,
                'nama_paket' => $request->Nama_Paket,
                'alamat_pemasangan' => $request->Alamat_Pemasangan,
                'titik_kordinat' => $request->Titik_Kordinat,
                'hasil_soft_survey' => $request->Hasil_Soft_Survey,
                'tanggal_survey' => $request->Tanggal_Survey,
                'waktu' => $request->Waktu,
                'id_cekcoverage' => $datacekcoverage->id,
            ]);
            
            return redirect()->route('datacekcoverage.index')
            ->with('success_message', 'Berhasil mengubah datacekcoverage');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
