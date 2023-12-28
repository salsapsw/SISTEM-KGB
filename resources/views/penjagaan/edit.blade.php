@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">Edit Data</h1>


<div class="card mx-4 my-4 px-2">

    <form action="/penjagaan/{{ $penjagaan->id }}" method="post">
        @csrf
        @method('put')
        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama</label>
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{  old('nama', $penjagaan->nama)  }}">
        </div>

        @error('nama')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="pangkat" class="text-md text-primary font-weight-bold mt-2">Pangkat</label>
            <input type="text" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" value="{{  old('pangkat', $penjagaan->pangkat)  }}">
        </div>

        @error('pangkat')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="golongan" class="text-md text-primary font-weight-bold mt-2">Golongan</label>
            <input type="text" id="golongan" class="form-control @error('golongan') is-invalid @enderror" name="golongan" value="{{  old('golongan', $penjagaan->golongan)  }}">
        </div>

        @error('golongan')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="no_sk" class="text-md text-primary font-weight-bold mt-2">Nomor SK</label>
            <input type="text" id="no_sk" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" value="{{  old('no_sk', $penjagaan->no_sk)  }}">
        </div>

        @error('no_sk')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="tgl_sk" class="text-md text-primary font-weight-bold mt-2">Tanggal SK</label>
            <input type="date" id="tgl_sk" class="form-control @error('tgl_sk') is-invalid @enderror" name="tgl_sk" value="{{  old('tgl_sk', $penjagaan->tgl_sk)  }}">
        </div>

        @error('tgl_sk')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="tmt_sk" class="text-md text-primary font-weight-bold mt-2">TMT SK</label>
            <input type="date" id="tmt_sk" class="form-control @error('tmt_sk') is-invalid @enderror" name="tmt_sk" value="{{  old('tmt_sk', $penjagaan->tmt_sk)  }}">
        </div>

        @error('tmt_sk')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="masa_kerja" class="text-md text-primary font-weight-bold mt-2">Masa Kerja</label>
            <input type="text" id="masa_kerja" class="form-control @error('masa_kerja') is-invalid @enderror" name="masa_kerja" value="{{  old('masa_kerja', $penjagaan->masa_kerja)  }}">
        </div>

        @error('masa_kerja')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="gaji" class="text-md text-primary font-weight-bold mt-2">Gaji</label>
            <input type="text" id="gaji" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{  old('gaji', $penjagaan->gaji)  }}">
        </div>

        @error('gaji')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        {{-- <div class="form-group mx-4">
            <label for="keterangan" class="text-md text-primary font-weight-bold mt-2">Keterangan</label>
            <input type="text" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{  old('keterangan', $penjagaan->keterangan)  }}">
        </div>

        @error('keterangan')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror
  --}}

        <div class="d-flex justify-content-end">
            <a href="/penjagaan" class="btn btn-danger px-3 py-2 my-3">Batal</a>
            <button class="btn btn-info px-3 py-2 my-3 mx-2">Edit</button>
        </div>

    </form>

</div>


@endsection

