<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\Anggkk;
use App\Models\Balita;
use App\Models\Timbang;
use App\Models\Lacak;

class LacakController extends Controller
{
    public function index()
    {
        $lacaks = Lacak::all();
        return view('lacak.index', compact('lacaks'));
    }
    // Controller

    public function create()
    {
        $kks = KK::pluck('namakk', 'idkk')->toArray();
        return view('lacak.create', compact('kks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kk_id' => 'required',
            'anggkk_id' => 'required',
            'balita_id' => 'required',
            'timbang_id' => 'required',
            'tgl_lacak' => 'required',
            'peny_penyerta' => 'required',
        ]);

        $lacak = new Lacak();
        $lacak->idtimb = $validatedData['timbang_id'];
        $lacak->tgl_lacak = $validatedData['tgl_lacak'];
        $lacak->peny_penyerta = $validatedData['peny_penyerta'];
        $lacak->save();

        return redirect()->route('lacak.create')->with('success', 'Data Lacak berhasil disimpan.');
    }

    public function show($id)
    {
        $lacak = Lacak::findOrFail($id);
        
        return view('lacak.show', compact('lacak'));
    }

    public function edit($id)
    {
        $lacak = Lacak::findOrFail($id);
        $kks = KK::pluck('namakk', 'idkk');
        $anggkks = Anggkk::where('idkk', $lacak->idkk)->pluck('nama', 'id_ang_kk');
        $balitas = Balita::where('id_ang_kk', $lacak->anggkk_id)->pluck('nama_balita', 'idbalita');
        $timbangs = Timbang::where('idbalita', $lacak->idbalita)->pluck('status_gizi', 'idtimb');

        return view('lacak.edit', compact('lacak', 'kks', 'anggkks', 'balitas', 'timbangs'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'kk_id' => 'required',
        'anggkk_id' => 'required',
        'balita_id' => 'required',
        'timbang_id' => 'required',
        'tgl_lacak' => 'required',
        'peny_penyerta' => 'required',
    ]);

    $lacak = Lacak::findOrFail($id);
    $lacak->idtimb = $request->timbang_id; // Pastikan nilai 'timbang_id' tidak null
    $lacak->tgl_lacak = $request->tgl_lacak;
    $lacak->peny_penyerta = $request->peny_penyerta;
    $lacak->save();

    return redirect()->route('lacak.index')->with('success', 'Data PMT berhasil diperbarui.');
}

public function destroy($id)
{
    $lacak = Lacak::findOrFail($id);
    $lacak->delete();

    return redirect()->route('lacak.index')->with('success', 'Data pelacakan berhasil dihapus');
}


    public function getAnggkkByKK($kkId)
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
    $timbangs = Timbang::where('idbalita', $balitaId)->pluck('bb', 'idtimb')->map(function ($item, $key) {
        return $item . " kg";
    });
    return response()->json($timbangs);
    }
    public function getPmtByTimbang($timbangId)
    {
        $pmts = PMT::where('idtimb', $timbangId)->pluck('jenis_PMT', 'idpmt');
        return response()->json($pmts);
    }
}
