<div class="main-header" style="background-color: #261d66;">
			<!-- Logo Header -->
			<div class="logo-header">
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
                    
				</div>
        </div>
			<!-- End Logo Header -->
            <nav class="navbar navbar-header navbar-expand-lg">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm" data-background-color="bg1">
                                    @if ($profil->foto_profil === null)
									<img src="{{ asset('/template/img/madiun.png') }}" alt="..." class="avatar-img rounded-circle">
                                    @else
                                    <img src="{{asset('/images/foto_profil/'.$profil->foto_profil)}}" alt="..." class="avatar-img rounded-circle">
                                    @endif
                                </div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
                                    @if ($profil->foto_profil != null )
                                    <img  class="img-profile rounded-circle" src="{{asset('/images/foto_profil/'.$profil->foto_profil)}}" style="max-width: 60px">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{ asset('template/img/madiun.png') }}" style="max-width: 60px">
                                    @endif
										<div class="u-text">
											<h4>{{ Auth::user()->nama }}</h4>
											<p class="text-muted">{{ Auth::user()->email }}</p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                    </a>
                                    <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                    </a>
								</li>
							</ul>
						</li>

					</ul>
                </nav>
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Log Out</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin untuk log out?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"
                                        data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('logout') }}" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
