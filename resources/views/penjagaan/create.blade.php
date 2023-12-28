@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">Tambah Data</h1>


<div class="card mx-4 my-4 px-2">

    <form action="/penjagaan" method="post">
        @csrf
        
        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama</label>
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
        </div>

        @error('nama')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="pangkat" class="text-md text-primary font-weight-bold mt-2">Pangkat</label>
            <input type="text" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" value="{{ old('pangkat') }}">
        </div>

        @error('pangkat')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="golongan" class="text-md text-primary font-weight-bold">Golongan</label>
            <select name="golongan" id="golongan" class="form-control @error('golongan') is-invalid @enderror">
                <option value="">Pilih Golongan</option>
                <option value="I-A">I A</option>
                <option value="I-B">I B</option>
                <option value="I-C">I C</option>
                <option value="I-D">I D</option>
                <option value="II-A">II A</option>
                <option value="II-B">II B</option>
                <option value="II-C">II C</option>
                <option value="II-D">II D</option>
                <option value="III-A">III A</option>
                <option value="III-B">III B</option>
                <option value="III-C">III C</option>
                <option value="III-D">III D</option>
                <option value="IV-A">IV A</option>
                <option value="IV-B">IV B</option>
                <option value="IV-C">IV C</option>
                <option value="IV-D">IV D</option>
                <option value="IV-E">IV E</option>
            </select>
        </div>

        @error('golongan')
            <div class="alert-danger mx-4 my-2 px-2 py-2 mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="no_sk" class="text-md text-primary font-weight-bold mt-2">Nomor SK</label>
            <input type="text" id="no_sk" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" value="{{ old('no_sk') }}">
        </div>

        @error('no_sk')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label class="text-md text-primary font-weight-bold">Tanggal SK</label>
            <input type="date" name="tgl_sk" class="form-control">
        </div>
        @error('tgl_sk')
            <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label class="text-md text-primary font-weight-bold">TMT SK</label>
            <input type="date" name="tmt_sk" class="form-control">
        </div>
        @error('tmt_sk')
            <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="masa_kerja" class="text-md text-primary font-weight-bold mt-2">Masa Kerja</label>
            <input type="text" id="masa_kerja" class="form-control @error('masa_kerja') is-invalid @enderror" name="masa_kerja" value="{{ old('masa_kerja') }}">
        </div>
        @error('masa_kerja')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="gaji" class="text-md text-primary font-weight-bold mt-2">Gaji</label>
            <input type="text" id="gaji" class="form-control @error('gaji') is-invalid @enderror" name="gaji" value="{{ old('gaji') }}">
        </div>
        @error('gaji')
            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

        {{-- <div class="form-group mx-4">
            <label for="keterangan" class="text-md text-primary font-weight-bold">Keterangan</label>
            <select name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                <option value="">Pilih Keterangan</option>
                <option value="KP">KP</option>
                <option value="KGB">KGB</option>
            </select>
        </div>

        @error('keterangan')
            <div class="alert-danger mx-4 my-2 px-2 py-2 mx-2"> {{ $message }}</div>
        @enderror --}}

        <div class="d-flex justify-content-end">
            <a href="/penjagaan" class="btn btn-danger px-3 py-2 my-3">Batal</a>
            <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
        </div>

    </form>

</div>


@endsection

