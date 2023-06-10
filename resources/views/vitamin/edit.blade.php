@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Vitamin</h2>
        <form action="{{ route('vitamin.update', ['id' => $vitamin->idvit]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kk">Kepala Keluarga:</label>
                <select class="form-control" id="kk" name="kk">
                    <option value="">Pilih Kepala Keluarga</option>
                    @foreach ($kks as $kk)
                        <option value="{{ $kk->idkk }}" {{ $vitamin->balita->anggkk->kk->idkk == $kk->idkk ? 'selected' : '' }}>
                            {{ $kk->namakk }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anggkk">Anggota Keluarga:</label>
                <select class="form-control" id="anggkk" name="anggkk">
                    <option value="">Pilih Anggota Keluarga</option>
                    @foreach ($anggkks as $anggkkId => $anggkkNama)
                        <option value="{{ $anggkkId }}" {{ $vitamin->balita->anggkk->id_ang_kk == $anggkkId ? 'selected' : '' }}>
                            {{ $anggkkNama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="balita">Nama Balita:</label>
                <select class="form-control" id="balita" name="balita">
                    <option value="">Pilih Nama Balita</option>
                    @foreach ($balitas as $balitaId => $balitaNama)
                        <option value="{{ $balitaId }}" {{ $vitamin->balita->idbalita == $balitaId ? 'selected' : '' }}>
                            {{ $balitaNama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pemberian">Tanggal Pemberian:</label>
                <input type="date" class="form-control" id="tgl_pemberian" name="tgl_pemberian" value="{{ $vitamin->tgl_pemberian }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('vitamin.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kk').on('change', function() {
                var kkId = $(this).val();
                if (kkId) {
                    $.ajax({
                        url: '/get-anggkk-by-kk/' + kkId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#anggkk').empty();
                            $('#anggkk').append('<option value="">Pilih Anggota Keluarga</option>');
                            $.each(data, function(key, value) {
                                $('#anggkk').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#anggkk').empty();
                    $('#balita').empty();
                }
            });

            $('#anggkk').on('change', function() {
                var anggkkId = $(this).val();
                if (anggkkId) {
                    $.ajax({
                        url: '/get-balita-by-anggkk/' + anggkkId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#balita').empty();
                            $('#balita').append('<option value="">Pilih Nama Balita</option>');
                            $.each(data, function(key, value) {
                                $('#balita').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#balita').empty();
                }
            });
        });
    </script>

