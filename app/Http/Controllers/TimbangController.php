<?php

namespace App\Http\Controllers;

use App\Models\KK;
use App\Models\Anggkk;
use App\Models\Balita;
use App\Models\Timbang;
use Illuminate\Http\Request;

class TimbangController extends Controller
{
    public function index()
    {
        $timbangs = Timbang::all();
        return view('timbang.index', compact('timbangs'));
    }

    public function create()
    {
        $kks = KK::pluck('namakk', 'idkk');
        return view('timbang.create', compact('kks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required',
            'anggkk_id' => 'required',
            'balita_id' => 'required',
            'tgl_timbang' => 'required|date',
            'tempat' => 'required|string|max:20',
            'bb' => 'required|integer',
            'tb' => 'required|integer',
            'status_gizi' => 'required|in:Baik,Kurang,Lebih',
            'petugas' => 'required|string|max:100',
        ]);

        Timbang::create([
            'idbalita' => $request->balita_id,
            'tgl_timbang' => $request->tgl_timbang,
            'tempat' => $request->tempat,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'status_gizi' => $request->status_gizi,
            'petugas' => $request->petugas,
        ]);

        return redirect()->route('timbang.index')->with('success', 'Data timbang berhasil ditambahkan');
    }
    public function show($id)
    {
        $timbang = Timbang::findOrFail($id);
        return view('timbang.show', compact('timbang'));
    }

    public function edit($id)
    {
        $timbang = Timbang::findOrFail($id);
        $kks = KK::pluck('namakk', 'idkk');
        $anggkks = Anggkk::pluck('nama', 'id_ang_kk')->all();
        $balitas = Balita::pluck('nama_balita', 'idbalita')->all();
        return view('timbang.edit', compact('timbang', 'kks', 'anggkks', 'balitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_timbang' => 'required|date',
            'tempat' => 'required|string|max:20',
            'bb' => 'required|integer',
            'tb' => 'required|integer',
            'status_gizi' => 'required|in:Baik,Kurang,Lebih',
            'petugas' => 'required|string|max:100',
        ]);

        $timbang = Timbang::findOrFail($id);
        $timbang->tgl_timbang = $request->tgl_timbang;
        $timbang->tempat = $request->tempat;
        $timbang->bb = $request->bb;
        $timbang->tb = $request->tb;
        $timbang->status_gizi = $request->status_gizi;
        $timbang->petugas = $request->petugas;
        $timbang->save();

        return redirect()->route('timbang.index')->with('success', 'Data timbang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $timbang = Timbang::findOrFail($id);
        $timbang->delete();

        return redirect()->route('timbang.index')->with('success', 'Data timbang berhasil dihapus');
    }

    public function getAnggkkByKk($kkId)
    {
        $anggkks = Anggkk::where('idkk', $kkId)->pluck('nama', 'id_ang_kk');
        return response()->json($anggkks);
    }

    public function getBalitaByAnggkk($anggkkId)
    {
        $balitas = Balita::where('id_ang_kk', $anggkkId)->pluck('nama_balita', 'idbalita');
        return response()->json($balitas);
    }

    public function getTimbangByBalita($balitaId)
    {
        $timbangs = Timbang::where('idbalita', $balitaId)->pluck('idtimb', 'tgl_timbang');
        return response()->json($timbangs);
    }

}
