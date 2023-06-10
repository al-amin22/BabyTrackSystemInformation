@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data PMT</h2>
        <a href="{{ route('pmt.create') }}" class="btn btn-success mb-2">Tambah PMT</a>

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
                        <th>Tanggal Pemberian TMT</th>
                        <th>Jenis PMT</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pmts as $pmt)
                        <tr>
                            <td>{{ $pmt->timbang->balita->nama_balita }}</td>
                            <td>{{ $pmt->timbang->bb }} kg</td>
                            <td>{{ $pmt->tgl_pemberianTMT }}</td>
                            <td>{{ $pmt->jenis_PMT }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('pmt.show', $pmt->idpmt) }}" class="btn btn-info btn-sm mr-2">Detail</a>
                                    <a href="{{ route('pmt.edit', $pmt->idpmt) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form action="{{ route('pmt.destroy', $pmt->idpmt) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
