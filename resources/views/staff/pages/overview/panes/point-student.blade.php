<div class="card w-100 position-relative overflow-hidden mt-3 border">
    <div class="card-body p-4">
        <h5 class="mb-3">Daftar Point Siswa</h5>
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">NISN</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Point</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle mb-2" width="40" height="40" alt="">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $item->user->name }}</h6>
                                        <span class="fw-normal">{{ $item->gender->label() }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6 class="mb-0 fs-4">{{ $item->classroomStudents->first()->classroom->name }}</h6>
                            </td>
                            <td>
                                <h6 class="mb-0 fs-4">{{ $item->nisn }}</h6>
                            </td>
                            <td>
                                <span class="badge bg-light-danger text-danger fw-semibold fs-2">{{ $item->point }}
                                    Point</span>
                            </td>
                            <td>
                                <button class="btn mb-1 waves-effect waves-light btn-primary"
                                    type="button">Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">Belum ada data</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
