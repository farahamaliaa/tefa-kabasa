<div class="row align-items-stretch mt-4">
    <div class="col-lg-8">
        <div class="card border h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h4><b>{{ $classroom->name }}</b></h4>
                        <h6>MERDEKA | {{ $classroom->schoolYear->school_year }}</h6>
                    </div>
                    <div>
                        <h4><b>{{ $classroom->employee->user->name }}</b></h4>
                        <h6 style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.928 19.634h2.138a1.165 1.165 0 0 0 1.116-1.555a6.85 6.85 0 0 0-6.117-3.95m0-2.759a3.664 3.664 0 0 0 3.665-3.664a3.664 3.664 0 0 0-3.665-3.674m-1.04 16.795a1.908 1.908 0 0 0 1.537-3.035a8.03 8.03 0 0 0-6.222-3.196a8.03 8.03 0 0 0-6.222 3.197a1.909 1.909 0 0 0 1.536 3.034zM9.34 11.485a4.16 4.16 0 0 0 4.15-4.161a4.151 4.151 0 0 0-8.302 0a4.16 4.16 0 0 0 4.151 4.16" />
                            </svg>
                            <span style="margin-left: 8px;">{{ $classroom->classroomStudents->count() }} Siswa</span>
                        </h6>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h5 class="mb-0"><b>Jumlah Siswa Keseluruhan :</b></h5>
                    <div>
                        <span class="badge font-medium bg-light-danger text-danger px-4 py-2"
                            style="font-size: 18px;"> {{ $classroom->classroomStudents->sum(function($classroomStudent) {
                                return $classroomStudent->student->point;
                            }) }} Total Point</span>
                    </div>
                </div>

                <div class="bg-light-primary text-primary d-inline-block px-4 py-3 rounded w-100">
                    <h5 class="mb-3"><b>Jumlah Siswa Keseluruhan :</b></h5>
                    <h5 style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M17.928 19.634h2.138a1.165 1.165 0 0 0 1.116-1.555a6.85 6.85 0 0 0-6.117-3.95m0-2.759a3.664 3.664 0 0 0 3.665-3.664a3.664 3.664 0 0 0-3.665-3.674m-1.04 16.795a1.908 1.908 0 0 0 1.537-3.035a8.03 8.03 0 0 0-6.222-3.196a8.03 8.03 0 0 0-6.222 3.197a1.909 1.909 0 0 0 1.536 3.034zM9.34 11.485a4.16 4.16 0 0 0 4.15-4.161a4.151 4.151 0 0 0-8.302 0a4.16 4.16 0 0 0 4.151 4.16" />
                        </svg>
                        <span style="margin-left: 8px;">{{ $classroom->classroomStudents->count() }} Siswa</span>
                    </h5>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border h-100 overflow-hidden">
            <div class="card-body p-0">
                <img src="{{ asset('admin_assets/dist/images/backgrounds/profilebg.jpg') }}" class="img-fluid"
                    alt="">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2"></div>
                    <div class="col-lg-12 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;">
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px;">
                                        <img src="{{ $classroom->employee->image ? asset('storage/'. $classroom->employee->image) :  asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                            class="w-100 h-100" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $classroom->employee->user->name }}</h5>
                                <p class="mb-0 fs-4 mb-4">{{ $classroom->employee->user->email }}</p>
                                <h5 class="fs-4 mb-3 fw-semibold">Wali Kelas {{ $classroom->name }}</h5>
                            </div>
                            <div class="mx-3">
                                <button class="btn waves-effect waves-light btn-primary w-100" type="button">Lihat
                                    Profil Guru</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card w-100 position-relative overflow-hidden mt-3 border">
    <div class="card-body p-4">
        <h5 class="mb-3">Daftar Point Siswa - {{ $classroom->name }}</h5>
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
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
                    @forelse ($classroom->classroomStudents as $data)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $data->student->image ? asset('storage/'. $data->student->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $data->student->user->name }}</h6>
                                        <span class="fw-normal">{{ $data->student->gender->label() }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6 class="mb-0 fs-4">{{ $data->student->nisn }}</h6>
                            </td>
                            <td>
                                <span class="badge bg-light-danger text-danger fw-semibold fs-2">{{ $data->student->point }} Point</span>
                            </td>
                            <td>
                                <button class="btn mb-1 waves-effect waves-light btn-primary"
                                    type="button">Detail</button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
