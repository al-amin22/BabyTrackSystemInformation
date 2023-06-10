@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Data Pelacakan</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Balita: {{ $lacak->timbang->balita->nama_balita }}</h5>
                <p class="card-text">Berat Badan Saat Penimbangan: {{ $lacak->timbang->bb }} kg</p>
                <p class="card-text">Tanggal Pelacakan: {{ $lacak->tgl_lacak }}</p>
                <p class="card-text">Peny penyerta: {{ $lacak->peny_penyerta }}</p>
                <p class="card-text">Kepala Kelauarga: {{ $lacak->timbang->balita->anggkk->kk->namakk }}</p>
                <p class="card-text">Anggota Keluarga: {{ $lacak->timbang->balita->anggkk->nama }}</p>
                <p class="card-text">Hubungan : {{ $lacak->timbang->balita->anggkk->hubungan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pmt.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
