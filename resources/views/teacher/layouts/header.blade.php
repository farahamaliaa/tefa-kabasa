<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <div class="d-flex">
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                </button>
            </div>
        </ul>
        <div class="d-block d-lg-none">
            <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" class="dark-logo img-fluid" width="140" alt="" />
            <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" class="light-logo img-fluid" width="140" alt="" />
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item">
                        <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2">
                            <span class="text-dark fs-3 fw-semibold lh-1 mb-1 username">
                                {{ auth()->user()->name }}
                            </span>
                            {{-- <span class="text-dark fs-3 fw-bold lh-1 role">
                                head master
                            </span> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/default-user.jpeg') }}"
                                        class="rounded-circle user-profile" style="object-fit: cover" width="35"
                                        height="35" alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">{{ auth()->user()->name }} Profil</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/default-user.jpeg') }}"
                                        class="rounded-circle user-profile" style="object-fit: cover" width="80"
                                        height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3 username">{{ auth()->user()->name }}</h5>
                                        @foreach (auth()->user()->getRoleNames() as $role)
                                            <span class="mb-1 d-block text-dark role">{{ $role }}</span>
                                        @endforeach
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2 email">
                                            <i class="ti ti-mail fs-4"></i>
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="message-body">
                                    <a class="py-8 px-7 mt-8 d-flex align-items-center"
                                        href="#">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg"
                                                alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold"> Profile Ku </h6>
                                            <span class="d-block text-dark">Setting Akun</span>
                                        </div>
                                    </a>
                                </div> --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <button class="btn btn-outline-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Log
                                            Out</button>
                                    </div>
                                </form>
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
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/default-user.jpeg') }}" class="rounded-circle user-profile"
                        style="object-fit: cover" width="35" height="35" alt="" />
                </div>
            </button>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-down" style="width: 320px;"
                aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                        <h5 class="mb-0 fs-5 fw-semibold">{{ auth()->user()->name }} Profile</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/default-user.jpeg') }}" class="rounded-circle user-profile"
                            style="object-fit: cover" width="80" height="80" alt="" />
                        <div class="ms-3">
                            <h5 class="mb-1 fs-3 username">{{ auth()->user()->name }}</h5>
                            <span class="mb-1 d-block text-dark role">{{ auth()->user()->name }}</span>
                            <p class="mb-0 d-flex text-dark align-items-center gap-2 email">
                                <i class="ti ti-mail fs-4"></i>
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                    {{-- <div class="message-body">
                        <a class="py-8 px-7 mt-8 d-flex align-items-center"
                            href="{{ asset('assets/images/logo/logo-M.png') }}">
                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg"
                                    alt="" width="24" height="24">
                            </span>
                            <div class="w-75 d-inline-block v-middle ps-3">
                                <h6 class="mb-1 bg-hover-primary fw-semibold"> Profile Ku </h6>
                                <span class="d-block text-dark">Setting Akun</span>
                            </div>
                        </a>
                    </div> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="d-grid py-4 px-7 pt-8">
                            <button class="btn btn-outline-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Log
                                Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </nav>
</header>
