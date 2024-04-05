<?php

namespace App\Http\Controllers;
use App\Models\Datacalonpelanggan;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{

    public function index() 
    {
        $totalDatacapel = datacalonpelanggan::count();
        return view('homeadmin', compact('totalDatacapel'));
    }
}
