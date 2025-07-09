@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="gap-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Detail Sekolah</h4>
                            <div class="row pb-4 mt-5 mx-3">
                                <div class="d-flex align-items-center mb-5">
                                    <img class="card-img-top img-responsive me-3" style="max-height:80px; width: auto;"
                                        src="{{ asset('storage/'. $school->image) }}"
                                        alt="{{ $school->user->name }}">
                                    <div class="d-flex flex-column flex-sm-row justify-content-between w-100 ms-3">
                                        <div>
                                            <h3 class="mb-1">{{ $school->user->name }}</h3>
                                            <span class="badge font-medium bg-light-primary text-primary">{{ $school->type }}</span>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Tahun Ajaran</h5>
                                            <h5>{{ $schoolYear != null ? $schoolYear->school_year : 'Sekolah ini belum memiliki tahun ajaran' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="d-flex flex-column flex-md-row justify-content-between">
                                    <div class="col-md-5 mb-3 mb-md-0">
                                        <div class="d-flex justify-content-between">
                                            <h6>Kepala Sekolah :</h6>
                                            <p>{{ $school->head_school }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>NPSN :</h6>
                                            <p>{{ $school->npsn }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Nomor Telepon :</h6>
                                            <p>{{ $school->phone_number }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Email : </h6>
                                            <p>{{ $school->user->email }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="d-flex justify-content-between">
                                            <h6>Jenjang Pendidikan :</h6>
                                            <p class="text-uppercase">{{ $school->level }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Akreditasi :</h6>
                                            <p>{{ $school->accreditation }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Deskripsi :</h6>
                                            <p>{{ $school->description != null ? $school->description : '-' }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Alamat:</h6>
                                            <div class="ms-5">
                                                <p class="text-end">{{ $school->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-3">
                            <h4>Jumlah Guru</h4>
                            <div class="ms-auto">
                                <div class="bg-primary text-light d-inline-block p-1 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                        viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light-primary text-primary d-inline-block px-3 py-1 fs-8 rounded">
                            {{ $teachers->count() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-3">
                            <h4>Jumlah Kelas</h4>
                            <div class="ms-auto">
                                <div class="bg-warning text-light d-inline-block p-1 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                        viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light-warning text-warning d-inline-block px-3 py-1 fs-8 rounded">
                            {{ $classrooms }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-3">
                            <h4>Jumlah Extracurricular</h4>
                            <div class="ms-auto">
                                <div class="bg-success text-light d-inline-block p-1 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                        viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light-success text-success d-inline-block px-3 py-1 fs-8 rounded">
                            0
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-3">
                            <h4>Jumlah Siswa</h4>
                            <div class="ms-auto">
                                <div class="bg-danger text-light d-inline-block p-1 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                        viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light-danger text-danger d-inline-block px-3 py-1 fs-8 rounded">
                            {{ $school->students->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">Statistik RFID</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="rfid-container d-flex flex-wrap justify-content-center justify-content-md-between mx-md-5">
                            <div class="rfid-item mb-3 text-center">
                                <div class="bg-light-primary text-primary d-inline-block px-4 py-4 fs-8 rounded fixed-size-div">
                                    <b>{{ $rfids->count() }}</b>
                                </div>
                                <h5>Jumlah RFID</h5>
                            </div>
                            <div class="rfid-item mb-3 text-center">
                                <div class="bg-light-success text-success d-inline-block px-4 py-4 fs-8 rounded fixed-size-div">
                                    <b>{{ $activeRfids->count() }}</b>
                                </div>
                                <h5>RFID Aktif</h5>
                            </div>
                            <div class="rfid-item mb-3 text-center">
                                <div class="bg-light-danger text-danger d-inline-block px-4 py-4 fs-8 rounded fixed-size-div">
                                    <b>{{ $nonactiveRfids->count() }}</b>
                                </div>
                                <h5>RFID Tidak Aktif</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
        <script>
            var options = {
                series: [44, 55, 41],
                chart: {
                    type: 'donut',
                    width: '100%',
                    height: '100%',
                    toolbar: {
                        show: false
                    }
                },
                legend: {
                    position: 'right',
                    offsetY: 0,
                    offsetX: -50
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart-rfid"), options);
            chart.render();
        </script>
@endsection
