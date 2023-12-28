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
<h1 class="text-primary m-4">Form Tambah Pegawai</h1>
<form action="/pegawai" method="post">
    @csrf

    <div class="card pb-5 mx-3">
        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
        </div>

        @error('nama')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="NIP" class="text-md text-primary font-weight-bold">NIP</label>
            <input type="text" id="NIP" class="form-control @error('NIP') is-invalid @enderror" name="NIP" value="{{ old('NIP') }}">
        </div>

        @error('NIP')
        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="NIP" class="text-md text-primary font-weight-bold">Bidang</label>
            <select name="divisi" id="divisi" class="form-control">
            <option value="">Pilih Bidang</option>
            @foreach ($divisi as $item )
            <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
            @endforeach
            </select>
        </div>

        @error('divisi')
        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="jenis_kelamin" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        @error('jenis_kelamin')
            <div class="alert-danger mx-4 my-2 px-2 py-2 mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="alamat" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
        </div>

        @error('alamat')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="no_hp" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" id="alamat" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
        </div>

        @error('no_hp')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="email" class="text-md text-primary font-weight-bold">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group mx-4">
            <label for="password" class="text-md text-primary font-weight-bold">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
        </div>

        @error('password')
            <div class="alert-danger mx-4 my-2 px-2 py-2">{{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <a href="/pegawai" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
        </form>
        </div>
    </div>

    <script>
        $('#multiselect').select2({
            allowClear: true
        });
    </script>
@endsection
