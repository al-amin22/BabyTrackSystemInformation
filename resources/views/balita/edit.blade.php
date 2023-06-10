@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Data Balita</h2>
        <form action="{{ route('balita.update', ['id' => $balita->idbalita ?? '']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kk">Pilih Kepala Keluarga:</label>
                <select class="form-control" id="kk" name="kk">
                    <option value="">Nama kepala keluarga</option>
                    @foreach ($kks as $id => $namakk)
                        <option value="{{ $id }}" {{ ($balita->anggkk->kk->id ?? '') == $id ? 'selected' : '' }}>
                            {{ $namakk }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anggkk">Pilih Anggota Keluarga:</label>
                <select class="form-control" id="anggkk" name="anggkk">
                    <option value="">Nama Anggota Keluarga</option>
                    @foreach ($anggkks as $id => $namaanggkk)
                        <option value="{{ $id }}" {{ ($balita->anggkk->id_ang_kk ?? '') == $id ? 'selected' : '' }}>
                            {{ $namaanggkk }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="id_ang_kk" id="id_ang_kk" value="{{ $balita->anggkk->id_ang_kk ?? '' }}">
            </div>
            <div class="form-group">
                <label for="nama_balita">Nama Balita:</label>
                <input type="text" class="form-control" id="nama_balita" name="nama_balita" value="{{ $balita->nama_balita ?? '' }}">
            </div>
            <div class="form-group">
                <label for="bb">Berat Badan (kg):</label>
                <input type="number" class="form-control" id="bb" name="bb" value="{{ $balita->bb ?? '' }}">
            </div>
            <div class="form-group">
                <label for="pb">Panjang Badan (cm):</label>
                <input type="number" class="form-control" id="pb" name="pb" value="{{ $balita->pb ?? '' }}">
            </div>
            <div class="form-group">
                <label for="kms">KMS:</label>
                <select class="form-control" id="kms" name="kms">
                    <option value="">Pilih KMS</option>
                    <option value="L" {{ ($balita->kms ?? '') == 'L' ? 'selected' : '' }}>L</option>
                    <option value="P" {{ ($balita->kms ?? '') == 'P' ? 'selected' : '' }}>P</option>
                    <option value="T" {{ ($balita->kms ?? '') == 'T' ? 'selected' : '' }}>T</option>
                </select>
            </div>
            <div class="form-group">
                <label for="asi_eks">Asi Eksklusif:</label>
                <select class="form-control" id="asi_eks" name="asi_eks">
                    <option value="">Pilih ASI Eksklusif</option>
                    <option value="Ya" {{ ($balita->asi_eks ?? '') == 'Ya' ? 'selected' : '' }}>Ya</option>
                    <option value="Tidak" {{ ($balita->asi_eks ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('balita.index') }}" class="btn btn-secondary">Kembali</a>
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
                        $('#anggkk').append('<option value="">Pilih Anggkk</option>');
                        $.each(data, function(key, value) {
                            $('#anggkk').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#anggkk').empty();
                $('#anggkk').append('<option value="">Pilih Anggkk</option>');
            }
            $('#id_ang_kk').val('');
        });

        $('#anggkk').on('change', function() {
            var anggkkId = $(this).val();
            $('#id_ang_kk').val(anggkkId);
        });

        // Menjalankan fungsi change saat halaman dimuat untuk mengisi opsi anggkk yang dipilih
        $('#kk').change();
    });
</script>
