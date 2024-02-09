<?php

namespace App\Http\Controllers;

use App\Models\jadwalpemasangan;
use App\Models\reportpemasangan;
use Illuminate\Http\Request;

class reportpemasanganController extends Controller
{
    public function index()
    {
        //
        $reportpemasangan= reportpemasangan::all();
        return view('reportpemasangan.index', [
            'reportpemasangan' => $reportpemasangan,
            'jadwalpemasangan' => jadwalpemasangan::all()
            

        ]);
    }
}