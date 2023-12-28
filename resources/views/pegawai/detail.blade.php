@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@push('styles')
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush


@push('scripts')
<script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

<!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
        </script>
@endpush

@section('content')
<h1 class="text-primary m-4">Profil Karyawan</h1>
<div class="card m-4">
        <div class="row d-flex" style="gap:3rem">
            <div class="col-2 ml-5 my-4">
                @if ($profil->foto_profil !=null)
                <img src="{{ asset('/images/foto_profil/' . $profil->foto_profil) }}"
                        style="width:150px;height:150px;border-radius:100px">
                @else
                <img src="{{ asset('template/img/madiun.png') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="nama" class="text-lg text-primary font-weight-bold">Nama Lengkap</label>
                    <h4>{{ $profil->user->nama }}</h4>
                </div>

                <div class="form-group">
                    <label for="nama_divisi" class="text-lg text-primary font-weight-bold">Divisi</label>
                    <h4>{{ $pegawai->divisi->nama_divisi }}</h4>
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

                <div class="form-group mb-3">
                    <label for="no_hp" class="text-lg text-primary font-weight-bold">Nomor Telephone</label>
                    <h4>{{ $profil->no_hp }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/pegawai" class="btn btn-primary px-5">Kembali</a>
        </div>
    </div>
    </div>
@endsection
