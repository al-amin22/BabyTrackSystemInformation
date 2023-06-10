@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Pemberian Vitamin</h2>
        <a href="{{ route('vitamin.create') }}" class="btn btn-success mb-2">Tambah Vitamin</a>

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
                    <th>Tanggal Pemberian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vitamins as $vitamin)
                    <tr>
                        <td>{{ $vitamin->idvit }}</td>
                        <td>{{ $vitamin->balita->nama_balita }}</td>
                        <td>{{ $vitamin->tgl_pemberian }}</td>
                        <td>
                            <a href="{{ route('vitamin.show', $vitamin->idvit) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('vitamin.edit', $vitamin->idvit) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('vitamin.destroy', $vitamin->idvit) }}" method="POST" class="d-inline">
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

