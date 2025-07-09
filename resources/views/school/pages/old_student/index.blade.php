@extends('school.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">

    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div class="col-12 col-md-6 col-lg-2 me-3">
            <form class="position-relative">
                <input type="text" name="name" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('name', request('name')) }}">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <button type="button" class="btn mb-1 btn-primary" data-bs-toggle="modal" data-bs-target="#modal-import">
            Tambah Siswa
        </button>
    </div>

    <!-- tambah modal -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school-student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mx-3" style="max-height: 70vh; overflow-y: auto;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div id="imagePreview" class="mt-2 col-4 mb-2"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="formFile" class="mb-1">Foto Siswa <span class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                        <input class="form-control" name="image" type="file" id="formFile"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="name" class="mb-2">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="email" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">NISN <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="nisn" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2 ">Agama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <select id="religion" name="religion_id" class="form-select">
                                            <option selected>Pilih...</option>
                                            @forelse ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @empty
                                                <option disabled>Tidak ditemukan</option>
                                            @endforelse
                                        </select>
                                        @error('religion_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Jenis kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <select id="gender" name="gender" class="form-select">
                                            <option selected>Pilih...</option>
                                            <option value="male">Laki-Laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_place" class="mb-2">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="birth_place" class="form-control" placeholder="Masukkan tempat lahir" value="{{ old('birth_place') }}">
                                        @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_date" class="mb-2">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                                        @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="nik" class="mb-2">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="nik" class="form-control" placeholder="Masukkan nik" value="{{ old('nik') }}">
                                        @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_kk" class="mb-2">Nomor KK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="number_kk" class="form-control" placeholder="Masukkan nomer kk" value="{{ old('number_kk') }}">
                                        @error('number_kk')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_akta" class="mb-2">Nomor Akta <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="number_akta" class="form-control" placeholder="Masukkan nomer akta" value="{{ old('number_akta') }}">
                                        @error('number_akta')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="order_child" class="mb-2">Anak Ke- <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="order_child" class="form-control" placeholder="Anak ke-" value="{{ old('order_child') }}">
                                        @error('order_child')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="count_siblings" class="mb-2">Jumlah Saudara <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="count_siblings" class="form-control" placeholder="Jumlah saudara" value="{{ old('count_siblings') }}">
                                        @error('count_siblings')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label for="address" class="mb-2">Alamat <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <textarea placeholder="Masukkan alamat" name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                    @error('address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">RFID</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40" height="40" alt="{{ $student->user->name }}" />
                                <div class="ms-3">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->user->name }}</h6>
                                    <span class="fw-normal">{{ count($student->classroomStudents) > 0 ? $student->classroomStudents[0]->classroom->name : 'Kelas tidak ada' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $student->gender == 'female' ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $student->nisn }}</td>
                        {{-- <td>{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : '' }}
                            <button type="submit" class="btn btn-rounded btn-light-warning text-warning ms-2 btn-rfid"
                                data-id="{{ $student->id }}" data-role="student"
                                data-name="{{ $student->user->name }}"
                                data-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : '-' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                </svg>
                            </button>
                        </td> --}}
                        <td>
                            {{ $student->modelHasRfid ? $student->modelHasRfid->rfid : '' }}
                            <button type="submit"
                                class="btn btn-rounded {{ $student->modelHasRfid ? 'btn-light-warning text-warning' : 'btn-light-primary text-primary' }} ms-2 btn-rfid"
                                data-id="{{ $student->id }}"
                                data-role="student"
                                data-name="{{ $student->user->name }}"
                                data-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : '-' }}">

                                @if($student->modelHasRfid)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                    </svg>
                                @else
                                    Tambah RFID
                                @endif
                            </button>
                        </td>
                        <td>
                            <div class="category-selector btn-group position-relative">
                                <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right category-menu position-absolute"
                                    style="z-index: 1050;">
                                    <button
                                        class="btn-detail note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $student->id }}" data-name="{{ $student->user->name }}"
                                        data-email="{{ $student->user->email }}" data-nisn="{{ $student->nisn }}"
                                        data-religion_id="{{ $student->religion_id }}"
                                        data-gender="{{ $student->gender }}"
                                        data-birth_place="{{ $student->birth_place }}"
                                        data-birth_date="{{ $student->birth_date }}" data-nik="{{ $student->nik }}"
                                        data-number_kk="{{ $student->number_kk }}"
                                        data-number_akta="{{ $student->number_akta }}"
                                        data-order_child="{{ $student->order_child }}"
                                        data-count_siblings="{{ $student->count_siblings }}"
                                        data-address="{{ $student->address }}"
                                        data-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Tidak ada' }}"
                                        data-image="{{ $student->image ? asset('storage/' . $student->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}">
                                        <i class="fs-4 ti ti-eye"></i>Detail
                                    </button>
                                    <button
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3 btn-edit"
                                        data-id="{{ $student->id }}" data-name="{{ $student->user->name }}"
                                        data-email="{{ $student->user->email }}" data-nisn="{{ $student->nisn }}"
                                        data-religion_id="{{ $student->religion_id }}"
                                        data-gender="{{ $student->gender }}"
                                        data-birth_place="{{ $student->birth_place }}"
                                        data-birth_date="{{ $student->birth_date }}" data-nik="{{ $student->nik }}"
                                        data-number_kk="{{ $student->number_kk }}"
                                        data-number_akta="{{ $student->number_akta }}"
                                        data-order_child="{{ $student->order_child }}"
                                        data-count_siblings="{{ $student->count_siblings }}"
                                        data-address="{{ $student->address }}"><i class="fs-4 ti ti-edit"></i>Edit
                                    </button>

                                    <button
                                        class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3 btn-delete"
                                        data-id="{{ $student->id }}"><i class="fs-4 ti ti-trash"></i>Hapus
                                    </button>
                                </div>
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
    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$students" />
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div id="studentImagePreview" class="mt-2 col-4 mb-2"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="formFile" class="mb-2">Foto Siswa <span
                                                class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                        <input class="form-control mb-3" name="image" type="file"
                                            id="studentImageInput" onchange="previewStudentImage(event)">
                                        @error('image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="name-edit" class="mb-2">Nama<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name-edit" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="email-edit" class="mb-2">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email-edit" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="nisn-edit" class="mb-2">NISN<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nisn" id="nisn-edit" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="religion-edit" class="mb-2">Agama<span
                                                class="text-danger">*</span></label>
                                        <select id="religion-edit" name="religion_id" class="form-select">
                                            @forelse ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @empty
                                                <option disabled>Tidak ditemukan</option>
                                            @endforelse
                                        </select>
                                        @error('religion_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="gender-edit" class="mb-2">Jenis kelamin<span
                                                class="text-danger">*</span></label>
                                        <select id="gender-edit" name="gender" class="form-select">
                                            <option value="male">Laki-Laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_place-edit" class="mb-2">Tempat Lahir<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="birth_place" id="birth_place-edit" placeholder="Masukkan tempat lahir"
                                            class="form-control" value="{{ old('birth_place') }}">
                                        @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_date-edit" class="mb-2">Tanggal Lahir<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date-edit"
                                            class="form-control" value="{{ old('birth_date') }}">
                                        @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="nik-edit" class="mb-2">NIK<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="nik" id="nik-edit" class="form-control" placeholder="Masukkan nik"
                                            value="{{ old('nik') }}">
                                        @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_kk-edit" class="mb-2">Nomor KK<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="number_kk" id="number_kk-edit" class="form-control" placeholder="Masukkan nomer kk"
                                            value="{{ old('number_kk') }}">
                                        @error('number_kk')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_akta-edit" class="mb-2">Nomor Akta<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="number_akta" id="number_akta-edit" placeholder="Masukkan nomer akta"
                                            class="form-control" value="{{ old('number_akta') }}">
                                        @error('number_akta')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="order_child-edit" class="mb-2">Anak Ke-<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="order_child" id="order_child-edit" placeholder="Anak ke-"
                                            class="form-control" value="{{ old('order_child') }}">
                                        @error('order_child')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="count_siblings-edit" class="mb-2">Jumlah Saudara<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="count_siblings" id="count_siblings-edit" placeholder="Masukkan jumlah saudara"
                                            class="form-control" value="{{ old('count_siblings') }}">
                                        @error('count_siblings')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label for="address-edit" class="mb-2">Alamat<span
                                            class="text-danger">*</span></label>
                                    <textarea name="address" id="address-edit" class="form-control" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                                    @error('address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- tambah rfid -->
    <div class="modal fade" id="modal-rfid" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah RFID</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-rfid" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="old_rfid" id="old_rfid_input">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group d-flex">
                                <h6 for="" class="mb-2">Nama : </h6>
                                <p class="ms-3" id="name"></p>
                            </div>
                            <div class="form-group">
                                <h6 for="" class="mb-2">RFID : <span id="rfid"></span></h6>
                                <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                                <input type="text" id="rfid-input" name="rfid" class="form-control"
                                    placeholder="Masukkan RFID">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal detail -->
    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <img id="image-detail" src="" class="rounded-circle user-profile mb-3"
                                style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <div class="d-flex " style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Nama:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="name-detail"></p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Email:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="email-detail"></p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                                <p class="ms-2" style="margin-bottom: 0;">Laki - laki</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">NIK:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="nik-detail"></p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">RFID:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="rfid-detail"></p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex text-start">
                                <h6 style="margin-bottom: 0;">Alamat:</h6>
                                <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="address-detail"></p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.btn-rfid').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var rfid = $(this).data('rfid');
            var role = $(this).data('role');
            $('#name').text(name);
            $('#rfid').text(rfid);
            $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);
            $('#modal-rfid').modal('show');
            $('#modal-rfid #old_rfid_input').val(rfid);
        });

        $('.btn-detail').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var nisn = $(this).data('nisn');
            var religion_id = $(this).data('religion_id');
            var gender = $(this).data('gender');
            var birth_place = $(this).data('birth_place');
            var birth_date = $(this).data('birth_date');
            var nik = $(this).data('nik');
            var number_kk = $(this).data('number_kk');
            var number_akta = $(this).data('number_akta');
            var order_child = $(this).data('order_child');
            var address = $(this).data('address');
            var rfid = $(this).data('rfid');
            var image = $(this).data('image');
            $('#name-detail').text(name);
            $('#email-detail').text(email);
            $('#nisn-detail').text(nisn);
            $('#birth_place-detail').text(birth_place);
            $('#birth_date-detail').text(birth_date);
            $('#nik-detail').text(nik);
            $('#number_kk-detail').text(number_kk);
            $('#number_akta-detail').text(number_akta);
            $('#order_child-detail').text(order_child);
            $('#address-detail').text(address);
            $('#gender-detail').text(gender);
            $('#rfid-detail').text(rfid);
            $('#image-detail').attr('src', image);
            $('#modal-detail').modal('show');
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/student/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.category-dropdown').on('show.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'visible');
            });

            $('.category-dropdown').on('hide.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'auto');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#modal-rfid').on('shown.bs.modal', function() {
                $('#rfid-input').focus().select();
            });
        });
    </script>

    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%;">`;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('imagePreview').innerHTML = '';
            }
        }

        function previewStudentImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.getElementById('studentImagePreview');
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%; height: auto;">`;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('studentImagePreview').innerHTML = '';
            }
        }
    </script>
@endsection
