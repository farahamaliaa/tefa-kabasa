@extends('staff.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Perbaikan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Daftar siswa perbaikan untuk mengurangi point pelanggaran</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/welcome.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-4 mb-3 me-3">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <select id="status-activity" class="form-select">
                    <option value="">Laki-Laki</option>
                    <option value="">Perempuan</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3 ms-3">
                <select id="status-activity" class="form-select">
                    <option value="">Point Tertinggi</option>
                    <option value="">Point Terendah</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>Nama</th>
                    <th>Durasi Pengerjaan</th>
                    <th>Perbaikan</th>
                    <th>Status</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                height="40" alt="" />
                            <div class="ms-3">
                                <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                <span class="fw-normal">X RPL 1</span>
                            </div>
                        </div>
                    </td>
                    <td>10 Mei 2024 - 20 Mei 2024</td>
                    <td>Menyapu halaman sekolah</td>
                    <td>
                        <span class="mb-1 badge font-medium bg-light-success text-success">Selesai Dikerjakan</span>
                    </td>
                    <td>
                        <span class="mb-1 badge font-medium bg-light-primary text-primary">-80 Point</span>
                    </td>
                    <td>
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-primary w-100" data-bs-toggle="modal" data-bs-target="#detail-repair">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @include('staff.pages.repair.widgets.detail')
@endsection
