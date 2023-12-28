@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection



@section('content')
<h1 class="text-primary mx-3 my-3">Edit Profile</h1>
    <form action="/profil/{{$profil->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card mx-3 my-4 py-2">
            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $profil->user->nama) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="divisi" class="text-md text-primary font-weight-bold mt-2">Divisi</label>
                <input type="text" name="divisi" class="form-control" value="{{ old('divisi', $user_divisi->nama_divisi) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="NIP" class="text-md text-primary font-weight-bold">NIP</label>
                <input type="text" name="NIP" class="form-control" value="{{ old('NIP', $profil->NIP) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="jenis_kelamin" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin "class="form-control" value="{{ old('jenis_kelamin', $profil->jenis_kelamin) }}" disabled>
            </div>


            <div class="form-group mx-4">
                <label for="alamat" class="text-md text-primary font-weight-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profil->alamat) }}">
            </div>

            @error('alamat')
                <div class="alert-danger mx-4 py-2"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="no_hp" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $profil->no_hp) }}">
            </div>

            @error('no_hp')
                <div class="alert-danger mx-2 py-2"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="foto_profil" class="text-md text-primary font-weight-bold">Tambah Foto Profil</label>
                <div class="custom-file">
                    <input type="file" name="foto_profil" id="foto_profil"
                        value="{{ old('foto_profil', $profil->foto_profil) }}">
                </div>
            </div>

            @error('foto_profil')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="current_password" class="text-md text-primary font-weight-bold mt-2">Kata Sandi Saat Ini</label>
                <input type="password" name="current_password" class="form-control" >
            </div>

            @error('current_password')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror
        
            <div class="form-group mx-4">
                <label for="new_password" class="text-md text-primary font-weight-bold mt-2">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="form-control">
            </div>

            @error('new_password')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror
        
            <div class="form-group mx-4">
                <label for="new_password_confirmation" class="text-md text-primary font-weight-bold mt-2">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control">
            </div>

            @error('new_password_confirmation')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror


            <div class="button-save d-flex justify-content-end">
                <a href="/profil" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit"class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
    </form>
    </div>
    </div>
@endsection
