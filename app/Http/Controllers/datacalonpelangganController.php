<?php

namespace App\Http\Controllers;

use App\Models\datacekcoverage;
use App\Models\datacalonpelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class datacalonpelangganController extends Controller
{
    public function index()
    {
        //menampilkan distributor
        $datacalonpelanggan = datacalonpelanggan::all();
        return view('datacalonpelanggan.index', [
        'datacalonpelanggan' => $datacalonpelanggan
        ]);
    }

    public function create()
    {
        //menampilkan form tambah user
        return view('datacalonpelanggan.create', [
            'datacalonpelanggan' => datacalonpelanggan::all(),
        ]);
    }

    public function store(Request $request)
    {
        //Menyimpan Data distributor baru
    $request->validate([  

    'Nama' => 'required',
    'Foto' => 'required|image|max:2048',
    'Nomor_Handphone' => 'required',
    'Nama_Paket' => 'required',
    'Alamat_Pemasangan' => 'required',
    'Titik_Kordinat' => 'required',
    // 'Hasil_Soft_Survey' => 'nullable'

    ]);
    // $request->file('Foto')->store('images');
    // dd('test');

    $array = $request->only([
        
     'Nama',
     'Foto',
     'Nomor_Handphone', 
     'Nama_Paket',
     'Alamat_Pemasangan',
     'Titik_Kordinat',
    //  'Hasil_Soft_Survey',

    ]);
    
    $array['Foto'] = $request->file('Foto')->store('Foto');
    // $tambah = datacalonpelanggan::create($array);
    // if($tambah) $request->file('Foto')->store('Foto');


    $datacalonpelanggan = datacalonpelanggan::create($array);
    // dd($request->all());
    datacekcoverage::create([
    'Nama' => $request->Nama,
    'Nomor_Handphone' => $request->Nomor_Handphone,
    'Nama_Paket' => $request->Nama_Paket,
    'Alamat_Pemasangan' => $request->Alamat_Pemasangan,
    'Titik_Kordinat' => $request->Titik_Kordinat,
    // 'Hasil_Soft_Survey' => $request->Hasil_Soft_Survey,
    'id_calon_pelanggan' => $datacalonpelanggan->id,
    ]);
        // $tambah=datacalonpelanggan::create($array);

            return redirect()->route('datacalonpelanggan.index') 
            ->with('success_message', 'Berhasil menambah datacalonpelanggan baru');
        }

public function edit($id)
    {
        //Menampilkan Form Edit
        $datacalonpelanggan = datacalonpelanggan::find($id);
        if (!$datacalonpelanggan) return redirect()->route('datacalonpelanggan.index')
        ->with('error_message', 'datacalonpelanggan dengan id'.$id.' tidak
        ditemukan');
        return view('datacalonpelanggan.edit', [
        'datacalonpelanggan' => $datacalonpelanggan
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Distributor
        $request->validate([
            'Nama' => 'required',
            'Foto' => $request->file('Foto') != null ? 'image|file|max:2048' : '',
            'Nomor_Handphone' => 'required',
            'Nama_Paket' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
            // 'Hasil_Soft_Survey' =>'nullable'

            ]);
            $datacalonpelanggan = datacalonpelanggan::find($id);
            $datacalonpelanggan->Nama = $request->Nama;
            if($request->file('Foto') != null){
                unlink("storage/" . $datacalonpelanggan->Foto);
                $datacalonpelanggan->Foto = $request->file('Foto')->store('Foto');
                }
            $datacalonpelanggan->Nomor_Handphone = $request->Nomor_Handphone;
            $datacalonpelanggan->Nama_Paket = $request->Nama_Paket;
            $datacalonpelanggan->Alamat_Pemasangan = $request->Alamat_Pemasangan;
            $datacalonpelanggan->Titik_Kordinat = $request->Titik_Kordinat;
            // $datacalonpelanggan->Hasil_Soft_Survey = $request->Hasil_Soft_Survey;
        
            $datacalonpelanggan->save();
            return redirect()->route('datacalonpelanggan.index')
            ->with('success_message', 'Berhasil mengubah datacalonpelanggan');
    }

    public function destroy($id)
    {
        //Menghapus distributor
        $datacalonpelanggan = datacalonpelanggan::find($id);

        // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
        // sendiri.');
        if ($datacalonpelanggan) $datacalonpelanggan->delete();
        return redirect()->route('datacalonpelanggan.index')->with('success_message', 'Berhasil menghapus datacalonpelanggan');
    }
}  