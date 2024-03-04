<?php

namespace App\Http\Controllers;

use App\Models\Reportpemasangan;
use App\Models\Reportsurvey;
use App\Models\Jadwalsurvey;
use App\Models\Jadwalpemasangan;
use Illuminate\Http\Request;

class JadwalpemasanganController extends Controller
{
    public function index()
    {
        //
        $jadwalpemasangan= Jadwalpemasangan::all();
        // dd($nomorhandphone);
        return view('jadwalpemasangan.index', [
            'jadwalpemasangan' => $jadwalpemasangan,
            'jadwalsurvey' => Jadwalsurvey::all()
            

        ]);
    }

    public function create()
    {
        return view(
            'jadwalpemasangan.create' , [
            'reportsurvey' => Reportsurvey::all(),
            'jadwalsurvey' => Jadwalsurvey::all(),
            'surveyjadwal' => Jadwalsurvey::all()

        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'nama' => 'required',
        'nomor_handphone' => 'required',
        'nama_paket' => 'required',
        'alamat_pemasangan' => 'required',
        'tanggal_pemasangan' => 'required',
        'waktu' => 'required',
        'titik_kordinat' => 'required',
    ]);
    $array = $request->only([
    'nama','nomor_handphone', 'nama_paket', 'alamat_pemasangan','tanggal_pemasangan', 'waktu','titik_kordinat'
        ]);
        Jadwalpemasangan::create($array);
        return redirect()->route('jadwalpemasangan.index')->with('success_message', 'Berhasil menambah Detail Penjualan Baru');
    }

    public function edit($id)
    {
        $jadwalpemasangan= Jadwalpemasangan::find($id);
        if (!$jadwalpemasangan) return redirect()->route('jadwalpemasangan.index')
        ->with('error_message', 'jadwalpemasangan dengan id'.$id.' tidak
        ditemukan');
        return view('jadwalpemasangan.edit', [
        'jadwalpemasangan' => $jadwalpemasangan
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'nomor_handphone' => 'required',
            'nama_paket' => 'required',
            'alamat_pemasangan' => 'required',
            'tanggal_pemasangan' =>'nullable',
            'waktu' =>'nullable',
            'titik_kordinat' => 'required',
            // 'id_jadwalsurvey' => 'required',
            
            

            ]);
            
            $jadwalpemasangan = Jadwalpemasangan::find($id);
            $jadwalpemasangan->nama = $request->nama;
            $jadwalpemasangan->nomor_handphone = $request->nomor_handphone;
            $jadwalpemasangan->nama_paket = $request->nama_paket;
            $jadwalpemasangan->alamat_pemasangan = $request->alamat_pemasangan;
            $jadwalpemasangan->tanggal_pemasangan= $request->tanggal_pemasangan;
            $jadwalpemasangan->waktu = $request->waktu;
            $jadwalpemasangan->titik_kordinat= $request->titik_kordinat;
            // $jadwalpemasangan->id_jadwalsurvey= $request->id_jadwalsurvey;
            $jadwalpemasangan->save();
            // $result = reportsurvey::create([
            //     'nama' => $request->nama,
            //     'tanggal_survey'=> $request->tanggal_survey,
            //     'id_jadwalsurvey' => $jadwalsurvey->id,
            // ]);
            $result = Reportpemasangan::updateOrCreate(
                ['id_jadwalpemasangan' => $jadwalpemasangan->id],
                [
                'nama' => $request->nama,
                'tanggal_pemasangan' => $request->tanggal_pemasangan,
                'waktu' => $request->waktu,
                'id_jadwalpemasangan' => $jadwalpemasangan->id,
            ]);
            return redirect()->route('jadwalpemasangan.index')
            ->with('success_message', 'Berhasil mengubah jadwalpemasangan');
    }

    public function destroy($id)
    {
         //Menghapus pemasangan
         $jadwalpemasangan = Jadwalpemasangan::find($id);
         if ($jadwalpemasangan) $jadwalpemasangan->delete();
         return redirect()->route('jadwalpemasangan.index')->with('success_message', 'Berhasil menghapus data jadwal pemasangan');
    }
}


