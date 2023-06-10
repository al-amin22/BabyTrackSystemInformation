<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\KK;
use App\Models\Anggkk;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index()
    {
        $balitas = Balita::all();

        return view('balita.index', compact('balitas'));
    }
    public function create()
    {
        $kks = KK::pluck('namakk', 'idkk');
        $anggkks = [];

        return view('balita.create', compact('kks', 'anggkks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'anggkk' => 'required',
            'nama_balita' => 'required',
            'bb' => 'required',
            'pb' => 'required',
            'kms' => 'required',
            'asi_eks' => 'required',
        ]);

        $balita = new Balita();
        
        $balita->id_ang_kk = $request->id_ang_kk;
        $balita->nama_balita = $request->nama_balita;
        $balita->bb = $request->bb;
        $balita->pb = $request->pb;
        $balita->kms = $request->kms;
        $balita->asi_eks = $request->asi_eks;
        $balita->save();

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil disimpan.');
    }

    public function edit($id)
    {
        $balita = Balita::findOrFail($id);
        $kks = KK::pluck('namakk', 'idkk')->all();
        $anggkks = Anggkk::pluck('nama', 'id_ang_kk')->all();

        return view('balita.edit', compact('balita', 'kks', 'anggkks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kk' => 'required',
            'anggkk' => 'required',
            'nama_balita' => 'required',
            'bb' => 'required',
            'pb' => 'required',
            'kms' => 'required',
            'asi_eks' => 'required',
        ]);

        $balita = Balita::findOrFail($id);
        $balita->id_ang_kk = $request->anggkk;
        $balita->nama_balita = $request->nama_balita;
        $balita->bb = $request->bb;
        $balita->pb = $request->pb;
        $balita->kms = $request->kms;
        $balita->asi_eks = $request->asi_eks;
        $balita->save();

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui');
    }

    public function show($id)
    {
        $balita = Balita::findOrFail($id);

        return view('balita.show', compact('balita'));
    }

    public function destroy($id)
    {
    $balita = Balita::findOrFail($id);
    $balita->delete();

    return redirect()->route('balita.index')->with('success', 'Data Balita berhasil dihapus');
    }



    public function getAnggkks($idkk)
    {
    $anggkks = KK::find($idkk)->anggkks()->pluck('nama', 'id_ang_kk');
    return response()->json($anggkks);
    }
   
}
