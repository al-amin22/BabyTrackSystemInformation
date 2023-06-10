<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\Anggkk;
use App\Models\Balita;
use App\Models\Timbang;
use App\Models\Lacak;
use App\Models\Pemulihan;

class PemulihanController extends Controller
{
    public function index()
    {
        $pemulihans = Pemulihan::with('lacak.timbang.balita', 'lacak.timbang.pmt')->get();
        return view('pemulihan.index', compact('pemulihans'));
    }


    public function create()
    {
        $kks = KK::pluck('namakk', 'idkk')->toArray();
        return view('pemulihan.create', compact('kks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kk_id' => 'required',
            'anggkk_id' => 'required',
            'balita_id' => 'required',
            'timbang_id' => 'required',
            'lacak_id' => 'required',
            'tgl_konsumsi_awal' => 'required',
            'tgl_konsumsi_akhir' => 'required',
        ]);

        $pemulihan = new Pemulihan();
        $pemulihan->idtimb = $validatedData['timbang_id'];
        $pemulihan->idlacak = $validatedData['lacak_id'];
        $pemulihan->tgl_konsumsi_awal = $validatedData['tgl_konsumsi_awal'];
        $pemulihan->tgl_konsumsi_akhir = $validatedData['tgl_konsumsi_akhir'];
        $pemulihan->save();

        return redirect()->route('pemulihan.index')->with('success', 'Data pemulihan berhasil disimpan.');
    }
    public function show($id)
    {
        $pemulihan = Pemulihan::findOrFail($id);
        
        return view('pemulihan.show', compact('pemulihan'));
    }
    public function edit($id)
    {
        $pemulihan = Pemulihan::findOrFail($id);
        $kks = KK::pluck('namakk', 'idkk');
        $anggkks = Anggkk::where('idkk', $pemulihan->idkk)->pluck('nama', 'id_ang_kk');
        $balitas = Balita::where('id_ang_kk', $pemulihan->anggkk_id)->pluck('nama_balita', 'idbalita');
        $timbangs = Timbang::where('idbalita', $pemulihan->idbalita)->pluck('status_gizi', 'idtimb');
        $lacaks = Lacak::where('idtimb', $pemulihan->idtimb)->pluck('peny_penyerta', 'idlacak');

        return view('pemulihan.edit', compact('pemulihan', 'lacaks', 'kks', 'anggkks', 'balitas', 'timbangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kk_id' => 'required',
            'anggkk_id' => 'required',
            'balita_id' => 'required',
            'timbang_id' => 'required',
            'tgl_konsumsi_awal' => 'required',
            'tgl_konsumsi_akhir' => 'required',
            'lacak_id' => 'required', // Ganti 'peny_penyerta' dengan 'lacak_id'
        
    ]);

    $pemulihan = Pemulihan::findOrFail($id);
    $pemulihan->idlacak = $request->lacak_id;
    $pemulihan->idtimb = $request->timbang_id; // Pastikan nilai 'timbang_id' tidak null
    $pemulihan->tgl_konsumsi_awal = $request->tgl_konsumsi_awal;
    $pemulihan->tgl_konsumsi_akhir = $request->tgl_konsumsi_akhir;
    $pemulihan->save();

    return redirect()->route('pemulihan.index')->with('success', 'Data Pemulihan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $pemulihan = Pemulihan::findOrFail($id);
        $pemulihan->delete();

        return redirect()->route('pemulihan.index')->with('success', 'Data Pemulihan berhasil dihapus');
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

    public function getLacakByTimbang($timbangId)
    {
        $lacaks = Lacak::where('idtimb', $timbangId)->pluck('peny_penyerta', 'idlacak');
        return response()->json($lacaks);
    }
}
