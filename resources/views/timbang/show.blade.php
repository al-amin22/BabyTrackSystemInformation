@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Detail Timbang</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $timbang->idtimb }}</td>
                </tr>
                <tr>
                    <th>Nama Balita</th>
                    <td>{{ $timbang->balita->nama_balita }}</td>
                </tr>
                <tr>
                    <th>Nama Kepala Keluarga</th>
                    <td>{{ $timbang->balita->anggkk->kk->namakk }}</td>
                </tr>
                <tr>
                    <th>Nama Keluarga</th>
                    <td>{{ $timbang->balita->anggkk->nama }}</td>
                </tr>
                <tr>
                    <th>Nama Hubungan Keluarga</th>
                    <td>{{ $timbang->balita->anggkk->hubungan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Timbang</th>
                    <td>{{ $timbang->tgl_timbang }}</td>
                </tr>
                <tr>
                    <th>Tempat</th>
                    <td>{{ $timbang->tempat }}</td>
                </tr>
                <tr>
                    <th>Berat Badan</th>
                    <td>{{ $timbang->bb }}</td>
                </tr>
                <tr>
                    <th>Tinggi Badan</th>
                    <td>{{ $timbang->tb }}</td>
                </tr>
                <tr>
                    <th>Status Gizi</th>
                    <td>{{ $timbang->status_gizi }}</td>
                </tr>
                <tr>
                    <th>Petugas</th>
                    <td>{{ $timbang->petugas }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
