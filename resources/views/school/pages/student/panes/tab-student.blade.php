<div class="card card-body">
    <h4>Daftar Siswa</h4>
    <div class="row mb-3 mt-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <form class="d-flex flex-column flex-md-row gap-2" action="/school/students">
                <div class="position-relative flex-grow-1">
                    <input type="text" name="name" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('name', request('name')) }}">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <div class="d-flex flex-column flex-md-row gap-2">
                    <select name="gender" class="form-select">
                        <option value="">Tampilkan semua</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <select name="class" class="form-select">
                        <option value="">Pilih Kelas</option>
                        @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->name }}" {{ request('class') == $classroom->name ? 'selected' : '' }}>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        <button type="submit" class="btn btn-primary btn-md w-100 w-md-auto">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-12 mb-3 d-flex justify-content-md-end align-items-md-center d-none d-lg-flex">
            <a class="btn btn-success w-lg-auto" href="#" data-bs-toggle="modal" data-bs-target="#import-student">
                Import Siswa
            </a>
        </div>

        <!-- untuk tampilan mobile -->
        <div class="col-lg-6 col-md-12 mb-3 d-flex justify-content-md-end align-items-md-center d-lg-none">
            <a class="btn btn-success w-100" href="#" data-bs-toggle="modal" data-bs-target="#import-student">
                Import Siswa
            </a>
        </div>



    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="text-white" style="background-color: #5D87FF;">No</th>
                    <th class="text-white" style="background-color: #5D87FF;">Nama</th>
                    <th class="text-white" style="background-color: #5D87FF;">Jenis Kelamin</th>
                    <th class="text-white" style="background-color: #5D87FF;">NISN</th>
                    <th class="text-white" style="background-color: #5D87FF;">RFID</th>
                    <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/images/default-user.jpeg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40" height="40" alt="" />
                                <div class="ms-3">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->user->name }}</h6>
                                    <span class="fw-normal">{{ $student->classroomStudents->isNotEmpty() ? $student->classroomStudents->first()->classroom->name : 'Tidak dalam kelas' }}</span>
                                </div>
                            </div>
                        </td>
                        {{-- @dd($student->user->roles->pluck('name')[0]) --}}
                        <td>{{ $student->gender->value == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>
                            {{ $student->modelHasRfid ? $student->modelHasRfid->rfid : '-' }}
                            <button type="button" class="btn btn-rounded btn-warning p-1 ms-2 btn-rfid"
                                data-name="{{ $student->user->name }}"
                                data-id="{{ $student->id }}"
                                data-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Kosong' }}"
                                data-old-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Kosong' }}"
                                data-role="Student">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                </svg>
                            </button>
                        </td>
                        <td>
                        <div class="dropdown dropstart">
                            <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="category">
                                    <div class="category-business"></div>
                                    <div class="category-social"></div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <li>
                                    <button class="btn-detail dropdown-item d-flex align-items-center gap-3"
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
                                        data-rfid="{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Kosong' }}"
                                        data-image="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/images/default-user.jpeg') }}"
                                    ><i class="fs-4 ti ti-eye"></i>Detail</button>
                                </li>
                                <li>
                                    <button class="btn-update dropdown-item d-flex align-items-center gap-3"
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
                                        data-address="{{ $student->address }}">
                                        <i class="fs-4 ti ti-edit"></i>Edit</button>
                                </li>
                                <li>
                                    <button data-id="{{ $student->id }}" class="btn-delete dropdown-item d-flex align-items-center text-danger gap-3"><i class="fs-4 ti ti-trash"></i>Hapus</button>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
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
        <x-paginate-component :paginator="$students->appends(request()->input())" />
    </div>
</div>
