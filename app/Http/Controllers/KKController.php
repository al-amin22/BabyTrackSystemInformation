<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;

class KKController extends Controller
{
    public function index()
    {
        $kkData = KK::all();
        return view('kk.index', compact('kkData'));
    }

    public function create()
    {
        return view('kk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namakk' => 'required',
            'TTL' => 'required|date',
            'sex' => 'required|in:L,P',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
        ]);

        KK::create($validatedData);
        return redirect()->route('kk.index')->with('success', 'Data KK berhasil ditambahkan.');
    }

    public function show(KK $kk)
    {
        return view('kk.show', compact('kk'));
    }

    public function edit(KK $kk)
    {
        return view('kk.edit', compact('kk'));
    }

    public function update(Request $request, KK $kk)
    {
        $validatedData = $request->validate([
            'namakk' => 'required',
            'TTL' => 'required|date',
            'sex' => 'required|in:L,P',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
        ]);

        $kk->update($validatedData);
        return redirect()->route('kk.index')->with('success', 'Data KK berhasil diperbarui.');
    }

    public function destroy(KK $kk)
    {
        $kk->delete();
        return redirect()->route('kk.index')->with('success', 'Data KK berhasil dihapus.');
    }
}
