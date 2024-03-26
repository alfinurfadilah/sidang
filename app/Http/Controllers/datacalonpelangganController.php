<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Datacekcoverage;
use App\Models\Datacalonpelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DatacalonpelangganController extends Controller
{
    public function index()
    {
        //menampilkan distributor
        $datacalonpelanggan = Datacalonpelanggan::all();
        return view('datacalonpelanggan.index', [
            'datacalonpelanggan' => $datacalonpelanggan,
            'paket' => Paket::all()
        ]);
    }

    public function create()
    {
        //menampilkan form tambah user
        return view('datacalonpelanggan.create', [
            'datacalonpelanggan' => Datacalonpelanggan::all(),
            'paket' => Paket::all()
        ]);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([  
            'Nama' => 'required',
            'Foto' => 'required|image|max:2048', // Pastikan hanya menerima file gambar
            'Nomor_Handphone' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
            'id_paket' => 'required',
        ]);
    
        // Ambil data yang diperlukan dari request
        $array = $request->only([
            'Nama',
            'Nomor_Handphone', 
            'Alamat_Pemasangan',
            'Titik_Kordinat',
            'id_paket'
        ]);
    
        // Cek apakah ada file Foto yang diunggah
        if ($request->hasfile('Foto')) {
            // Simpan file Foto ke storage
            $file = $request->file('Foto');
            $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('Foto', $fileName, 'public');
    
            // Tambahkan nama file Foto ke array
            $array['Foto'] = $fileName;
        }
    
        // Buat Datacalonpelanggan baru
        $datacalonpelanggan = Datacalonpelanggan::create($array);
    
        // Temukan datacapel berdasarkan id_paket
        $datacapel = paket::find($request->id_paket);
    
        // Buat Datacekcoverage baru
        Datacekcoverage::create([
            'Nama' => $request->Nama,
            'Nomor_Handphone' => $request->Nomor_Handphone,
            'Nama_Paket' => $datacapel->Nama_Paket,
            'Alamat_Pemasangan' => $request->Alamat_Pemasangan,
            'Titik_Kordinat' => $request->Titik_Kordinat,
            'id_calon_pelanggan' => $datacalonpelanggan->id,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('datacalonpelanggan.index')->with('success_message', 'Berhasil menambah data calon pelanggan baru');
    }
    
    public function edit($id)
    {
        // Menampilkan Form Edit
        $datacalonpelanggan = Datacalonpelanggan::find($id);
        if (!$datacalonpelanggan) {
            return redirect()->route('datacalonpelanggan.index')
                ->with('error_message', 'Data Calon Pelanggan dengan ID ' . $id . ' tidak ditemukan');
        }
        return view('datacalonpelanggan.edit', [
            'datacalonpelanggan' => $datacalonpelanggan,
            'paket' => Paket::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Foto' => 'image|file|max:2048',
            'Nomor_Handphone' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
        ]);
    
        $datacalonpelanggan = Datacalonpelanggan::find($id);
        $datacapel = Paket::find($request->id_paket);
    
        if (!$datacalonpelanggan) {
            return redirect()->route('datacalonpelanggan.index')
                ->with('error_message', 'Data Calon Pelanggan dengan ID ' . $id . ' tidak ditemukan');
        }
    
        // Update atribut-atribut data calon pelanggan
        $datacalonpelanggan->Nama = $request->Nama;
        $datacalonpelanggan->Nomor_Handphone = $request->Nomor_Handphone;
        $datacalonpelanggan->Alamat_Pemasangan = $request->Alamat_Pemasangan;
        $datacalonpelanggan->Titik_Kordinat = $request->Titik_Kordinat;
    
// Proses foto baru
if ($request->hasfile('Foto')) {
    // Hapus foto lama dari storage jika ada
    Storage::disk('public')->delete('Foto/' . $datacalonpelanggan->Foto);

    // Simpan file Foto ke storage
    $file = $request->file('Foto');
    $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
    $file->storeAs('Foto', $fileName, 'public');

    // Tambahkan nama file Foto ke atribut model
    $datacalonpelanggan->Foto = $fileName;
}

        // Simpan perubahan
        $datacalonpelanggan->save();
    
        return redirect()->route('datacalonpelanggan.index')
            ->with('success_message', 'Berhasil mengubah data Calon Pelanggan');
    }
    

    

    public function destroy($id)
    {
        //Menghapus distributor
        $datacalonpelanggan = Datacalonpelanggan::find($id);
        if ($datacalonpelanggan) $datacalonpelanggan->delete();
        return redirect()->route('datacalonpelanggan.index')->with('success_message', 'Berhasil menghapus datacalonpelanggan');
    }
}  