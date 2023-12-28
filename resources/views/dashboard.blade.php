
@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection


@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
        <style>
            .alert-marquee {
                white-space: nowrap;
                overflow: hidden;
                animation: marquee 10s linear infinite;
                background-color: #ff0d00;
                color: #fff;
                font: bold;
                font-size: 20px;
                animation: blinker 1s linear infinite;
                
            }
    
            @keyframes marquee {
                0% {
                    transform: translateX(100%);
                }
                100% {
                    transform: translateX(-100%);
                }
            }
    
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
    
        </style>
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

@if($penjagaanBulanDepanCount > 0)
<div class="alert alert-info alert-marquee" role="alert">
    Terdapat {{ $penjagaanBulanDepanCount }} data Penjagaan KGB yang perlu diperbarui untuk bulan depan.
</div>
@endif

<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-bold mx-3 my-4" style="font-weight: bold; font-size: 24px; color: #333;">Selamat Datang, {{ $namaUser }}!!</h1>
</div>


<div class="row mx-2 my-2">
    <div class="col-sm-6 col-md-3">
        <a href="{{ route('pegawai.index') }}" class="card-link">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Pegawai</p>
                                <h4 class="card-title">{{ $pegawai_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="{{ route('penjagaan.index') }}" class="card-link">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fa-regular fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Penjagaan KGB</p>
                                <h4 class="card-title">{{ $penjagaan_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="{{ route('bulandepan.index') }}" class="card-link">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fa-regular fa-edit"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Berkala Bulan Depan</p>
                                <h4 class="card-title">{{ $penjagaanBulanDepanCount}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
    <h1 class="text-primary font-weight-bold m-4">Berkala Bulan Depan</h1>
    <div class="card mx-4 my-4">
        <div class="table-responsive p-3">
            <table class="table table-flush table-hover" id="dataTableNextMonth">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pangkat</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Nomor SK</th>
                        <th scope="col">Tanggal SK</th>
                        <th scope="col">TMT SK</th>
                        <th scope="col">Masa Kerja</th>
                        <th scope="col">Gaji Pokok</th>
                        {{-- Tambahkan kolom sesuai kebutuhan --}}
                        @if (Auth::user()->divisi->nama_divisi == "Administrator")
                            <th scope="col">Tombol Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjagaanNextMonth as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->pangkat }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->no_sk }}</td>
                            <td>{{ $item->tgl_sk }}</td>
                            <td>{{ $item->tmt_sk }}</td>
                            <td>{{ $item->masa_kerja }}</td>
                            <td>{{ $item->gaji }}</td>
                            {{-- Tambahkan kolom sesuai kebutuhan --}}
                            @if (Auth::user()->divisi->nama_divisi == "Administrator")
                                <td>
                                    <button class="btn btn-warning">
                                        <a href="/penjagaan/{{ $item->id }}/edit" style="text-decoration: none; color:white">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal{{ $item->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                        <!-- ... (kode modal yang sudah ada) ... -->
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Tidak ada kenaikan gaji berkala untuk bulan depan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
