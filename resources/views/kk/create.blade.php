<!-- resources\views\kk\create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Tambah Data KK</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('kk.store') }}">
        @csrf
        <div class="form-group">
            <label for="namakk">Nama KK</label>
            <input type="text" name="namakk" id="namakk" class="form-control" value="{{ old('namakk') }}">
        </div>
        <div class="form-group">
            <label for="TTL">TTL</label>
            <input type="date" name="TTL" id="TTL" class="form-control" value="{{ old('TTL') }}">
        </div>
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="form-control">
                <option value="L" {{ old('sex') == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('sex') == 'P' ? 'selected' : '' }}>P</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
        </div>
        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ old('pendidikan') }}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection

