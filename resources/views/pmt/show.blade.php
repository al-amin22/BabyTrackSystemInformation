@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Data PMT</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Balita: {{ $pmt->timbang->balita->nama_balita }}</h5>
                <p class="card-text">Berat Badan Saat Penimbangan: {{ $pmt->timbang->bb }} kg</p>
                <p class="card-text">Tanggal Pemberian TMT: {{ $pmt->tgl_pemberianTMT }}</p>
                <p class="card-text">Jenis PMT: {{ $pmt->jenis_PMT }}</p>
                <p class="card-text">Kepala Kelauarga: {{ $pmt->timbang->balita->anggkk->kk->namakk }}</p>
                <p class="card-text">Anggota Keluarga: {{ $pmt->timbang->balita->anggkk->nama }}</p>
                <p class="card-text">Hubungan : {{ $pmt->timbang->balita->anggkk->hubungan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pmt.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
