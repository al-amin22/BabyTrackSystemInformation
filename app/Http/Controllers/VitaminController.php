<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Models\Anggkk;
use App\Models\Balita;
use App\Models\KK;

class VitaminController extends Controller
{
    public function index()
    {
        $vitamins = Vitamin::with('balita')->get();
        return view('vitamin.index', compact('vitamins'));
    }

    public function create()
    {
        $kks = KK::all();
        $anggkks = Anggkk::all();
        return view('vitamin.create', compact('kks', 'anggkks'));
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

    public function store(Request $request)
    {
        $vitamin = new Vitamin();
        $vitamin->idbalita = $request->input('balita');
        $vitamin->tgl_pemberian = $request->input('tgl_pemberian');
        $vitamin->save();

        return redirect()->route('vitamin.index')->with('success', 'Vitamin created successfully');
    }
    public function show(Vitamin $vitamin)
    {
        return view('vitamin.show', compact('vitamin'));
    }

    public function edit($id)
    {
        $vitamin = Vitamin::findOrFail($id);
        $kks = KK::all();
        $anggkks = Anggkk::where('idkk', $vitamin->balita->anggkk->kk->idkk)->pluck('nama', 'id_ang_kk');
        $balitas = Balita::where('id_ang_kk', $vitamin->balita->anggkk->id_ang_kk)->pluck('nama_balita', 'idbalita');

        return view('vitamin.edit', compact('vitamin', 'kks', 'anggkks', 'balitas'));
    }

    public function update(Request $request, $id)
    {
        $vitamin = Vitamin::findOrFail($id);
        $vitamin->idbalita = $request->input('balita');
        $vitamin->tgl_pemberian = $request->input('tgl_pemberian');
        $vitamin->save();

        return redirect()->route('vitamin.index')->with('success', 'Vitamin updated successfully');
    }



    public function destroy(Vitamin $vitamin)
    {
        $vitamin->delete();
        return redirect()->route('vitamin.index')->with('success', 'Data Vitamin berhasil dihapus.');
    }
}
