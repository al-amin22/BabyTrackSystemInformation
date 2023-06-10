@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Data Balita</h2>
        <form action="{{ route('balita.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kk">Pilih Kepala Keluarga:</label>
                <select class="form-control" id="kk" name="kk">
                    <option value="">Pilih Anggkk</option>
                    @foreach ($kks as $id => $namakk)
                        <option value="{{ $id }}">{{ $namakk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anggkk">Pilih Anggota keluarga:</label>
                <select class="form-control" id="anggkk" name="anggkk">
                    <option value="">Pilih Anggkk</option>
                </select>
                <input type="hidden" name="id_ang_kk" id="id_ang_kk"> <!-- Menambahkan input hidden untuk menyimpan nilai id_ang_kk -->
            </div>
          
            <div class="form-group">
                <label for="nama_balita">Nama Balita:</label>
                <input type="text" class="form-control" id="nama_balita" name="nama_balita">
            </div>
            <div class="form-group">
                <label for="bb">Berat Badan (kg):</label>
                <input type="number" class="form-control" id="bb" name="bb">
            </div>
            <div class="form-group">
                <label for="pb">Panjang Badan (cm):</label>
                <input type="number" class="form-control" id="pb" name="pb">
            </div>
            <div class="form-group">
                <label for="kms">KMS:</label>
                <select class="form-control" id="kms" name="kms">
                    <option value="">Pilih KMS</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                    <option value="T">T</option>
                </select>
            </div>
            <div class="form-group">
                <label for="asi_eks">Asi Eksklusif:</label>
                <select class="form-control" id="asi_eks" name="asi_eks">
                    <option value="">Pilih ASI Eksklusif</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
                        url: '/get-anggkks/' + kkId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#anggkk').empty();
                            $('#anggkk').append('<option value="">Pilih Anggkk</option>'); // Menambahkan opsi default pada select anggkk
                            $.each(data, function(key, value) {
                                $('#anggkk').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#anggkk').empty();
                    $('#anggkk').append('<option value="">Pilih Anggkk</option>'); // Menambahkan opsi default pada select anggkk
                }
                $('#id_ang_kk').val(''); // Mengosongkan nilai id_ang_kk saat opsi kepala keluarga berubah
            });

            $('#anggkk').on('change', function() {
                var anggkkId = $(this).val();
                $('#id_ang_kk').val(anggkkId); // Mengisi nilai id_ang_kk dengan nilai anggkkId saat opsi anggota keluarga dipilih
            });
        });
    </script>

