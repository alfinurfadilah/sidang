<?php

namespace App\Http\Controllers;

use App\Models\reportpemasangan;
use App\Models\reportsurvey;
use App\Models\jadwalsurvey;
use App\Models\jadwalpemasangan;
use Illuminate\Http\Request;

class jadwalpemasanganController extends Controller
{
    public function index()
    {
        //
        $jadwalpemasangan= jadwalpemasangan::all();
        return view('jadwalpemasangan.index', [
            'jadwalpemasangan' => $jadwalpemasangan,
            'jadwalsurvey' => jadwalsurvey::all()
            

        ]);
    }

    public function create()
    {
        return view(
            'jadwalpemasangan.create' , [
            'reportsurvey' => reportsurvey::all(),
            'jadwalsurvey' => jadwalsurvey::all(),
            'surveyjadwal' => jadwalsurvey::all()

        ]);
    }

    public function store(Request $request)
    {
        //   dd($request->all());
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
        jadwalpemasangan::create($array);
        return redirect()->route('jadwalpemasangan.index')->with('success_message', 'Berhasil menambah Detail Penjualan Baru');
    }

    public function edit($id)
    {
        $jadwalpemasangan= jadwalpemasangan::find($id);
        if (!$jadwalpemasangan) return redirect()->route('jadwalpemasangan.index')
        ->with('error_message', 'jadwalpemasangan dengan id'.$id.' tidak
        ditemukan');
        return view('jadwalpemasangan.edit', [
        'jadwalpemasangan' => $jadwalpemasangan
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'nomor_handphone' => 'required',
            'nama_paket' => 'required',
            'alamat_pemasangan' => 'required',
            'tanggal_pemasangan' =>'nullable',
            'waktu' =>'nullable',
            'titik_kordinat' => 'required',
            'id_jadwalsurvey' => 'required',
            
            

            ]);
            
            $jadwalpemasangan = jadwalpemasangan::find($id);
            $jadwalpemasangan->nama = $request->nama;
            $jadwalpemasangan->nomor_handphone = $request->nomor_handphone;
            $jadwalpemasangan->nama_paket = $request->nama_paket;
            $jadwalpemasangan->alamat_pemasangan = $request->alamat_pemasangan;
            $jadwalpemasangan->tanggal_pemasangan= $request->tanggal_pemasangan;
            $jadwalpemasangan->waktu = $request->waktu;
            $jadwalpemasangan->titik_kordinat= $request->titik_kordinat;
            $jadwalpemasangan->id_jadwalsurvey= $request->id_jadwalsurvey;
            $jadwalpemasangan->save();
            // $result = reportsurvey::create([
            //     'nama' => $request->nama,
            //     'tanggal_survey'=> $request->tanggal_survey,
            //     'id_jadwalsurvey' => $jadwalsurvey->id,
            // ]);
            $result = reportpemasangan::create([
                'nama' => $request->nama,
                'id_jadwalpemasangan' => $jadwalpemasangan->id,
            ]);
            return redirect()->route('jadwalpemasangan.index')
            ->with('success_message', 'Berhasil mengubah jadwalpemasangan');
    }

    public function destroy($id)
    {
         //Menghapus pemasangan
         $jadwalpemasangan = jadwalpemasangan::find($id);

         // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
         // sendiri.');
         if ($jadwalpemasangan) $jadwalpemasangan->delete();
         return redirect()->route('jadwalpemasangan.index')->with('success_message', 'Berhasil menghapus data jadwal pemasangan');
    }
}


