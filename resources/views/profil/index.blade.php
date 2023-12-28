@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')
    <div class="card mx-5 my-4">
        <div class="card-header py-3">
            <h1 class="font-weight-bold text-primary">Profil</h1>
        </div>
        <div class="row">
            <div class="col-auto ml-5 mr-5 my-4">
                @if ($profil->foto_profil != null)
                    <img src="{{ asset('/images/foto_profil/' . $profil->foto_profil) }}"
                        style="width:150px;height:150px;border-radius:100px">
                @else
                    <img src="{{ asset('template/img/madiun.png') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>
            <div class="col-auto mx-4">
                <div class="form-group">
                    <label for="nama" class="text-lg text-primary font-weight-bold">Nama Lengkap</label>
                    <h4>{{ $profil->user->nama }}</h4>
                </div>

                <div class="form-group">
                    <label for="divisi" class="text-lg text-primary font-weight-bold">Posisi</label>
                    <h4>{{ $user_divisi->nama_divisi }}</h4>
                </div>

                <div class="form-group">
                    <label for="NIP" class="text-lg text-primary font-weight-bold">NIP</label>
                    <h4>{{ $profil->NIP }}</h4>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin" class="text-lg text-primary font-weight-bold">Jenis Kelamin</label>
                    <h4>{{ $profil->jenis_kelamin }}</h4>
                </div>

                <div class="form-group">
                    <label for="alamat" class="text-lg text-primary font-weight-bold">Alamat</label>
                    <h4>{{ $profil->alamat }}</h4>
                </div>

                <div class="form-group">
                    <label for="email" class="text-lg text-primary font-weight-bold">Email</label>
                    <h4>{{ $profil->user->email }}</h4>
                </div>

                <div class="form-group ">
                    <label for="no_hp" class="text-lg text-primary font-weight-bold">Nomor Telepon</label>
                    <h4>{{ $profil->no_hp }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/profil/{{ $profil->id }}/edit" class="btn btn-primary px-5">Edit Profil</a>
        </div>
    </div>
@endsection
