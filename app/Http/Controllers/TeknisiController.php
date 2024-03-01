<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = Teknisi::all();
        return view('teknisi.index', [
        'teknisi' => $teknisi,
        'site' => Site::all()
        
        ]);
    }

    public function create()
    {
        return view('teknisi.create', [
            'teknisi' => Teknisi::all(),
            'site' => Site::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([  

            'Nama_Teknisi' => 'required',
            'Site' => 'required',
            'id_site' => 'required'
        
            ]);

        $array = $request->only([
    
            'Nama_Teknisi',
            'Site',
            'id_site'
        
            ]);

    return redirect()->route('teknisi.index') ->with('success_message', 'Berhasil menambah teknisi baru');
}
public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // Menampilkan Form Edit
        $teknisi= Teknisi::find($id);
        if (!$teknisi) {
            return redirect()->route('teknisi.index')
                ->with('error_message', 'Data Teknisi dengan ID ' . $id . ' tidak ditemukan');
        }
        return view('teknisi.edit', [
            'teknisi' => $teknisi,
            'site' => Site::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Teknisi' => 'required',
            'Site' => 'required',

            ]);
            $teknis = Teknisi::find($id);
            $teknisi->Nama_teknisi = $request->nama_teknisi;
            $teknisi->site = $request->site;
            $teknisi->save();
            return redirect()->route('teknisi.index')
            ->with('success_message', 'Berhasil mengubah data teknisi');
    }

    public function destroy($id)
    {
        $teknisi = Teknisi::find($id);
        if ($teknisi) $teknisi->delete();
        return redirect()->route('teknisi.index')->with('success_message', 'Berhasil menghapus data teknisi');
    }
}

