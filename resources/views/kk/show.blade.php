<!-- resources\views\kk\show.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Detail Data KK</h1>
    <p><strong>ID KK:</strong> {{ $kk->idkk }}</p>
    <p><strong>Nama KK:</strong> {{ $kk->namakk }}</p>
    <p><strong>TTL:</strong> {{ $kk->TTL }}</p>
    <p><strong>Sex:</strong> {{ $kk->sex }}</p>
    <p><strong>Pekerjaan:</strong> {{ $kk->pekerjaan }}</p>
    <p><strong>Pendidikan:</strong> {{ $kk->pendidikan }}</p>
    <p><strong>Alamat:</strong> {{ $kk->alamat }}</p>
    <a href="{{ route('kk.index') }}" class="btn btn-primary">Kembali</a>
@endsection
