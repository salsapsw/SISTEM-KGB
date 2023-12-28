@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<h1 class="text-primary mx-3 my-3">Form Edit Pegawai</h1>
<div class="card pb-5 mx-3">
        <form action="/pegawai/{{ $pegawai->id }}" method="post">
            @csrf
            @method('put')
        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{  old('nama', $profil->user->nama)  }}">
        </div>

        @error('nama')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="NIP" class="text-md text-primary font-weight-bold">NIP</label>
            <input type="text" id="NIP" class="form-control @error('NIP') is-invalid @enderror" name="NIP" value="{{ old('NIP', $profil->NIP) }}">
        </div>

        @error('NIP')
        <div class="alert-danger mx-4 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="NIP" class="text-md text-primary font-weight-bold">Bidang</label>
            <select name="divisi" id="divisi" class="form-control">
            <option value="{{ $pegawai->divisi_id }}">{{ $pegawai->divisi->nama_divisi }}</option>
            @foreach ($divisi as $item )
            <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
            @endforeach

            </select>
        </div>

        @error('divisi')
        <div class="alert-danger mx-4 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="jenis_kelamin" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                @if($pegawai->profil->jenis_kelamin == 'Laki-Laki')
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                @elseif ($pegawai->profil->jenis_kelamin == 'Perempuan')
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-Laki">Laki-Laki</option>
                @endif
            </select>
        </div>

        @error('jenis_kelamin')
            <div class="alert-danger mx-4 px-2 py-2 mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="alamat" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $profil->alamat) }}">
        </div>

        @error('alamat')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="no_hp" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $profil->no_hp)}}">
        </div>

        @error('no_hp')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="email" class="text-md text-primary font-weight-bold">Email</label>
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $profil->user->email)}}">
        </div>

        @error('email')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <a href="/pegawai" class="btn btn-danger mt-4  px-4 py-1">Batal</a>
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
        </div>
    </form>
    </div>
    <script>
        $('#multiselect').select2({
            allowClear: true
        });
    </script>
@endsection
