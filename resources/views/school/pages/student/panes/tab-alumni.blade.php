<div class="card card-body">
    <h4>Daftar Alumni</h4>
    <div class="row mb-3 mt-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <form class="d-flex flex-column flex-md-row gap-2" action="/school/students">
                <div class="position-relative flex-grow-1">
                    <input type="text" name="name" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari..." value="{{ old('name', request('name')) }}">
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
                    <button type="submit" class="btn btn-primary btn-md w-100 w-md-auto">Filter</button>
                </div>
            </form>
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
                @forelse ($alumnus as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/images/default-user.jpeg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-3">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->student->user->name }}
                                    </h6>
                                    <span class="fw-normal">{{ $student->classroom->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $student->student->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>{{ $student->student->nisn }}</td>
                        <td>{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Kosong' }}</td>
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
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-3 btn-detail-alumni" type="button"
                                            data-id="{{ $student->student->id }}" data-name="{{ $student->student->user->name }}"
                                            data-email="{{ $student->student->user->email }}" data-nisn="{{ $student->student->nisn }}"
                                            data-religion_id="{{ $student->student->religion_id }}"
                                            data-gender="{{ $student->student->gender }}"
                                            data-birth_place="{{ $student->student->birth_place }}"
                                            data-birth_date="{{ $student->student->birth_date }}" data-nik="{{ $student->student->nik }}"
                                            data-number_kk="{{ $student->student->number_kk }}"
                                            data-number_akta="{{ $student->student->number_akta }}"
                                            data-order_child="{{ $student->student->order_child }}"
                                            data-count_siblings="{{ $student->student->count_siblings }}"
                                            data-address="{{ $student->student->address }}"
                                            data-rfid="{{ $student->student->modelHasRfid ? $student->student->modelHasRfid->rfid : 'Kosong' }}"
                                            data-image="{{ $student->student->image ? asset('storage/' . $student->student->image) : asset('assets/images/default-user.jpeg') }}"
                                            >
                                            <i class="fs-4 ti ti-eye"></i>Detail
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a type="button" class="dropdown-item d-flex align-items-center gap-3 btn-confirm-alumnus">
                                            <i class="fs-4 ti ti-user"></i>Jadikan siswa
                                        </a>
                                    </li> --}}
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
</div>
