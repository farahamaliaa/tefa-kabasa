@extends('school.layouts.app')
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
    <div class="row">
        <!-- Card 1: Pengajar -->
        <div class="col-lg-6 d-flex">
            <div class="card position-relative overflow-hidden flex-fill">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <h4 class="mb-3">Pengajar</h4>
                        <div class="col-auto">
                            <img src="{{ $extracurricular->employee->image ? asset('storage/' . $extracurricular->employee->image) : asset('assets/images/default-user.jpeg') }}"
                                alt="Profile Image" class="img-fluid rounded-circle" style="width: 84px; height: 84px;">
                        </div>
                        <div class="col">
                            <h4 class="fw-semibold mb-2">{{ $extracurricular->employee->user->name }}</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent p-0 m-0">
                                    <li class="breadcrumb-item" aria-current="page">Tahun Ajaran
                                        {{ $schoolYear->school_year }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Ekstrakulikuler -->
        <div class="col-lg-6 d-flex">
            <div class="card position-relative overflow-hidden flex-fill">
                <div class="card-body px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h4 class="mb-3">Ekstrakurikuler</h4>
                            <h4 class="fw-semibold mb-2">{{ $extracurricular->name }}</h4>
                            <div class="mt-3">
                                <span
                                    class="mb-1 badge font-medium bg-light-secondary text-secondary">{{ $extracurricular->extracurricularStudents->count() }}
                                    Total
                                    Siswa</span>
                                <span class="mb-1 badge font-medium bg-light-success text-success">0 Pertemuan</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24">
                                <path fill="#5d87ff"
                                    d="M4.929 19.071a9.953 9.953 0 0 0 6.692 2.906c-.463-2.773.365-5.721 2.5-7.856c2.136-2.135 5.083-2.963 7.856-2.5c-.092-2.433-1.053-4.839-2.906-6.692s-4.26-2.814-6.692-2.906c.463 2.773-.365 5.721-2.5 7.856c-2.136 2.135-5.083 2.963-7.856 2.5a9.944 9.944 0 0 0 2.906 6.692" />
                                <path fill="#5d87ff"
                                    d="M15.535 15.535a6.996 6.996 0 0 0-1.911 6.318a9.929 9.929 0 0 0 8.229-8.229a6.999 6.999 0 0 0-6.318 1.911m-7.07-7.07a6.996 6.996 0 0 0 1.911-6.318a9.929 9.929 0 0 0-8.23 8.229a7 7 0 0 0 6.319-1.911" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row me-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h5 class="ms-3 fw-semibold mb-0" style="font-size: 18px" >Daftar Siswa Mengikuti Ekstrakurikuler</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-9 mb-2">
            <div class="col-12 col-lg-3">
                <form class="position-relative">
                    <input type="text" name="name" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari..." value="{{ old('name', request()->name) }}">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-3 d-flex justify-content-end gap-2 mb-2">
            <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#modal-import">
                Import Siswa
            </button>
            <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#modal-create-student">
                Tambah Siswa
            </button>
        </div>
    </div>

    <div class="table-responsive rounded-2 mb-4 pt-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Kelas</th>
                    <th class="fs-4 fw-semibold mb-0">Total Hadir</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($extracurricularStudents as $extracurricularStudent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $extracurricularStudent->student->user->name }}
                        </td>
                        <td>
                            {{ $extracurricularStudent->student->classroomStudents->isNotEmpty() ? $extracurricularStudent->student->classroomStudents->first()->classroom->name : '-' }}
                        </td>
                        <td>
                            -
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
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a type="button" class="dropdown-item d-flex align-items-center gap-3 btn-detail"
                                            data-image="{{ $extracurricularStudent->student->image ? asset('storage/' . $extracurricularStudent->student->image) : asset('assets/images/default-user.jpeg') }}"
                                            data-name="{{ $extracurricularStudent->student->user->name }}"
                                            data-email="{{ $extracurricularStudent->student->user->email }}"
                                            data-nisn="{{ $extracurricularStudent->student->nisn }}"
                                            data-classroom="{{ $extracurricularStudent->student->classroomStudents->isNotEmpty() ? $extracurricularStudent->student->classroomStudents->first()->classroom->name : '-' }}"
                                            data-gender="{{ $extracurricularStudent->student->gender->label() }}"
                                            data-religion="{{ $extracurricularStudent->student->religion->name }}"
                                            data-birthdate="{{ $extracurricularStudent->student->birth_date }}"
                                            data-birthplace="{{ $extracurricularStudent->student->birth_place }}"
                                            data-number_kk="{{ $extracurricularStudent->student->number_kk }}"
                                            data-nik="{{ $extracurricularStudent->student->nik }}"
                                            data-order_child="{{ $extracurricularStudent->student->order_child }}"
                                            data-number_akta="{{ $extracurricularStudent->student->number_akta }}"
                                            data-count_sibling="{{ $extracurricularStudent->student->count_siblings }}"
                                            data-address="{{ $extracurricularStudent->student->address }}">
                                            <i class="fs-4 ti ti-eye"></i>Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn-delete-student dropdown-item d-flex align-items-center text-danger gap-3"
                                            data-id="{{ $extracurricularStudent->id }}"><i
                                                class="fs-4 ti ti-trash"></i>Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="7" class="text-center align-middle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                width="300px">
                            <p class="fs-5 text-dark text-center mt-2">
                                Belum ada data
                            </p>
                        </div>
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$extracurricularStudents" />
    </div>

    {{-- modal --}}
    @include('school.pages.extracurricular.widgets.modal-import')
    @include('school.pages.extracurricular.widgets.modal-create-student')
    @include('school.pages.extracurricular.widgets.detail-student')
    <x-delete-modal-component />
@endsection
@section('script')
    @include('school.pages.extracurricular.scripts.detail')
    @include('school.pages.extracurricular.scripts.select2')
    @include('school.pages.extracurricular.scripts.script-validation')
@endsection
