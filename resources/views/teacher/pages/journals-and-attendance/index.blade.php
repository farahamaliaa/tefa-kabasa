@extends('teacher.layouts.app')

@section('content')
<div class="card bg-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold text-white mb-8">Jurnal dan Absensi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Suyadi Oke</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div>
        <span class="badge bg-warning fs-5 px-4 text-white mt-3 fw-semibold me-4 mb-4" style="border-radius:0px 5px 5px 0px;">Informasi</span>
    </div>
    <ul class="ms-5 pb-2" style="list-style-type:disc;">
        <li>Jurnal wajib diisi oleh guru, untuk direkap sekolah</li>
        <li>Ketika guru tidak mengisi jurnal maka pihak sekolah akan menganggap bahwa guru tersebut tidak masuk/mengajar pada jam mapel tersebut</li>
        <li>Batas jam pengisian jurnal adalah 00.00</li>
    </ul>
    <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
        <img src="{{ asset('assets/images/background/bubble-warning.png') }}" alt="Description" class="img-fluid" style="max-width: 150px; height: auto;">
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <div class="d-flex align-items-center">
            <span class="mb-1 badge bg-primary p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21"></path>
                </svg>
            </span>
            <h5 class="ms-2 fw-semibold">Pengisian Jurnal</h5>
        </div>
    </div>
    <div class="d-flex">
        <p>Tanggal saat ini: </p>
        <div>
            <span class="badge bg-light-primary text-primary ms-2 fw-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary me-1" width="18" height="18" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" /></svg>
                20 Mei 2024
            </span>
        </div>
    </div>
</div>

<div class="card card-body">
    <h4>Jadwal mengajar hari ini</h4>

    <div class="table-responsive rounded-2 mb-4 mt-3">
        <table class="table text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark">
                <tr>
                    <th class="text-white rounded-start" style="background-color: #5D87FF;">Mapel</th>
                    <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
                    <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                    <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                    <th class="text-white" style="background-color: #5D87FF;">Status</th>
                    <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,8) as $lessonSchedule)
                <tr>
                    <td>Bahasa Indonesia</td>
                    <td>X RPL 1</td>
                    <td>Jam ke 1-3</td>
                    <td>10 Mei 2024</td>
                    <td><span class="badge bg-light-danger text-danger">Belum mengisi</span></td>
                    <td><button class="btn btn-primary">Isi Jurnal</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center align-middle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                            <p class="fs-5 text-dark text-center mt-2">
                                Belum ada data
                            </p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="row me-3 mb-3">
    <div class="col-lg-6 col-md-12 mb-3">
        <div class="d-flex align-items-center">
            <span class="mb-1 badge bg-primary p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                </svg>
            </span>
            <h4 class="ms-3 mb-0">Riwayat Jurnal</h4>
        </div>
    </div>
</div>

<div class="row">
    @foreach (range(1,5) as $journal)
    <div class="col-md-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                <h4 class="mb-0 text-white card-title">
                    X RPL - Bahasa Indonesia
                </h4>
                <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                    <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}" alt="Description" class="img-fluid" style="max-width: 210px; height: auto; position: relative;">
                    <span class="d-flex align-items-center ms-5 fs-4" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                        </svg>
                        20 Mei 2024
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="row pb-2" style="border-bottom: 1px solid #c0c0c0">
                    <div class="col-lg-8" style="border-right: 1px solid #c0c0c0;">
                        <div class="pe-3">
                            <h5 class="card-title mb-4">Deskripsi:</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, enim sequi. Minima assumenda tenetur aspernatur dolor quae laboriosam nesciunt reprehenderit!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ps-3">
                            <h5 class="card-title mb-4 ms-5 ps-3">Rekap Absensi:</h5>
                            <div class="row px-5">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <span class="badge bg-light-primary text-primary fs-7 fw-semibold mb-1 py-2">10</span>
                                        <p>Izin</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <span class="badge bg-light-warning text-warning fs-7 fw-semibold mb-1 py-2">10</span>
                                        <p>Sakit</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <span class="badge bg-light-danger text-danger fs-7 fw-semibold mb-1 py-2">10</span>
                                        <p>Alfa</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <button class="btn btn-primary mt-3">
                        Lihat Detail Jurnal
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1" viewBox="0 0 24 24"><path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76"/></svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
