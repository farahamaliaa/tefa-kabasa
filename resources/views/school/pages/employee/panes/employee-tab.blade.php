<div class="card card-body">
    <div class="">
        <h4>Daftar Staff</h4>
    </div>
    <div class="">
        <div class="row">
            <div class="col-12 col-lg-5 mb-4 mt-3">
                <form class="d-flex flex-column flex-lg-row gap-2 align-items-stretch align-items-lg-center" method="GET" action="{{ url()->current() }}">
                    <div class="position-relative flex-grow-1 mb-2 mb-lg-0">
                        <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5" id="search-name"
                            placeholder="Cari" value="{{ old('search', request('search')) }}">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                    <div class="flex-grow-1 mb-2 mb-lg-0">
                        <select name="gender" class="form-select" id="search-status">
                            <option value="" {{ old('gender', request('gender')) == '' ? 'selected' : '' }}>Semua</option>
                            <option value="male" {{ old('gender', request('gender')) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender', request('gender')) == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-lg-auto">Filter</button>
                </form>
            </div>
        </div>

    </div>



    <div class="">
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-white" style="background-color: #5D87FF;">No</th>
                        <th class="text-white" style="background-color: #5D87FF;">Nama Staf</th>
                        <th class="text-white" style="background-color: #5D87FF;">Status</th>
                        <th class="text-white" style="background-color: #5D87FF;">Email</th>
                        <th class="text-white" style="background-color: #5D87FF;">NIP</th>
                        <th class="text-white" style="background-color: #5D87FF;">RFID</th>
                        <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($staffs as $staff)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $staff->image ? asset('storage/' . $staff->image) : asset('assets/images/default-user.jpeg') }}"
                                        class="rounded-circle" width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $staff->user->name }}</h6>
                                        <span class="fw-normal">{{ $staff->gender->label() }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="badge bg-light-{{ $staff->active == 1 ? 'primary' : 'danger' }} text-{{ $staff->active == 1 ? 'primary' : 'danger' }}">{{ $staff->active == 1 ? 'Aktif' : 'Tidak aktif' }}</span>
                            </td>
                            <td>{{ $staff->user->email }}</td>
                            <td>{{ $staff->nip }}</td>
                            <td>{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : '-' }}
                                <button type="button" class="btn btn-rounded btn-warning p-1 ms-2 btn-rfid"
                                    data-name="{{ $staff->user->name }}" data-id="{{ $staff->id }}"
                                    data-rfid="{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : 'Kosong' }}"
                                    data-old-rfid="{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : 'Kosong' }}"
                                    data-role="Employee">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
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
                                            <button type="button"
                                                class="dropdown-item d-flex align-items-center gap-3 btn-detail-employee"
                                                {{-- data-image="{{ asset('storage/' . $staff->image) }}" --}}
                                                data-image="{{ $staff->image ? asset('storage/' . $staff->image) : asset('assets/images/default-user.jpeg') }}"
                                                data-name="{{ $staff->user->name }}"
                                                data-email="{{ $staff->user->email }}"
                                                data-phone="{{ $staff->phone_number }}"
                                                data-gender="{{ $staff->gender->label() }}"
                                                data-nip="{{ $staff->nip }}"
                                                data-rfid="{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : 'Belum memiliki rfid' }}"
                                                data-address="{{ $staff->address }}">
                                                <i class="fs-4 ti ti-eye"></i>Detail
                                            </button>
                                        </li>

                                        <li>
                                            <button type="button"
                                                class="btn-update dropdown-item d-flex align-items-center gap-3 btn-edit-employee"
                                                data-id="{{ $staff->id }}"
                                                data-image="{{ asset('storage/' . $staff->image) }}"
                                                data-name="{{ $staff->user->name }}" data-nip="{{ $staff->nip }}"
                                                data-religion_id="{{ $staff->religion_id }}"
                                                data-birth_date="{{ $staff->birth_date }}"
                                                data-birth_place="{{ $staff->birth_place }}"
                                                data-gender="{{ $staff->gender->value }}"
                                                data-nik="{{ $staff->nik }}" data-phone="{{ $staff->phone_number }}"
                                                data-email="{{ $staff->user->email }}"
                                                data-active="{{ $staff->active }}"
                                                data-address="{{ $staff->address }}">
                                                <i class="fs-4 ti ti-edit"></i>Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="btn-delete dropdown-item d-flex align-items-center gap-3 text-danger btn-delete-staff"
                                                data-id="{{ $staff->id }}">
                                                <i class="fs-4 ti ti-trash"></i>Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                                        alt="" width="300px">
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
        <div class="pagination justify-content-end mb-0">
            <x-paginate-component :paginator="$staffs->appends(request()->input())" />
        </div>
    </div>
</div>
