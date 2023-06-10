@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Update Data Pemulihan</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('pemulihan.update', $pemulihan->idpulih) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kk_id">Kepala Keluarga</label>
                <select name="kk_id" id="kk_id" class="form-control" onchange="getAnggkkByKK()">
                    <option value="">Pilih Kepala Keluarga</option>
                    @foreach ($kks as $kkId => $namakk)
                        <option value="{{ $kkId }}" {{ $pemulihan->lacak->timbang->balita->anggkk->kk->idkk == $kkId ? 'selected' : '' }}>{{ $namakk }}</option>
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
                        <option value="{{ $anggkkId }}" {{ $pemulihan->lacak->timbang->balita->anggkk == $anggkkId ? 'selected' : '' }}>{{ $nama }}</option>
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
                        <option value="{{ $balitaId }}" {{ $pemulihan->lacak->timbang->balita == $balitaId ? 'selected' : '' }}>{{ $nama_balita }}</option>
                    @endforeach
                </select>
                @error('balita_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="timbang_id">Berat Badan Saat Penimbangan</label>
                <select name="timbang_id" id="timbang_id" class="form-control" onchange="getLacakByTimbang()">
                    <option value="">peny_penyerta</option>
                    @foreach ($timbangs as $timbangId => $bb)
                        <option value="{{ $timbangId }}" {{ $pemulihan->lacak->timbang->bb == $lacakId ? 'selected' : '' }}>{{ $bb }}</option>
                    @endforeach
                </select>
                @error('timbang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lacak_id">peny_penyerta</label>
                <select name="lacak_id" id="lacak_id" class="form-control">
                    <option value="">Pilih Peny_Penyerta</option>
                </select>
                @error('lacak_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_konsumsi_awal">Tanggal Konsumsi Awal</label>
                <input type="date" name="tgl_konsumsi_awal" id="tgl_konsumsi_awal" class="form-control" value="{{ $pemulihan->tgl_konsumsi_awal }}">
                @error('tgl_konsumsi_awal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_konsumsi_akhir">Tanggal Konsumsi Akhir</label>
                <input type="date" name="tgl_konsumsi_akhir" id="tgl_konsumsi_akhir" class="form-control" value="{{ $pemulihan->tgl_konsumsi_akhir }}">
                @error('tgl_konsumsi_akhir')
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

    function getLacakByTimbang() {
            var timbangId = document.getElementById('timbang_id').value;
            if (timbangId) {
                fetch('/get-lacak-by-timbang/' + timbangId)
                    .then(response => response.json())
                    .then(data => {
                        var select = document.getElementById('lacak_id');
                        select.innerHTML = '<option value="">Pilih Pelacakan</option>';
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
</script>
