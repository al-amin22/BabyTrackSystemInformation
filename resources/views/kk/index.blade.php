@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data KK</h2>
        <a href="{{ route('kk.create') }}" class="btn btn-success mb-2">Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID KK</th>
                        <th>Nama KK</th>
                        <th>TTL</th>
                        <th>Sex</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kkData as $kk)
                        <tr>
                            <td>{{ $kk->idkk }}</td>
                            <td>{{ $kk->namakk }}</td>
                            <td>{{ $kk->TTL }}</td>
                            <td>{{ $kk->sex }}</td>
                            <td>{{ $kk->pekerjaan }}</td>
                            <td>{{ $kk->pendidikan }}</td>
                            <td>{{ $kk->alamat }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('kk.show', $kk->idkk) }}" class="btn btn-info btn-sm mr-2">Detail</a>
                                    <a href="{{ route('kk.edit', $kk->idkk) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form action="{{ route('kk.destroy', $kk->idkk) }}" method="POST" onsubmit="return confirmDelete()">
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
