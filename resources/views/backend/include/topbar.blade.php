<nav class="sb-topnav navbar navbar-expand navbar-dark">
    <a class="navbar-brand text-center ps-3" target="_blank" href="">
        <img class="backend-nav-logo" src="{{ Helper::getSettings('site_logo') ? asset('uploads/settings/'.Helper::getSettings('site_logo')) : asset('assets/img/Logo.png')}}" alt="Logo">
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <ul class="ms-auto me-0 me-md-3 my-2 my-md-0 me-lg-4 gap-3">
        <li class="">
            <div class="ok">
                <div class="admin-profile">
                    <div class="dropdown">
                        <a href="#" class="topimage" id="navbarDropdown" role="button" aria-expanded="false">
                            <img class="profile-img"  src="{{ asset('assets/img/no-img.jpg') }}" alt="profile image">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            {{-- <li>
                                <a class="dropdown-item" href="">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a class="dropdown-item" href="">
                                    <i class="fa-solid fa-gear"></i> Change Password
                                </a>
                            </li> --}}
                            <li>
                                <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button class="dropdown-item logout-btn" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>


<style>
    /* Style for the dropdown within the .admin-profile parent */
    .admin-profile .dropdown {
        position: relative;
    }

    .admin-profile .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
    }

    .admin-profile .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
