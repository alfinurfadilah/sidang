<?php

namespace App\Http\Controllers;
use App\Models\site;
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
        'nama_teknisi' => 'required',
        'site' => 'required',
        'id_site' => 'required'
    ]);

    $array = $request->only(['nama_teknisi', 'site', 'id_site']);

    $teknisi = Teknisi::create($array);

    if ($request->ajax()) {
        return response()->json(['success' => true, 'teknisi' => $teknisi]);
    } else {
        return redirect()->route('teknisi.index')->with('success_message', 'Berhasil menambah teknisi baru');
    }
}
public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_teknisi' => 'required',
        'site' => 'required',
    ]);

    $teknisi = Teknisi::find($id);
    if (!$teknisi) {
        return redirect()->route('teknisi.index')
            ->with('error_message', 'Data Teknisi dengan ID ' . $id . ' tidak ditemukan');
    }

    // Pastikan untuk menggunakan 'id_site' jika ID situs yang disimpan di bidang 'id_site' pada model 'Teknisi'
    $teknisi->nama_teknisi = $request->nama_teknisi;
    $teknisi->site = $request->id_site; // Menggunakan 'id_site' jika disimpan di bidang 'id_site' pada model 'Teknisi'
    $teknisi->save();

    return redirect()->route('teknisi.index')
        ->with('success_message', 'Berhasil mengubah data teknisi');
}


public function destroy($id)
{
    $teknisi = Teknisi::find($id);
    if ($teknisi) {
        $teknisi->delete();
        return response()->json(['success' => true], 200);
    }
    return response()->json(['success' => false, 'message' => 'Data not found'], 404);
}

}

