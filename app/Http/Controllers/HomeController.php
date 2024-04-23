<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouterosAPI;
use App\Models\Report;
use App\Models\Site;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->isadmin()) {
            return redirect()->route('dashboard.admin');
        } elseif ($user->isteknisi()) {
            return redirect()->route('dashboard');
        } else {
            // Handle other roles or scenarios
        }
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          // Menghitung total data calon pelanggan
          $totalSite = Site::count();
         

        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');
            if($API->Connect($ip, $user, $pass)){

                $hotspotactive = $API->comm('/ip/hotspot/active/print');
                $resource = $API->comm('/system/resource/print');
                $secret = $API->comm('/ppp/secret/print');
                $secretactive = $API->comm('/ppp/active/print');
                $interface = $API->comm('/interface/ethernet/print');
                $routerboard = $API->comm('/system/routerboard/print');
                $identity = $API->comm('/system/identity/print');

            }else {
                return 'Koneksi Gagal';
            }
        // dd($routermodel);
        $data = [
            'totalsecret' => count($secret),
            'totalhotspot' => count($hotspotactive),
            'hotspotactive' => count($hotspotactive),
            'secretactive' => count($secretactive),
            'cpu' => $resource[0]['cpu-load'],
            'uptime' => $resource[0]['uptime'],
            'version' => $resource[0]['version'],
            'interface' => $interface,
            'boardname' => $resource[0]['board-name'],
            'freememory' => $resource[0]['free-memory'],
            'freehdd' => $resource[0]['free-hdd-space'],
            'model' => $routerboard[0]['model'],
            'identity' => $identity[0]['name'],
        ];
        return view('home', $data, compact('totalSite'));

    }

    public function cpu()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');

        if($API->Connect($ip, $user, $pass)){
            $cpu = $API->comm('/system/resource/print');

        }else {
            return 'Koneksi Gagal';
        }
        
        $data = [
            'cpu' => $cpu['0']['cpu-load'],
        ];
        return view('realtime.cpu', $data);
    }

    public function uptime()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');

        if($API->Connect($ip, $user, $pass)){
            $uptime = $API->comm('/system/resource/print');

        }else {
            return 'Koneksi Gagal';
        }
        
        $data = [
            'uptime' => $uptime['0']['uptime'],
        ];
        return view('realtime.uptime', $data);
    }

    public function traffic($traffic)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');

        if($API->Connect($ip, $user, $pass)){
            $traffic = $API->comm('/interface/monitor-traffic', array(
                'interface' => $traffic,
                'once' => '',
            ));

            $rx = $traffic[0]['rx-bits-per-second'];
            $tx = $traffic[0]['tx-bits-per-second'];

        }else {
            return 'Koneksi Gagal';
        }
        
        $data = [
                'rx' => $rx,
                'tx' => $tx,
            ];

        return view('realtime.traffic', $data);
    }

    public function report()
    {
        $data = Report::latest()->limit(2)->get();

        return view('realtime.report', compact('data'));
    }
}
