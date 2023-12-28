@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')
    <h1 class="text-primary mx-3 my-3">Ganti Password</h1>
    
    <form action="{{ route('profil.update-password') }}" method="post">
        @csrf
        @method('put')

        <div class="form-group mx-4">
            <label for="current_password" class="text-md text-primary font-weight-bold">Password Lama</label>
            <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama">
        </div>

        <div class="form-group mx-4">
            <label for="password" class="text-md text-primary font-weight-bold">Password Baru</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
        </div>

        <div class="form-group mx-4">
            <label for="password_confirmation" class="text-md text-primary font-weight-bold">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password baru">
        </div>

        @error('current_password')
            <div class="alert-danger mx-4 py-2">{{ $message }}</div>
        @enderror

        @error('password')
            <div class="alert-danger mx-4 py-2">{{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Ganti Password</button>
        </div>
    </form>
@endsection
