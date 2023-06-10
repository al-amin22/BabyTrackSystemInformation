@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Vitamin Detail</h1>
        @if ($vitamin)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vitamin Name: {{ $vitamin->name }}</h5>
                    <p class="card-text">Vitamin Description: {{ $vitamin->description }}</p>
                    <p class="card-text">Tanggal Pemberian: {{ $vitamin->tgl_pemberian }}</p>
                    <h5 class="card-title">Kepala Keluarga</h5>
                    <p class="card-text">Nama: {{ $vitamin->balita->anggkk->kk->namakk }}</p>
                    <p class="card-text">Alamat: {{ $vitamin->balita->anggkk->kk->alamat }}</p>
                    <h5 class="card-title">Anggota Keluarga</h5>
                    <p class="card-text">Nama: {{ $vitamin->balita->anggkk->nama}}</p>
                    <p class="card-text">Hubungan: {{ $vitamin->balita->anggkk->hubungan}}</p>
                   
                </div>
            </div>
        @else
            <p>Vitamin not found.</p>
        @endif
    </div>
@endsection
