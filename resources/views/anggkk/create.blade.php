<!-- resources/views/anggkk/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Tambah Anggkk</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('anggkk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idkk">KK</label>
            <select name="idkk" id="idkk" class="form-control">
                @foreach ($kkData as $kk)
                    <option value="{{ $kk->idkk }}">{{ $kk->namakk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type ="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="ttl">TTL</label>
            <input type="date" name="ttl" id="ttl" class="form-control" value="{{ old('ttl') }}">
        </div>
        <div class="form-group">
            <label for="sex">Sex</label>
        <select name="sex" id="sex" class="form-control">
            <option value="L" {{ old('sex') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('sex') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        </div>
        <div class="form-group">
            <label for="hubungan">Hubungan</label>
            <input type="text" name="hubungan" id="hubungan" class="form-control" value="{{ old('hubungan') }}">
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
        </div>
        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ old('pendidikan') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
