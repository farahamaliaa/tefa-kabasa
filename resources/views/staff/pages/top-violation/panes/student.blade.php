<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Daftar Pelanggaran</h5>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search_student" class="form-control" placeholder="Cari..."
                        value="{{ old('search_student', request('search_student')) }}">
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="point_student" class="form-select">
                        <option value="highest" {{ old('filter', request('filter')) == 'highest' ? 'selected' : '' }}>Teratas</option>
                        <option value="lowest" {{ old('filter', request('filter')) == 'lowest' ? 'selected' : '' }}>Terbawah</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Point</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $student->image ? asset('storage/'. $student->image) : asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover"
                                        width="40" height="40" alt="" />
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->user->name }}</h6>
                                        <span class="fw-normal">{{ $student->nisn }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $student->classroomStudents->isNotEmpty() ? $student->classroomStudents->first()->classroom->name : 'Tidak dalam kelas' }}</td>
                            <td>
                                <span class="badge bg-light-danger text-danger">{{ $student->point }} Point</span>
                            </td>
                            <td>
                                <a href="{{ route('employee.violation.student-point.detail', ['student' => $student->id]) }}" class="btn btn-primary py-1 px-4">Detail</a>
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
</div>
