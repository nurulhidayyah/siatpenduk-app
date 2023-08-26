<div style="margin-bottom: 100px">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/assets/img/logoDesaDukuh.png" width="30" height="30" class="d-inline-block align-top"
                    alt="SIATPENDUK">
                SIATPENDUK
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase">
                    <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
                        <a class="nav-link" href="/user">Beranda</a>
                    </li>
                    <li class="nav-item {{ Request::is('user/pengajuan') ? 'active' : '' }}">
                        <a class="nav-link" href="/user/pengajuan">Pengajuan</a>
                    </li>
                </ul>
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item dropdown {{ Request::is('user/profile*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->nama }}
                            @if (auth()->user()->image)
                                <img class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->image) }}" width="30" height="30">
                            @else
                                <img class="img-profile rounded-circle" src="/assets/img/undraw_profile.svg" width="30" height="30">
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="/user/profile" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#logoutModal" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
