@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Update Data PMT</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('pmt.update', $pmt->idpmt) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kk_id">Kepala Keluarga</label>
                <select name="kk_id" id="kk_id" class="form-control" onchange="getAnggkkByKK()">
                    <option value="">Pilih Kepala Keluarga</option>
                    @foreach ($kks as $kkId => $namakk)
                        <option value="{{ $kkId }}" {{ $pmt->timbang->balita->anggkk->kk->idkk == $kkId ? 'selected' : '' }}>{{ $namakk }}</option>
                    @endforeach
                </select>
                @error('idkk')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="anggkk_id">Anggkk</label>
                <select name="anggkk_id" id="anggkk_id" class="form-control" onchange="getBalitaByAnggkk()">
                    <option value="">Pilih Anggota keluarga</option>
                    @foreach ($anggkks as $anggkkId => $nama)
                        <option value="{{ $anggkkId }}" {{ $pmt->timbang->balita->anggkk == $anggkkId ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
                @error('anggkk_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="balita_id">Nama Balita</label>
                <select name="balita_id" id="balita_id" class="form-control" onchange="getTimbangByBalita()">
                    <option value="">Pilih Nama Balita</option>
                    @foreach ($balitas as $balitaId => $namabalita)
                        <option value="{{ $balitaId }}" {{ $pmt->timbang->balita == $balitaId ? 'selected' : '' }}>{{ $nama_balita }}</option>
                    @endforeach
                </select>
                @error('balita_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="timbang_id">Berat Badan Saat Penimbangan</label>
                <select name="timbang_id" id="timbang_id" class="form-control" onchange="getPmtByTimbang()">
                    <option value="">Pilih Status Gizi</option>
                    @foreach ($timbangs as $timbangId => $statusgizi)
                        <option value="{{ $timbangId }}" {{ $pmt->timbang->idtimb == $timbangId ? 'selected' : '' }}>{{ $status_gizi }}</option>
                    @endforeach
                </select>
                @error('timbang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_pemberianTMT">Tanggal Pemberian TMT</label>
                <input type="date" name="tgl_pemberianTMT" id="tgl_pemberianTMT" class="form-control" value="{{ $pmt->tgl_pemberianTMT }}">
                @error('tgl_pemberianTMT')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_PMT">Jenis PMT</label>
                <input type="text" name="jenis_PMT" id="jenis_PMT" class="form-control" value="{{ $pmt->jenis_PMT }}">
                @error('jenis_PMT')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

<script>
    function getAnggkkByKK() {
        var kkId = document.getElementById('kk_id').value;
        if (kkId) {
            fetch('/get-anggkk-by-kk/' + kkId)
                .then(response => response.json())
                .then(data => {
                    var select = document.getElementById('anggkk_id');
                    select.innerHTML = '<option value="">Pilih Anggkk</option>';
                    for (var key in data) {
                        if (data.hasOwnProperty(key)) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.text = data[key];
                            select.appendChild(option);
                        }
                    }
                });
        }
    }

    function getBalitaByAnggkk() {
        var anggkkId = document.getElementById('anggkk_id').value;
        if (anggkkId) {
            fetch('/get-balita-by-anggkk/' + anggkkId)
                .then(response => response.json())
                .then(data => {
                    var select = document.getElementById('balita_id');
                    select.innerHTML = '<option value="">Pilih Balita</option>';
                    for (var key in data) {
                        if (data.hasOwnProperty(key)) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.text = data[key];
                            select.appendChild(option);
                        }
                    }
                });
        }
    }

    function getTimbangByBalita() {
        var balitaId = document.getElementById('balita_id').value;
        if (balitaId) {
            fetch('/get-timbang-by-balita/' + balitaId)
                .then(response => response.json())
                .then(data => {
                    var select = document.getElementById('timbang_id');
                    select.innerHTML = '<option value="">Pilih Timbang</option>';
                    for (var key in data) {
                        if (data.hasOwnProperty(key)) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.text = data[key];
                            select.appendChild(option);
                        }
                    }
                });
        }
    }

    function getPmtByTimbang() {
        var timbangId = document.getElementById('timbang_id').value;
        if (timbangId) {
            fetch('/get-pmt-by-timbang/' + timbangId)
                .then(response => response.json())
                .then(data => {
                    // Do something with the data
                });
        }
    }
</script>
