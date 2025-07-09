@extends('school.layouts.app')

@section('style')
<style>
    .category-selector .dropdown-menu {
        position: absolute;
        z-index: 1050;
        transform: translate3d(0, 0, 0);
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex gap-3">
                <form class="d-flex gap-2">
                    <div class="position-relative">
                        <div class="">
                            <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari" value="{{ old('search', request('search')) }}">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </div>
                </form>
                <div class="d-flex gap-2">
                    <form class="d-flex gap-1">
                        <select name="status" class="form-select" id="search-status">
                            <option value="0">Aktif</option>
                            <option value="1">Tidak Aktif</option>
                        </select>
                        <select name="filter" class="form-select" id="search-status">
                            <option value="">Tampilkan semua</option>
                            <option value="terbaru">Terbaru</option>
                            <option value="terlama">Terlama</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>

            </div>
            <button type="button" class="btn mb-1 btn-primary btn-lg px-4 fs-4 font-medium text-end" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Guru
            </button>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="guru" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guru">Tambah Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="{{ route('teacher.store') }}" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3 ">
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Foto Guru (opsional)</label>
                                        <img id="imagePreview" src="#" alt="Preview" style="max-width: 200px; display: none; height: auto;">
                                        <input type="file" name="image" id="image" class="form-control mt-2 mb-3" onchange="previewImage(event)">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="name" placeholder="Masukkan nama" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="number" name="nip" placeholder="Masukkan nip" class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="religion_id" id="" class="form-select">
                                                <option>Pilih agama..</option>
                                                @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('religion_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="date" name="birth_date" class="form-control mb-3" value="{{ old('birth_date') }}">
                                            @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan tempat lahir" class="form-control" name="birth_place" value="{{ old('birth_place') }}">
                                            @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationA" name="gender" value="male">
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationB" name="gender" value="female">
                                                <label class="custom-control-label" for="customControlValidationB">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan nik" name="nik" class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan no telp" name="phone_number" class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan email" name="email" class="form-control mb-3" value="{{ old('email') }}">
                                            @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="active" id="" class="form-select mb-3">
                                                <option value="1">Aktif</option>
                                                <option value="0">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span></h6>
                                            <textarea name="address" class="form-control mb-3" placeholder="Masukkan alamat" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Import Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div>
                        <h5 class="text-warning">Informasi</h5>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="question" class="form-label">Pertanyaan:</label>

                    @error('question')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Status</th>
                <th>NIP</th>
                <th>RFID</th>
                <th>Jumlah Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40">
                        <div class="ms-3">
                          <h6 class="fs-4 fw-semibold mb-0">{{ $teacher->user->name }}</h6>
                          <span class="fw-normal">{{ $teacher->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</span>
                        </div>
                      </div>
                </td>
                <td>
                    <span class="badge {{ $teacher->active == '1' ? 'bg-light-primary text-primary' : 'bg-light-danger text-danger' }}">{{ $teacher->active == '1' ? 'Aktif' : 'Tidak Aktif' }}</span>
                </td>
                <td>{{ $teacher->nip }}</td>
                <td>{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : '' }}

                    <button type="submit" class="btn btn-rounded btn-light-warning text-warning ms-2 btn-rfid" data-id="{{ $teacher->id }}" data-name="{{ $teacher->user->name }}" data-rfid="{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : '' }}" data-role="teacher">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                        </svg>
                    </button>

                </td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">
                        {{ $teacher->teacherMaples ? $teacher->teacherMaples->count() : '0' }}
                        Pelajaran</span>
                </td>
                <td>
                    <div class="category-selector btn-group">
                        <button class=" nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                            <div class="category">
                                <div class="category-business"></div>
                                <div class="category-social"></div>
                                <span class="more-options text-dark">
                                    <i class="ti ti-dots-vertical fs-5"></i>
                                </span>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right category-menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 23.2px, 0px);" data-popper-placement="bottom-end">
                            <button class="btn-detail note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3" data-id="{{ $teacher->id }}" data-name="{{ $teacher->user->name }}" data-email="{{ $teacher->user->email }}" data-gender="{{ $teacher->gender }}" data-status="{{ $teacher->active }}" data-nip="{{ $teacher->nip }}" data-nik="{{ $teacher->nik }}" data-birth_date="{{ $teacher->birth_date }}" data-birth_place="{{ $teacher->birth_place }}" data-phone="{{ $teacher->phone_number }}" data-address="{{ $teacher->address }}" data-religion="{{ $teacher->religion_id }}" data-rfid="{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : 'Tidak ada' }}" data-maple="{{ $teacher->teacherMaples ? $teacher->teacherMaples->count() : '0' }}" data-image="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}">
                                <i class="fs-4 ti ti-eye"></i>Detail
                            </button>
                            <button type="button" class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3" data-id="{{ $teacher->id }}" data-name="{{ $teacher->user->name }}" data-email="{{ $teacher->user->email }}" data-gender="{{ $teacher->gender }}" data-status="{{ $teacher->active }}" data-nip="{{ $teacher->nip }}" data-nik="{{ $teacher->nik }}" data-birth_date="{{ $teacher->birth_date }}" data-birth_place="{{ $teacher->birth_place }}" data-phone="{{ $teacher->phone_number }}" data-address="{{ $teacher->address }}" data-religion="{{ $teacher->religion_id }}">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </button>
                            <button type="button" class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3" data-id="{{ $teacher->id }}">
                                <i class="fs-4 ti ti-trash"></i>Hapus
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mb-0">
    <x-paginate-component :paginator="$teachers" />
</div>

<x-delete-modal-component />

<!-- modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="editPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPegawaiLabel">Edit Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="">
                    <div class="wizard-content">
                        <form id="form-edit" class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3">
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Foto Guru (opsional)</label>
                                        <img id="employeeImagePreview" src="#" alt="Preview" style="max-width: 200px; display: none; height: auto;">
                                        <input type="file" name="image" id="employeeImage" class="form-control mt-2 mb-3" onchange="previewEmployeeImage(event)">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="name" placeholder="Masukkan nama" id="name-edit" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="number" name="nip" placeholder="Masukkan nip" id="nip-edit" class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="religion_id" id="religion-edit" class="form-select">
                                                <option>Pilih agama..</option>
                                                @foreach ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('religion_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="date" name="birth_date" id="birth_date-edit" class="form-control mb-3" value="{{ old('birth_date') }}">
                                            @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan tempat lahir" class="form-control" id="birth_place-edit" name="birth_place" value="{{ old('birth_place') }}">
                                            @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="maleEdit" name="gender" value="male">
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="femaleEdit" name="gender" value="female">
                                                <label class="custom-control-label" for="customControlValidationB">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="nik" placeholder="Masukkan nik" id="nik-edit" class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="phone_number" placeholder="Masukkan no telp" id="phone-edit" class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="email" placeholder="Masukkan email" id="email-edit" class="form-control mb-3" value="{{ old('email') }}">
                                            @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="active" id="status-edit" class="form-select mb-3">
                                                <option value="1">Aktif</option>
                                                <option value="0">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span></h6>
                                            <textarea name="address" placeholder="Masukkan alamat" id="address-edit" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Simpan</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button> --}}
            </div>
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
                            <p class="ms-3" id="name-detail-rfid"></p>
                        </div>
                        <div class="form-group">
                            <h6 for="" class="mb-2">RFID :</h6>
                            <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                            <input type="text" id="rfid" name="rfid" class="form-control" placeholder="Masukkan RFID">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
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
                <h5 class="modal-title" id="importPegawai">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img id="image-detail" src="" class="rounded-circle user-profile mb-3" style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Nama:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="name-detail">Suyadi Oke</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Email:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="email-detail">suyadi@gmail.com</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">No Telepon:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="phone-detail">089121289098</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="gender-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">NIP:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="nip-detail">123123123</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">RFID:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="rfid-detail">123123123</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Alamat:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="address-detail">jl.
                                sembarang,
                                desa. opowae, kec. kepanjen, kab. Malang</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Jumlah Mata Pelajaran:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="maple-detail">Mata
                                Pelajaran</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var gender = $(this).data('gender');
        var status = $(this).data('status');
        var nip = $(this).data('nip');
        var nik = $(this).data('nik');
        var birth_date = $(this).data('birth_date');
        var birth_place = $(this).data('birth_place');
        var phone = $(this).data('phone');
        var address = $(this).data('address');
        var religion = $(this).data('religion');
        $('#form-edit').attr('action', '{{ route('teacher.update', '') }}/' + id);
        $('#name-edit').val(name);
        $('#email-edit').val(email);
        $('#nip-edit').val(nip);
        $('#nik-edit').val(nik);
        $('#birth_date-edit').val(birth_date);
        $('#birth_place-edit').val(birth_place);
        $('#phone-edit').val(phone);
        $('#address-edit').val(address);
        gender == 'male' ? $('#maleEdit').prop('checked', true) : $('#femaleEdit').prop('checked', true);
        $('#religion-edit').val(religion).trigger('change');
        $('#status-edit').val(status).trigger('change');
        $('#modal-edit').modal('show');
    });

    $('.btn-detail').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var gender = $(this).data('gender');
        var genderTranslation = {
            'male': 'laki-laki'
            , 'female': 'perempuan'
        };
        var status = $(this).data('status');
        var nip = $(this).data('nip');
        var nik = $(this).data('nik');
        var birth_date = $(this).data('birth_date');
        var birth_place = $(this).data('birth_place');
        var phone = $(this).data('phone');
        var address = $(this).data('address');
        var religion = $(this).data('religion');
        var rfid = $(this).data('rfid');
        var maple = $(this).data('maple');
        var image = $(this).data('image');
        var genderTranslation = {
            'male': 'laki-laki'
            , 'female': 'perempuan'
        };

        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#nip-detail').text(nip);
        $('#nik-detail').text(nik);
        $('#birth_date-detail').text(birth_date);
        $('#birth_place-detail').text(birth_place);
        $('#phone-detail').text(phone);
        $('#address-detail').text(address);
        $('#gender-detail').text(genderTranslation[gender] || gender);
        $('#religion-detail').text(religion);
        $('#status-detail').text(status);
        $('#rfid-detail').text(rfid);
        $('#maple-detail').text(maple);
        $('#image-detail').attr('src', image);
        $('#modal-detail').modal('show');
    });

    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/delete-teacher/' + id);
        $('#modal-delete').modal('show');
    });

    $('.btn-rfid').on('click', function() {
        var id = $(this).data('id');
        var role = $(this).data('role');
        var oldRfid = $(this).data('rfid');
        var name = $(this).data('name');
        $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);
        $('#name-detail-rfid').text(name);
        $('#modal-rfid').modal('show');
        $('#modal-rfid #old_rfid_input').val(oldRfid);
    });

</script>

<script src="{{ asset('admin_assets/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/js/forms/form-wizard.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var currentSection = 0;
        var sections = $("form > section");
        var steps = $(".steps li");

        sections.hide();
        sections.eq(currentSection).show();

        $(".next-step ").click(function() {
            if (currentSection < sections.length - 1) {
                sections.eq(currentSection).hide();
                steps.eq(currentSection).removeClass("current").addClass("done");
                currentSection++;
                sections.eq(currentSection).show();
                steps.eq(currentSection).removeClass("disabled").addClass("current");
            }
        });

        $(".prev-step").click(function() {
            if (currentSection > 0) {
                sections.eq(currentSection).hide();
                steps.eq(currentSection).removeClass("current").addClass("disabled");
                currentSection--;
                sections.eq(currentSection).show();
                steps.eq(currentSection).removeClass("done").addClass("current");
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        var currentEditSection = 0;
        var editSections = $("#form-edit > section");
        var editSteps = $("#editSteps li");

        editSections.hide();
        editSections.eq(currentEditSection).show();

        $(".next-edit-step").click(function() {
            if (currentEditSection < editSections.length - 1) {
                editSections.eq(currentEditSection).hide();
                editSteps.eq(currentEditSection).removeClass("current").addClass("done");
                currentEditSection++;
                editSections.eq(currentEditSection).show();
                editSteps.eq(currentEditSection).removeClass("disabled").addClass("current");
            }
        });

        $(".prev-edit-step").click(function() {
            if (currentEditSection > 0) {
                editSections.eq(currentEditSection).hide();
                editSteps.eq(currentEditSection).removeClass("current").addClass("disabled");
                currentEditSection--;
                editSections.eq(currentEditSection).show();
                editSteps.eq(currentEditSection).removeClass("done").addClass("current");
            }
        });
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
            $('#rfid').focus().select();
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
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewEmployeeImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('employeeImagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection
