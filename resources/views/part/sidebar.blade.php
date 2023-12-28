<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if ($profil->foto_profil === null)
                        <img src="{{ asset('/template/img/madiun.png') }}" alt="..." class="avatar-img rounded-circle">
                    @else
                        <img src="{{asset('/images/foto_profil/'.$profil->foto_profil)}}" alt="..." class="avatar-img rounded-circle">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->nama }}
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="/profil">
                                    <span class="link-collapse">Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a href="/profil/{{ $profil->id }}/edit">
                                    <span class="link-collapse">Edit Profil</span>
                                </a>
                            </li>
                            <li>
                                <a class="link-collapse text-dark" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pegawai">
                        <i class="fa-solid fa-users"></i>
                        <p>Pegawai</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pegawai">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/pegawai">
                                    <span class="sub-item">Lihat Semua Pegawai</span>
                                </a>
                            </li>
                            @if (Auth::user()->divisi->nama_divisi == "Administrator")
                                <li>
                                    <a href="/pegawai/create">
                                        <span class="sub-item">Tambah Data Pegawai</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#penjagaan">
                        <i class="fa-regular fa-calendar"></i>
                        <p>KGB</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="penjagaan">
                        <ul class="nav nav-collapse">
                                <li>
                                    <a href="/penjagaan">
                                        <span class="sub-item">Penjagaan KGB</span>
                                    </a>
                                </li>
                                @if (Auth::user()->divisi->nama_divisi == "Administrator")
                                <li>
                                    <a href="/penjagaan/create">
                                        <span class="sub-item">Tambah Data KGB</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
