@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Balita</h2>
        <div class="form-group">
            <label for="nama_balita">Nama Balita:</label>
            <input type="text" class="form-control" id="nama_balita" value="{{ $balita->nama_balita }}" readonly>
        </div>
            <!-- Ubah $balita->angkk->alamat menjadi $balita->anggkk->alamat -->
        <div class="form-group">
            <label for="nama_keluarga">Nama keluarga:</label>
            <input type="text" class="form-control" id="nama_balita" value="{{ $balita->anggkk->nama }}" readonly>
        </div>

        <!-- Ubah $balita->anggkk->kk->namakk menjadi $balita->anggkk->kk->nama -->
        <div class="form-group">
            <label for="nama_keluarga">Nama Kepala Keluarga:</label>
            <input type="text" class="form-control" id="nama_balita" value="{{ $balita->anggkk->kk->namakk }}" readonly>
        </div>

        <div class="form-group">
            <label for="nama_kepala_keluarga">Nama Balita:</label>
            <input type="text" class="form-control" id="nama_balita" value="{{ $balita->nama_balita }}" readonly>
        </div>
        <div class="form-group">
            <label for="bb">Berat Badan (kg):</label>
            <input type="number" class="form-control" id="bb" value="{{ $balita->bb }}" readonly>
        </div>
        <div class="form-group">
            <label for="pb">Panjang Badan (cm):</label>
            <input type="number" class="form-control" id="pb" value="{{ $balita->pb }}" readonly>
        </div>
        <div class="form-group">
            <label for="kms">KMS:</label>
            <input type="text" class="form-control" id="kms" value="{{ $balita->kms }}" readonly>
        </div>
        <div class="form-group">
            <label for="asi_eks">ASI Eksklusif:</label>
            <input type="text" class="form-control" id="asi_eks" value="{{ $balita->asi_eks }}" readonly>
        </div>
        <a href="{{ route('balita.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
