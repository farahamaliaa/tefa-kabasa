@extends('staff.layouts.app')
@section('style')
    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }

        .select2 {
            width: 100% !important;
        }

        .select2-selection__rendered {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>
@endsection
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Izin dan Sakit Siswa</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-white text-decoration-none" href="javascript:void(0)">
                                    Kelola perizinan siswa terkait kehadiran, baik karena izin maupun sakit. Pastikan data
                                    yang diinput sesuai kebutuhan.
                                </a>
                            </li>
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

    <div class="col-lg-12 mb-3">
        <div class="d-flex justify-content-between align-items-start">
            <form class="d-flex flex-column flex-md-row gap-2 flex-grow-5">
                <div class="position-relative flex-grow-1">
                    <input type="text" name="search" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari..." value="{{ old('search', request('search')) }}">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <div class="d-flex flex-column flex-md-row gap-2">
                    <select name="classroom" class="form-select">
                        <option value="">Semua Kelas</option>
                        <option value="">kelas</option>
                    </select>
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="sick">Sakit</option>
                        <option value="permit">Izin</option>
                    </select>
                    <div>
                        <button type="submit" class="btn btn-primary btn-md w-100 w-md-auto">Filter</button>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-end ms-auto">
                <button class="btn btn-success btn-md w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#modal-create"
                    type="button">Tambah</button>
            </div>
        </div>
    </div>




    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Izin Pada Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->model->student->nisn }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/default-user.jpeg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-3">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $items->model->student->user->name }}</h6>
                                    <span class="fw-normal">{{ $items->model->student->gender->label() }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $items->model->classroom->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($items->created_at)->translatedFormat('d F Y') }}</td>
                        <td>
                            <span class="mb-1 badge font-medium {{ $items->status->value == 'permit' ? 'bg-light-warning text-warning' : 'bg-light-danger text-danger'}}">{{ $items->status->value == 'permit' ? 'Izin' : 'Sakit'}}</span>
                        </td>
                        <td>
                            <div class="dropdown dropstart">
                                <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                    {{-- <li>
                                        <button class="btn-detail dropdown-item d-flex align-items-center gap-3"><i
                                                class="fs-4 ti ti-eye"></i>Detail</button>
                                    </li> --}}
                                    <li>
                                        <button data-id="{{ $items->id }}" class="btn-delete dropdown-item d-flex align-items-center text-danger gap-3"><i
                                                class="fs-4 ti ti-trash"></i>Hapus</button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Siswa belum ditambahkan
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('components.delete-modal-component')
    @include('staff.pages.permission.widgets.detail')
    @include('staff.pages.permission.widgets.create')
@endsection

@section('script')
    @include('staff.pages.permission.scripts.delete')
    @include('staff.pages.permission.scripts.detail')
    @include('staff.pages.permission.scripts.select2')
@endsection
