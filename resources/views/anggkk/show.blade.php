@extends('layouts.admin')

@section('content')
    <h2>Detail Anggkk</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $anggkk->id_ang_kk }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $anggkk->nama }}</td>
        </tr>
        <tr>
            <th>TTL</th>
            <td>{{ $anggkk->ttl }}</td>
        </tr>
        <tr>
            <th>Sex</th>
            <td>{{ $anggkk->sex }}</td>
        </tr>
        <tr>
            <th>Hubungan</th>
            <td>{{ $anggkk->hubungan }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $anggkk->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>{{ $anggkk->pendidikan }}</td>
        </tr>
        <tr>
            <th>Kepala Keluarga</th>
            <td>{{ $anggkk->kk->namakk }}</td>
        </tr>
        <tr>
            <th>Alamat Kepala Keluarga</th>
            <td>{{ $anggkk->kk->alamat }}</td>
        </tr>

    </table>
    <a href="{{ route('anggkk.index') }}" class="btn btn-secondary">Kembali</a>
@endsection