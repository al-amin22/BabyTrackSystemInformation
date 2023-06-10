@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-3" style="font-size: 14px;">Data Pemulihan</h2>
        <a href="{{ route('pemulihan.create') }}" class="btn btn-success btn-sm mb-2" style="font-size: 12px;">Tambah Data Pemulihan</a>

        @if (session('success'))
            <div class="alert alert-success" style="font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th style="width: 10%;">Nama Balita</th>
                        <th style="width: 10%;">Berat Badan Saat Penimbangan</th>
                        <th style="width: 10%;">Jenis PMT yang Dibarikan</th>
                        <th style="width: 15%;">Tanggal Vitamin Diberikan</th>
                        <th style="width: 15%;">Tanggal Konsumsi Awal</th>
                        <th style="width: 15%;">Tanggal Konsumsi Akhir</th>
                        <th style="width: 10%;">penyerta</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemulihans as $pemulihan)
                        <tr>
                            <td>
                                @if ($pemulihan->lacak && $pemulihan->lacak->timbang && $pemulihan->lacak->timbang->balita)
                                    {{ $pemulihan->lacak->timbang->balita->nama_balita }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($pemulihan->lacak && $pemulihan->lacak->timbang)
                                    {{ $pemulihan->lacak->timbang->bb }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($pemulihan->lacak && $pemulihan->lacak->timbang && $pemulihan->lacak->timbang->pmt)
                                    {{ $pemulihan->lacak->timbang->pmt->jenis_PMT }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($pemulihan->lacak && $pemulihan->lacak->timbang && $pemulihan->lacak->timbang->balita->vitamin)
                                    {{ $pemulihan->lacak->timbang->balita->vitamin->tgl_pemberian }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $pemulihan->tgl_konsumsi_awal }}</td>
                            <td>{{ $pemulihan->tgl_konsumsi_akhir }}</td>
                            <td>
                                @if ($pemulihan->lacak)
                                    {{ $pemulihan->lacak->peny_penyerta ?? '-' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('pemulihan.show', $pemulihan->idpulih) }}" class="btn btn-info btn-sm mr-2" style="font-size: 10px;">Detail</a>
                                    <a href="{{ route('pemulihan.edit', $pemulihan->idpulih) }}" class="btn btn-primary btn-sm mr-2" style="font-size: 10px;">Edit</a>
                                    <form action="{{ route('pemulihan.destroy', $pemulihan->idpulih) }}" method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="font-size: 10px;">Hapus</button>
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
