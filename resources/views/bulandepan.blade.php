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
<h1 class="text-primary font-weight-bold m-4">PENJAGAAN KGB - Berkala Bulan Depan</h1>

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
    @endsection
