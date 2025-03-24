<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SIPKEDIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ auth()->user()->role === '0' ? 'Karyawan' : 'Admin' }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link {{  (request()->is('/') || request()->is('home')) ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('peminjaman') }}" class="nav-item nav-link {{ request()->is('peminjaman') ? 'active' : '' }}"><i class="fa fa-file-archive me-2"></i>Peminjaman</a>
            @if (auth()->user()->role == '1')
                <a href="{{ route('pengembalian') }}" class="nav-item nav-link {{ request()->is('pengembalian') ? 'active' : '' }}"><i class="fa fa-exchange-alt me-2"></i>Pengembalian</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ (request()->is('kendaraan') || request()->is('jenis-kendaraan') ) ? 'active show' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-car me-2"></i>Kendaraan</a>
                    <div class="dropdown-menu bg-transparent border-0 {{ (request()->is('kendaraan') || request()->is('jenis-kendaraan') ) ? 'show' : '' }}">
                        <a href="{{ route('jenis-kendaraan') }}" class="dropdown-item {{ request()->is('jenis-kendaraan') ? 'active' : '' }}"> <i class="fa fa-circle me-2"></i>Jenis Kendaraan</a>
                        <a href="{{ route('kendaraan') }}" class="dropdown-item {{ request()->is('kendaraan') ? 'active' : '' }}"> <i class="fa fa-circle me-2"></i>List Kendaraan</a>
                    </div>
                </div>
                <a href="{{ route('users') }}" class="nav-item nav-link {{ request()->is('users') ? 'active' : '' }}"><i class="fa fa-users me-2"></i>User</a>
            @endif
        </div>
    </nav>
    
</div>