<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use Illuminate\Http\Request;
// use RealRashid\SweetAlert\Facades\Alert;

class PppoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');
            if($API->Connect($ip, $user, $pass)){
                $secret = $API->comm('/ppp/secret/print');
                $profile = $API->comm('/ppp/profile/print');
            }else {
                return 'Koneksi Gagal';
            }
        // dd($routermodel);
        $data = [
            'totalsecret' => count($secret),
            'secret' => $secret,
            'profile' => $profile,
        ];

        // dd($data);

        return  view('pppoe.secret', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $request->validate([
            'user'=>'required',
            'password' => 'required',
        ]);


        // dd($request)->all;
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API -> debug('false');

        if($API->connect($ip, $user, $pass)){
           $API-> comm('/ppp/secret/add',array (
            'name'=> $request['user'],
            'password'=> $request['password'],
            'service'=> $request['service'] == ''? 'any' : $request['service'],
            'profile'=> $request['profile'] == ''? 'default' : $request['profile'],
            'local-address'=> $request['localaddress'] =='' ? '0.0.0.0' : $request['localaddress'],
            'remote-address'=> $request['remoteaddress'] =='' ? '0.0.0.0' : $request['remoteaddress'],
            'comment'=> $request['comment'] =='' ? '' : $request['comment'],

           ));
        //  dd($request)->all;   
        }else {
            return 'Koneksi Gagal';
        }
        return  redirect()->route('pppoe.secret');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ip = session()->get('ip');
		$user = session()->get('user');
		$pass = session()->get('pass');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $pass)) {

			$getuser = $API->comm('/ppp/secret/print', [
				"?.id" => '*' . $id,
			]);

			$secret = $API->comm('/ppp/secret/print');
			$profile = $API->comm('/ppp/profile/print');

			$data = [
				'user' => $getuser[0],
				'secret' => $secret,
				'profile' => $profile,
			];

			// dd($data);

			return view('pppoe.edit', $data);
		} else {

			return redirect('failed');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user'=>'required',
            'password' => 'required',
        ]);

        $ip = session()->get('ip');
		$user = session()->get('user');
		$pass = session()->get('pass');
		$API = new RouterosAPI();
		$API->debug = false;

		$API->connect($ip, $user, $pass);

		$API->comm("/ppp/secret/set", [
			".id" => $request['id'],
			'name' => $request['user'] == '' ? $request['user'] : $request['user'],
			'password' => $request['password'] == '' ? $request['password'] : $request['password'],
			'service' => $request['service'] == '' ? $request['service'] : $request['service'],
			'profile' => $request['profile'] == '' ? $request['profile'] : $request['profile'],
			'disabled' => $request['disabled'] == '' ? $request['disabled'] : $request['disabled'],
			'local-address' => $request['localaddress'] == '' ? $request['localaddress'] : $request['localaddress'],
			'remote-address' => $request['remoteaddress'] == '' ? $request['remoteaddress'] : $request['remoteaddress'],
			'comment' => $request['comment'] == '' ? $request['comment'] : $request['comment'],
		]);


		// Alert::success('Success', 'Selamat anda Berhasil mengupdate secret PPPoE');
		return redirect()->route('pppoe.secret');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ip = session()->get('ip');
		$user = session()->get('user');
		$pass = session()->get('pass');
		$API = new RouterosAPI(); 
		$API->debug = false;

		if ($API->connect($ip,$user, $pass)) {

			$API->comm('/ppp/secret/remove', [
				'.id' => '*' . $id
			],);

			// Alert::success('Success', 'Selamat anda Berhasil menghapus secret PPPoE');
			return redirect()->route('pppoe.secret');
		} else {

			return redirect('failed');
		}
    }
}
