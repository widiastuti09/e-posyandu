<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('Admin_LTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Posyandu</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Admin_LTE/dist/img/user-circle.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(Request::is('dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kader1')
                <li class="nav-item @if(Request::is('registeribuhamil') || Request::is('pemeriksaaan-ibu-hamil') || Request::is('Bumil-resti')) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-female"></i>
                            <p>
                                Data Ibu Hamil
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('registerhamil') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Register Ibu Hamil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pemeriksaanibuhamil.index') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Pemeriksaan Ibu Hamil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('bumilresti')}}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Laporan Ibu Hamil Resti</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(Request::is('register') || Request::is('penimbangan')) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-baby"></i>
                            <p>
                                Data Balita
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Register Balita</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('penimbangan') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Penimbangan Balita</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                   
                @endif
                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kader2')
                <li class="nav-item @if(Request::is('registerlansia') || Request::is('pemeriksaanlansia')) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-blind"></i>
                            <p>
                                Data Lansia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('registerlansia') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Register Lansia</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('pemeriksaanlansia') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Pemeriksaan Lansia</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
               
                @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kader1' ||  auth()->user()->level == 'kader2')
                    <li class="nav-item @if(Request::is('Jadwal-Balita') || Request::is('Jadwal-Bumil')||Request::is('Jadwal-Lansia')) menu-open @endif">
                        <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Jadwal Posyandu
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        @if (auth()->user()->level === 'admin' || auth()->user()->level == 'kader1') 
                            <li class="nav-item">
                                <a href="{{route('jadwalpenimbangan')}}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Balita</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('jadwalpemeriksaan')}}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Ibu Hamil</p>
                                </a>
                            </li>
                            @endif
                            @if (auth()->user()->level === 'admin' || auth()->user()->level == 'kader2') 
                            <li class="nav-item">
                                <a href="{{route('jadwallansia')}}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Lansia</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                 @endif
                 @if (auth()->user()->level === 'admin')
                <li class="nav-item @if(Request::is('pegguna')) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('pengguna.index') }}" class="nav-link ">
                                    <i class="fas fa-chevron-right nav-icon text-warning"></i>
                                    <p>Register User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out

                        </p>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
