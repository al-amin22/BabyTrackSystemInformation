<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\Anggkk;
use App\Models\Balita;
use App\Models\Timbang;
use App\Models\PMT;

class PMTController extends Controller
{
    public function index()
    {
        $pmts = PMT::all();
        return view('pmt.index', compact('pmts'));
    }
    public function create()
    {
        $kks = KK::pluck('namakk', 'idkk');
        return view('pmt.create', compact('kks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required',
            'anggkk_id' => 'required',
            'balita_id' => 'required',
            'timbang_id' => 'required',
            'tgl_pemberianTMT' => 'required',
            'jenis_PMT' => 'required',
        ]);

        $pmt = new PMT;
        $pmt->idtimb = $request->timbang_id;
        $pmt->tgl_pemberianTMT = $request->tgl_pemberianTMT;
        $pmt->jenis_PMT = $request->jenis_PMT;
        $pmt->save();

        return redirect()->route('pmt.index')->with('success', 'Data PMT berhasil disimpan.');
    }
    public function show($id)
    {
        $pmt = PMT::findOrFail($id);
        
        return view('pmt.show', compact('pmt'));
    }

    public function edit($id)
    {
        $pmt = PMT::findOrFail($id);
        $kks = KK::pluck('namakk', 'idkk');
        $anggkks = Anggkk::where('idkk', $pmt->idkk)->pluck('nama', 'id_ang_kk');
        $balitas = Balita::where('id_ang_kk', $pmt->anggkk_id)->pluck('nama_balita', 'idbalita');
        $timbangs = Timbang::where('idbalita', $pmt->idbalita)->pluck('status_gizi', 'idtimb');

        return view('pmt.edit', compact('pmt', 'kks', 'anggkks', 'balitas', 'timbangs'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'kk_id' => 'required',
        'anggkk_id' => 'required',
        'balita_id' => 'required',
        'timbang_id' => 'required',
        'tgl_pemberianTMT' => 'required',
        'jenis_PMT' => 'required',
    ]);

    $pmt = PMT::findOrFail($id);
    $pmt->idtimb = $request->timbang_id; // Pastikan nilai 'timbang_id' tidak null
    $pmt->tgl_pemberianTMT = $request->tgl_pemberianTMT;
    $pmt->jenis_PMT = $request->jenis_PMT;
    $pmt->save();

    return redirect()->route('pmt.index')->with('success', 'Data PMT berhasil diperbarui.');
}
public function destroy($id)
{
    $pmt = PMT::findOrFail($id);
    $pmt->delete();

    return redirect()->route('pmt.index')->with('success', 'Data PMT berhasil dihapus');
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
