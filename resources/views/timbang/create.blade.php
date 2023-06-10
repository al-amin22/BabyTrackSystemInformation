@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Data Timbang</h2>

        <form action="{{ route('timbang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kk_id">KK</label>
                <select name="kk_id" id="kk_id" class="form-control" onchange="getAnggkkByKK()">
                    <option value="">Pilih KK</option>
                    @foreach ($kks as $kkId => $namakk)
                        <option value="{{ $kkId }}">{{ $namakk }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="anggkk_id">Anggkk</label>
                <select name="anggkk_id" id="anggkk_id" class="form-control" onchange="getBalitaByAnggkk()">
                    <option value="">Pilih Anggkk</option>
                </select>
            </div>

            <div class="form-group">
                <label for="balita_id">Balita</label>
                <select name="balita_id" id="balita_id" class="form-control" onchange="getTimbangByBalita()">
                    <option value="">Pilih Balita</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_timbang">Tanggal Timbang</label>
                <input type="date" name="tgl_timbang" id="tgl_timbang" class="form-control">
            </div>

            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" name="tempat" id="tempat" class="form-control">
            </div>

            <div class="form-group">
                <label for="bb">Berat Badan</label>
                <input type="number" name="bb" id="bb" class="form-control">
            </div>

            <div class="form-group">
                <label for="tb">Tinggi Badan</label>
                <input type="number" name="tb" id="tb" class="form-control">
            </div>

            <div class="form-group">
                <label for="status_gizi">Status Gizi</label>
                <select name="status_gizi" id="status_gizi" class="form-control">
                    <option value="Baik">Baik</option>
                    <option value="Kurang">Kurang</option>
                    <option value="Lebih">Lebih</option>
                </select>
            </div>

            <div class="form-group">
                <label for="petugas">Petugas</label>
                <input type="text" name="petugas" id="petugas" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

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
    </script>
@endsection
