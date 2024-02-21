<?php

namespace App\Http\Controllers;

use App\Models\paket;
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
            'datacalonpelanggan' => $datacalonpelanggan,
            'paket' => paket::all()
        ]);
    }

    public function create()
    {
        //menampilkan form tambah user
        return view('datacalonpelanggan.create', [
            'datacalonpelanggan' => datacalonpelanggan::all(),
            'paket' => paket::all()
        ]);
    }

    public function store(Request $request)
    {
    // dd($request->all());   //Menyimpan Data distributor baru
    $request->validate([  

    'Nama' => 'required',
    'Foto' => 'required|image|max:2048',
    'Nomor_Handphone' => 'required',
    // 'Nama_Paket' => 'required',
    'Alamat_Pemasangan' => 'required',
    'Titik_Kordinat' => 'required',
    'id_paket' => 'required',
    

    ]);

    $array = $request->only([
        
     'Nama',
     'Foto',
     'Nomor_Handphone', 
    //  'Nama_Paket',
     'Alamat_Pemasangan',
     'Titik_Kordinat',
     'id_paket'
     

    ]);
    
    $array['Foto'] = $request->file('Foto')->store('Foto');
    

    $datacalonpelanggan = datacalonpelanggan::create($array);
    // dd($request->all());
    $datacapel = paket::find($request->id_paket);
    datacekcoverage::create([
    'Nama' => $request->Nama,
    'Nomor_Handphone' => $request->Nomor_Handphone,
    'Nama_Paket' => $datacapel->Nama_Paket,
    'Alamat_Pemasangan' => $request->Alamat_Pemasangan,
    'Titik_Kordinat' => $request->Titik_Kordinat,
    'id_calon_pelanggan' => $datacalonpelanggan->id,
    ]);
        

            return redirect()->route('datacalonpelanggan.index') 
            ->with('success_message', 'Berhasil menambah datacalonpelanggan baru');
    }

    public function edit($id)
    {
        // Menampilkan Form Edit
        $datacalonpelanggan = datacalonpelanggan::find($id);
        if (!$datacalonpelanggan) {
            return redirect()->route('datacalonpelanggan.index')
                ->with('error_message', 'Data Calon Pelanggan dengan ID ' . $id . ' tidak ditemukan');
        }
        return view('datacalonpelanggan.edit', [
            'datacalonpelanggan' => $datacalonpelanggan,
            'paket' => paket::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'Nama' => 'required',
            'Foto' => 'image|file|max:2048',
            'Nomor_Handphone' => 'required',
            'Nama_Paket' => 'required',
            'Alamat_Pemasangan' => 'required',
            'Titik_Kordinat' => 'required',
        ]);
    
        $datacalonpelanggan = datacalonpelanggan::find($id);
        $datacapel = paket::find($request->id_paket);
        if (!$datacalonpelanggan) {
            return redirect()->route('datacalonpelanggan.index')
                ->with('error_message', 'Data Calon Pelanggan dengan ID ' . $id . ' tidak ditemukan');
        }
    
        $datacalonpelanggan->Nama = $request->Nama;
        if ($request->hasFile('Foto')) {
            // Hapus foto lama jika ada dan simpan foto baru
            unlink("storage/" . $guru->foto);
            $guru->foto = $request->file('Foto')->store('Foto');
        }
        $datacalonpelanggan->Nomor_Handphone = $request->Nomor_Handphone;
        $datacalonpelanggan->Nama_Paket = $datacapel->Nama_Paket;
        $datacalonpelanggan->Alamat_Pemasangan = $request->Alamat_Pemasangan;
        $datacalonpelanggan->Titik_Kordinat = $request->Titik_Kordinat;
    
        $datacalonpelanggan->save();
        
        return redirect()->route('datacalonpelanggan.index')
            ->with('success_message', 'Berhasil mengubah data Calon Pelanggan');
    }
    

    public function destroy($id)
    {
        //Menghapus distributor
        $datacalonpelanggan = datacalonpelanggan::find($id);
        if ($datacalonpelanggan) $datacalonpelanggan->delete();
        return redirect()->route('datacalonpelanggan.index')->with('success_message', 'Berhasil menghapus datacalonpelanggan');
    }
}  