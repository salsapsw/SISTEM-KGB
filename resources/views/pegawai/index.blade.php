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
<h1 class="text-primary font-weight-bold m-4">Daftar Pegawai</h1>
        <div class="mx-3 my-4">
            @if(Auth::user()->divisi->nama_divisi == "Administrator")
        <a href="/pegawai/create" class="btn btn-info mt-3"> <i class="fa-solid fa-plus"></i> Tambah Data</a>
        @endif
        <a href="/pegawaireport" class="btn btn-danger mt-3"><i class="fa-solid fa-print"> </i> Export PDF</a>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            @if (Auth::user()->divisi->nama_divisi == "Administrator")
                            <th scope="col">Tombol Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->profil->NIP }}</td>
                                <td>{{ $item->divisi->nama_divisi }}</td>
                                <td>{{ $item->profil->jenis_kelamin }}</td>
                                <td>{{ $item->profil->no_hp }}</td>
                                <td>{{ $item->profil->alamat }}</td>
                                <td>{{ $item->email }}</td>
                                    @if (Auth::user()->divisi->nama_divisi == "Administrator")
                                <td>
                                    <button class="btn btn-warning"><a href="/pegawai/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:white"><i
                                                class="fa-solid fa-pen-to-square"></i></a></button>
                                    <button class="btn btn-danger"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}"><i
                                                class="fa-solid fa-trash"></i></a></button>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                        <!-- ... (Konten modal delete) ... -->
                                    </div>
                                </td>
                            @endif

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabelDelete">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus data pegawai?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-border"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="/pegawai/{{ $item->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit"
                                                            value="Delete"class="btn btn-danger btn-border">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
            </form>
            </td>
            </tr>
        @empty
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
