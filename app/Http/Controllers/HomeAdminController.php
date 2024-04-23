<?php

namespace App\Http\Controllers;
use App\Models\Datacalonpelanggan;
use App\Models\Datapembayaran;
use Illuminate\Http\Request;
use App\Models\Site;

class HomeAdminController extends Controller
{
    public function index() 
    {

        $totalSite = Site::count();
        // Menghitung total data calon pelanggan
        $totalDatacapel = Datacalonpelanggan::count();

        // Menghitung total pembayaran yang sudah dibayar
        $totaldatapembayaran = Datapembayaran::where('payment_status', 'Sudah Dibayar')->count();

        // Menghitung total pemasukan dari harga paket yang sudah dibayar
        $totalPemasukan = Datapembayaran::where('payment_status', 'Sudah Dibayar')->sum('harga_paket');

        // Mengambil data pembayaran yang belum dibayar
        $datapembayaranBelumDibayar = Datapembayaran::where('payment_status', 'Belum Dibayar')->get();

        // Mengambil data calon pelanggan dengan status survey
        $datasurvey = Datacalonpelanggan::where('status', 'Survey')->get();

        // Mengambil data calon pelanggan dengan status pemasangan
        $datapemasangan = Datacalonpelanggan::where('status', 'Pemasangan')->get();

        return view('homeadmin', compact('totalDatacapel', 'datapembayaranBelumDibayar', 'datasurvey', 'datapemasangan', 'totaldatapembayaran', 'totalPemasukan', 'totalSite'));
    }
}