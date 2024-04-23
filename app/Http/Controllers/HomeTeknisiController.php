<?php

namespace App\Http\Controllers;
use App\Models\Jadwalsurvey;
use App\Models\Jadwalpemasangan;
use App\Models\Teknisi;
use App\Models\Datacalonpelanggan;
use App\Models\Datapembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Site;

class HomeTeknisiController extends Controller
{
    
    public function index() 
    {
        // Menghitung total data calon pelanggan
        $totalSite = Site::count();

        // Ambil tanggal hari ini
        $today = Carbon::now()->toDateString();

        // Ambil jadwal survey terbaru yang belum melewati hari ini
        $totalJadwalSurvey = Jadwalsurvey::whereDate('tanggal_survey', '>=', $today)->count();

        // Ambil jadwal survey terbaru yang belum melewati hari ini
        $totalJadwalPemasangan= JadwalPemasangan::whereDate('tanggal_pemasangan', '>=', $today)->count();

        // Ambil jadwal survey terbaru
        $jadwalsurvey = Jadwalsurvey::whereDate('tanggal_survey', '>=', $today)->get();

        // Ambil jadwal pemasangan terbaru
        $jadwalpemasangan = Jadwalpemasangan::whereDate('tanggal_pemasangan', '>=', $today)->get();

        // Menghitung total data calon pelanggan
        $totalTeknisi = Teknisi::count();

        // Menghitung total pembayaran yang sudah dibayar
        $totaldatapembayaran = Datapembayaran::where('payment_status', 'Sudah Dibayar')->count();

        // Menghitung total pemasukan dari harga paket yang sudah dibayar
        $totalPemasukan = Datapembayaran::where('payment_status', 'Sudah Dibayar')->sum('harga_paket');

        // Mengambil data calon pelanggan dengan status survey
        $datasurvey = Datacalonpelanggan::where('status', 'Survey')->get();

        // Mengambil data calon pelanggan dengan status pemasangan
        $datapemasangan = Datacalonpelanggan::where('status', 'Pemasangan')->get();

        return view('hometeknisi', compact('totalTeknisi', 'datasurvey', 'datapemasangan', 'totaldatapembayaran', 'totalPemasukan', 'jadwalsurvey', 'jadwalpemasangan' ,'totalSite', 'totalJadwalPemasangan', 'totalJadwalSurvey'));
    }
    
}