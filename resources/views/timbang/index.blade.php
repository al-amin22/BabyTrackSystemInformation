@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Timbang</h2>
        <a href="{{ route('timbang.create') }}" class="btn btn-success mb-2">Tambah Timbang</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Balita</th>
                    <th>Tanggal Timbang</th>
                    <th>Tempat</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Status Gizi</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timbangs as $timbang)
                    <tr>
                        <td>{{ $timbang->idtimb }}</td>
                        <td>{{ $timbang->balita->nama_balita }}</td>
                        <td>{{ $timbang->tgl_timbang }}</td>
                        <td>{{ $timbang->tempat }}</td>
                        <td>{{ $timbang->bb }}</td>
                        <td>{{ $timbang->tb }}</td>
                        <td>{{ $timbang->status_gizi }}</td>
                        <td>{{ $timbang->petugas }}</td>
                        <td>
                            <a href="{{ route('timbang.show', $timbang->idtimb) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('timbang.edit', $timbang->idtimb) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('timbang.destroy', $timbang->idtimb) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>

