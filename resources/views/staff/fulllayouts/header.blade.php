<nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav quick-links d-none d-lg-flex">
        <div class="d-flex">
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            </button>
        </div>
    </ul>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 6l16 0" />
                                    <path d="M4 12l16 0" />
                                    <path d="M4 18l16 0" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                        aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative d-flex flex-column align-items-end p-3">
                            <div class="mb-5">
                                <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt=""
                                    style="width: 150px; height: auto;">
                            </div>
                            <a href="/employee" type="button">
                                <h5 class="mb-0 pt-5 text-end"><b>Kembali</b></h5>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Dropdown untuk mobile -->
    <div class="dropdown d-lg-none">
        <button class="navbar-toggler p-0 border-0" type="button" id="drop1" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </div>
        </button>
        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-down" style="width: 320px;"
            aria-labelledby="drop1">
            <div class="profile-dropdown position-relative d-flex flex-column align-items-end p-3">
                <div class="mb-5">
                    <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt=""
                        style="width: 150px; height: auto;">
                </div>
                <a href="/employee" type="button">
                    <h5 class="mb-0 pt-5 text-end"><b>Kembali</b></h5>
                </a>
            </div>
        </div>


    </div>

</nav>
