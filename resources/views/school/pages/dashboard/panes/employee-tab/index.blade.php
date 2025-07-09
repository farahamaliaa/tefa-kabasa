<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Guru Telat Absen</b></h6>
                    </div>
                    <div class="bg-primary text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-primary text-primary px-3 py-2"
                    style="font-size: 20px"><b>{{ $lates_teacher->count() }} Guru</b></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Guru Izin</b></h6>
                    </div>
                    <div class="bg-warning text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-warning text-warning px-3 py-2"
                    style="font-size: 20px"><b>{{ $totalPermit_teacher }} Guru</b></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card border shadow rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div>
                        <h6 style="font-size: 18px"><b>Jumlah Guru Alfa</b></h6>
                    </div>
                    <div class="bg-danger text-light d-inline-block px-1 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                        </svg>
                    </div>
                </div>
                <span class="mb-1 badge font-medium bg-light-danger text-danger px-3 py-2" style="font-size: 20px"><b>{{ $alpha_teacher->count() }} Guru</b></span>
            </div>
        </div>
    </div>
</div>
