@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Data Balita</h2>
        <a href="{{ route('balita.create') }}" class="btn btn-success mb-2">Tambah Data Balita</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Balita</th>
                        <th>Anggota Keluarga</th>
                        <th>Tgl Pemberian Vitamin</th>
                        <th>Berat Badan (kg)</th>
                        <th>Panjang Badan (cm)</th>
                        <th>KMS</th>
                        <th>ASI Eksklusif</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balitas as $balita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $balita->nama_balita }}</td>
                            <td>{{ $balita->anggkk->nama }}</td>
                            <td>
                                @if ($balita->vitamin)
                                    {{ $balita->vitamin->tgl_pemberian }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $balita->bb }}</td>
                            <td>{{ $balita->pb }}</td>
                            <td>{{ $balita->kms }}</td>
                            <td>{{ $balita->asi_eks }}</td>
                            <td class="text-center">
                                <!-- Tautan ke halaman show dengan menyertakan parameter id -->
                                <a href="{{ route('balita.show', ['idbalita' => $balita->idbalita]) }}" class="btn btn-info btn-sm mr-2">Detail</a>

                                <a href="{{ route('balita.edit', $balita->idbalita) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                <form action="{{ route('balita.destroy', $balita->idbalita) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
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
