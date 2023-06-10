@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Data Pemulihan</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Balita: {{ $pemulihan->lacak->timbang->balita->nama_balita }}</h5>
                <p class="card-text">Berat Badan Saat Penimbangan: {{ $pemulihan->lacak->timbang->bb }} kg</p>
                <p class="card-text">tanggal konsumsi Awal: {{ $pemulihan->tgl_konsumsi_awal }}</p>
                <p class="card-text">tanggal Konsumsi Akhir: {{ $pemulihan->tgl_konsumsi_akhir }} </p>
                <p class="card-text">Tanggal Pelacakan: {{ $pemulihan->lacak->tgl_lacak }}</p>
                <p class="card-text">Peny penyerta: {{ $pemulihan->lacak->peny_penyerta }}</p>
                <p class="card-text">Kepala Kelauarga: {{ $pemulihan->lacak->timbang->balita->anggkk->kk->namakk }}</p>
                <p class="card-text">Anggota Keluarga: {{ $pemulihan->lacak->timbang->balita->anggkk->nama }}</p>
                <p class="card-text">Hubungan Dengan Keluarga: {{ $pemulihan->lacak->timbang->balita->anggkk->hubungan }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pmt.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
