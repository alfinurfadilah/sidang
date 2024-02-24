<?php

namespace App\Http\Controllers;

use App\Models\site;
use App\Models\reportsurvey;
use Illuminate\Http\Request;

class siteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = site::all();
        return view('site.index', [
        'site' => $site
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.create', [
            'site' => site::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([  

            'site' => 'required',
            'alamat_site' => 'required',
        
            ]);

        $array = $request->only([
    
            'site',
            'alamat_site',
        
            ]);

        // $paket = paket::create($array);
        // dd($request->all());
        site::create([
        'site' => $request->site,
        'alamat_site' => $request->alamat_site,
        ]);

        return redirect()->route('site.index') ->with('success_message', 'Berhasil menambah site baru');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = site::find($id);
        if (!$site) return redirect()->route('site.index')
        ->with('error_message', 'site dengan id'.$id.' tidak ditemukan');
        return view('site.edit', [
        'site' => $site
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
            'site' => 'required',
            'alamat_site' => 'required',

            ]);
            $site = site::find($id);
            $site->site = $request->site;
            $site->alamat_site = $request->alamat_site;
            $site->save();
            return redirect()->route('site.index')
            ->with('success_message', 'Berhasil mengubah paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = site::find($id);
        if ($site) $site->delete();
        return redirect()->route('site.index')->with('success_message', 'Berhasil menghapus site');
    }
}

