<?php

namespace App\Http\Controllers;
use App\Models\paket;
use App\Models\datacalonpelanggan;
use Illuminate\Http\Request;

class paketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = paket::all();
        return view('paket.index', [
        'paket' => $paket
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create', [
            'paket' => paket::all(),
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

            'Nama_Paket' => 'required',
            'Harga_Paket' => 'required',
        
            ]);

        $array = $request->only([
    
            'Nama_Paket',
            'Harga_Paket',
        
            ]);

        $paket = paket::create($array);
        // dd($request->all());
        paket::create([
        'Nama_Paket' => $request->Nama_Paket,
        'Harga_Paket' => $request->Harga_Paket,
        ]);

        return redirect()->route('paket.index') ->with('success_message', 'Berhasil menambah paket baru');
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
        $paket = paket::find($id);
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
            'Nama_Paket' => 'required',
            'Harga_Paket' => 'required',

            ]);
            $paket = paket::find($id);
            $paket->Nama_Paket = $request->Nama_Paket;
            $paket->Harga_Paket = $request->Harga_Paket;
            $paket->save();
            return redirect()->route('paket.index')
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
        $paket = paket::find($id);
        if ($paket) $paket->delete();
        return redirect()->route('paket.index')->with('success_message', 'Berhasil menghapus paket');
    }
}
