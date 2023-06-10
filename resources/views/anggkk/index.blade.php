<!-- resources/views/anggkk/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Data Anggota Keluarga</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('anggkk.create') }}" class="btn btn-primary mb-3">Tambah Anggota kk</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Sex</th>
                <th>Hubungan</th>
                <th>Pekerjaan</th>
                <th>Pendidikan</th>
                <th>Kepala Keluarga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggkkData as $anggkk)
                <tr>
                    <td>{{ $anggkk->id_ang_kk }}</td>
                    <td>{{ $anggkk->nama }}</td>
                    <td>{{ $anggkk->ttl }}</td>
                    <td>{{ $anggkk->sex }}</td>
                    <td>{{ $anggkk->hubungan }}</td>
                    <td>{{ $anggkk->pekerjaan }}</td>
                    <td>{{ $anggkk->pendidikan }}</td>
                    <td>{{ $anggkk->kk->namakk }}</td>
                    <td>
                        <a href="{{ route('anggkk.show', $anggkk->id_ang_kk) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('anggkk.edit', $anggkk->id_ang_kk) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('anggkk.destroy', $anggkk->id_ang_kk) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
