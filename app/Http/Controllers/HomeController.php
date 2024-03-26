<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouterosAPI;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');
            if($API->Connect($ip, $user, $pass)){
                $identitas = $API->comm('/system/identity/print');
                $routermodel = $API->comm('/system/routerboard/print');
            }else {
                return 'Koneksi Gagal';
            }
        // dd($routermodel);
        $data = [
            'identitas' => $identitas[0]['name'],
            'routermodel' => $routermodel[0]['model'],
        ];
        return view('home', $data);

    }
}
