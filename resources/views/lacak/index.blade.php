@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Lacak Balita</h2>
        <a href="{{ route('lacak.create') }}" class="btn btn-success mb-2">Tambah Lacak</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Balita</th>
                        <th>Berat Badan Saat Penimbangan</th>
                        <th>Tanggal Lacak</th>
                        <th>Peny_penyerta</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lacaks as $lacak)
                        <tr>
                            <td>{{ $lacak->timbang->balita->nama_balita }}</td>
                            <td>{{ $lacak->timbang->bb }} kg</td>
                            <td>{{ $lacak->tgl_lacak }}</td>
                            <td>{{ $lacak->peny_penyerta }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('lacak.show', $lacak->idlacak) }}" class="btn btn-info btn-sm mr-2">Detail</a>
                                    <a href="{{ route('lacak.edit', $lacak->idlacak) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form action="{{ route('lacak.destroy', $lacak->idlacak) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
@endsection
