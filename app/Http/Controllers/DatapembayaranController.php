<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapembayaran;
use App\Models\Paket;

class DatapembayaranController extends Controller
{
    public function index()
    {
        //menampilkan distributor
        $datapembayaran = Datapembayaran::all();
        return view('datapembayaran.index', [
            'datapembayaran' => $datapembayaran,
            'paket' => Paket::all()
        ]);
    }

    public function create()
    {
        //menampilkan form tambah user
        return view('datapembayaran.create', [
            'datapembayaran' => Datapembayaran::all(),
            'paket' => Paket::all()
        ]);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([  
            'id_pelanggan'=> 'required',
            'nama'=> 'required',
            'harga_paket'=> 'required',
            'payment_status' => 'required|boolean', // Validasi untuk payment_status
            'bulan'=>'required',
            'tahun'=>'required',
            'id_paket'=> 'required',
        ]);
    
        // Ambil data yang diperlukan dari request
        $array = $request->only([
            'id_pelanggan',
            'nama',
            'harga_paket',
            'payment_status',
            'bulan',
            'tahun',
            'id_paket'
        ]);
    
        // Buat Datacalonpelanggan baru
        $datapembayaran = Datapembayaran::create($array);
    
        // Temukan datacapel berdasarkan id_paket
        $datapel = paket::find($request->id_paket);

        // Redirect dengan pesan sukses
        return redirect()->route('datapembayaran.index')->with('success_message', 'Berhasil menambah data calon pelanggan baru');
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        if (!$paket) return redirect()->route('paket.index')
        ->with('error_message', 'paket dengan id'.$id.' tidak ditemukan');
        return view('paket.edit', [
        'paket' => $paket
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
        $request->validate([
            'id_pelanggan' => 'required',
            'nama' => 'required',
            'harga_paket' => 'required',
            'payment_status' => 'required|boolean', // Validasi untuk payment_status
            'bulan'=>'required',
            'tahun'=>'required',
            'id_paket'=> 'required',

            ]);
            $datapembayaran = Datapembayaran::find($id);
            $datapembayaran->id_pelanggan = $request->id_pelanggan;
            $datapembayaran->nama = $request->nama;
            $datapembayaran->harga_paket = $request->harga_paket;
            $datapembayaran->payment_status = $request->payment_status;
            $datapembayaran->bulan = $request->bulan;
            $datapembayaran->tahun = $request->tahun;
            $datapembayaran->save();
            return redirect()->route('datapembayaran.index')
            ->with('success_message', 'Berhasil Mengubah data Pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapembayaran = Datapembayaran::find($id);
        if ($datapembayaran) $datapembayaran->delete();
        return redirect()->route('datapembayaran.index')->with('success_message', 'Berhasil menghapus Data Pembayaran');
    }
}
