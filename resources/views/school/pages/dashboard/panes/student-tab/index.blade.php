<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Siswa Telat Absen</b></h6>
                    </div>
                    <div class="bg-primary text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-primary text-primary px-3 py-2"
                    style="font-size: 20px"><b>{{ $lates->count() }} Siswa</b></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Siswa Izin</b></h6>
                    </div>
                    <div class="bg-warning text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-warning text-warning px-3 py-2"
                    style="font-size: 20px"><b>{{ $totalPermit }} Siswa</b></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Siswa Alfa</b></h6>
                    </div>
                    <div class="bg-danger text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-danger text-danger px-3 py-2" style="font-size: 20px"><b>{{ $alpha->count() }} Siswa</b></span>
            </div>
        </div>
    </div>
</div>


<div class="row d-flex">
    <div class="col-lg-8 col-md-12 d-flex mb-4">
        <div class="card w-100 h-100 border">
            <div class="card-body">
                <h5 class="mb-4"><b>Data Absensi Siswa</b></h5>
                <ul class="nav nav-pills mb-4 rounded align-items-center flex-row justify-content-between">
                    <div class="d-flex">
                        <li class="nav-item">
                            <a href="#late-content" data-bs-toggle="tab"
                                class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                                id="late">
                                <span class="font-weight-medium">Telat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#permission-content" data-bs-toggle="tab"
                                class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                                id="permission">
                                <span class="font-weight-medium">Izin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#alpha-content" data-bs-toggle="tab"
                                class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                                id="alpha">
                                <span class="font-weight-medium">Alpha</span>
                            </a>
                        </li>
                    </div>
                </ul>

                <div class="tab-content">
                    <div id="late-content" class="tab-pane fade show active">
                        <div class="note-has-grid row">
                            <div class="col-12">
                                @include('school.pages.dashboard.panes.student-tab.late-tab')
                            </div>
                        </div>
                    </div>

                    <div id="permission-content" class="tab-pane fade">
                        <div class="note-has-grid row">
                            <div class="col-12">
                                @include('school.pages.dashboard.panes.student-tab.permisson-tab')
                            </div>
                        </div>
                    </div>

                    <div id="alpha-content" class="tab-pane fade">
                        <div class="note-has-grid row">
                            <div class="col-12">
                                @include('school.pages.dashboard.panes.student-tab.alpha-tab')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 d-flex">
        <div class="card w-100 h-100 overflow-hidden border">
            <div class="card-body">
                <div class="row align-items-center">
                    <h5 class="card-title fw-semibold">Statistik Absensi Siswa</h5>
                    <h6 class="mb-3">Hari ini</h6>
                    <div id="chart-student" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
