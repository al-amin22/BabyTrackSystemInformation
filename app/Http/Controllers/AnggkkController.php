<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggkk;
use App\Models\KK;


class AnggkkController extends Controller
{
    public function index()
    {
        $anggkkData = Anggkk::with('kk')->get();
        return view('anggkk.index', compact('anggkkData'));
    }

    public function create()
    {
        $kkData = KK::all();
        return view('anggkk.create', compact('kkData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idkk' => 'required',
            'idkk' => 'required|exists:kk,idkk',
            'nama' => 'required',
            'ttl' => 'required|date',
            'sex' => 'required|in:L,P',
            'hubungan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
        ]);

        Anggkk::create($validatedData);
        return redirect()->route('anggkk.index')->with('success', 'Data Anggkk berhasil ditambahkan.');
    }

    public function show(Anggkk $anggkk)
    {
        return view('anggkk.show', compact('anggkk'));
    }

    public function edit(Anggkk $anggkk)
    {
        $kkData = KK::all();
        return view('anggkk.edit', compact('anggkk', 'kkData'));
    }

    public function update(Request $request, Anggkk $anggkk)
    {
        $validatedData = $request->validate([
            'idkk' => 'required|exists:kk,idkk',
            'nama' => 'required',
            'ttl' => 'required|date',
            'sex' => 'required|in:L,P',
            'hubungan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
        ]);

        $anggkk->update($validatedData);
        return redirect()->route('anggkk.index')->with('success', 'Data Anggkk berhasil diperbarui.');
    }

    public function destroy(Anggkk $anggkk)
    {
        $anggkk->delete();
        return redirect()->route('anggkk.index')->with('success', 'Data Anggkk berhasil dihapus.');
    }

}
