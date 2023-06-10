<!-- View -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Data Lacak Balita</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('lacak.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kk_id">Kepala Keluarga</label>
                <select name="kk_id" id="kk_id" class="form-control" onchange="getAnggkkByKK()">
                    <option value="">Pilih Kepala Keluarga</option>
                    @foreach ($kks as $kkId => $namakk)
                        <option value="{{ $kkId }}">{{ $namakk }}</option>
                    @endforeach
                </select>
                @error('kk_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="anggkk_id">Anggkk</label>
                <select name="anggkk_id" id="anggkk_id" class="form-control" onchange="getBalitaByAnggkk()">
                    <option value="">Pilih Anggota keluarga</option>
                </select>
                @error('anggkk_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="balita_id">Nama Balita</label>
                <select name="balita_id" id="balita_id" class="form-control" onchange="getTimbangByBalita()">
                    <option value="">Pilih Nama Balita</option>
                </select>
                @error('balita_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="timbang_id">Berat Badan Saat Penimbangan</label>
                <select name="timbang_id" id="timbang_id" class="form-control">
                    <option value="">Pilih Status Gizi</option>
                </select>
                @error('timbang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lacak">Tanggal lacak</label>
                <input type="date" name="tgl_lacak" id="tgl_lacak" class="form-control">
                @error('tgl_lacak')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="peny_penyerta">Penye_Penyerta</label>
                <input type="text" name="peny_penyerta" id="peny_penyerta" class="form-control">
                @error('peny_penyerta')
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
    </script>

