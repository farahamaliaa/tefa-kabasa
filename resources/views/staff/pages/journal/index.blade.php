@extends('staff.layouts.app')
@section('content')
    <div class="card bg-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Jurnal dan Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">{{ auth_user()->name }}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div>
            <span class="badge bg-warning fs-5 px-4 text-white mt-3 fw-semibold me-4 mb-4"
                style="border-radius:0px 5px 5px 0px;">Informasi</span>
        </div>
        <ul class="ms-5 pb-2" style="list-style-type:disc;">
            <li>Jurnal wajib di isi oleh semua guru & staff untuk direkap sekolah</li>
            <li>Ketika tidak mengisi jurnal, maka pihak sekolah akan menganggap bahwa staff tersebut tidak masuk pada hari
                itu</li>
            <li>Batas jam pengisian jurnal adalah 23.59 WIB</li>
        </ul>
        <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
            <img src="{{ asset('assets/images/background/bubble-warning.png') }}" alt="Description" class="img-fluid"
                style="max-width: 150px; height: auto;">
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
        <div class="d-flex align-items-center mb-3 mb-md-0">
            <span class="badge bg-primary p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                </svg>
            </span>
            <h4 class="ms-3 mb-0"><b>Pengisian Jurnal</b></h4>
        </div>
        <div class="d-flex align-items-center">
            <p class="mb-0 me-2">Tanggal saat ini:</p>
            <span class="badge bg-light-primary text-primary fw-semibold d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary me-1" width="18" height="18"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                </svg>
                <?php echo date('d F Y'); ?>
            </span>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card border">
            <div class="card-body">
                <h4 class="mb-4">Jurnal Harian</h4>
                <form action="{{ route('employee.journal.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="form-group mb-3">
                        <h5>Judul</h5>
                        <input type="text" class="form-control" name="title" id="placeholder"
                            placeholder="Masukkan judul">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <h5>Deskripsi</h5>
                        <p>Isi laporan sesuai dengan kegiatan dan aktivitas yang berlaku pada jam pelajaran tersebut.</p>
                        <textarea class="form-control" name="description" rows="4" placeholder="Masukkan deskripsi..."></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end ">
                        <button class="btn mb-1 waves-effect waves-light btn-success px-4" type="submit">Tambah
                            Jurnal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row me-3 mb-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h4 class="ms-3 mb-0"><b>Riwayat Jurnal</b></h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @forelse ($employeeJournals as $employeeJournal)
                        <div class="col-md-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                                    <h4 class="mb-0 text-white card-title">
                                        {{ $employeeJournal->title }}
                                    </h4>
                                    <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                                        <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}"
                                            alt="Description" class="img-fluid"
                                            style="max-width: 210px; height: auto; position: relative;">
                                        <span class="d-flex align-items-center ms-5 fs-2"
                                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%;">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                                            </svg>
                                            {{ $employeeJournal->created_at->locale('id')->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="pe-3">
                                                <h5 class="card-title">Deskripsi:</h5>
                                                <p>{{ \Illuminate\Support\Str::limit($employeeJournal->description, 200, '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="{{ route('employee.journal.detail', ['employeeJournal' => $employeeJournal->id]) }}"
                                            class="btn btn-primary">
                                            Lihat Detail Jurnal
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                class="mb-1" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                width="300px">
                            <p class="fs-5 text-dark text-center mt-2">Belum ada jurnal</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
