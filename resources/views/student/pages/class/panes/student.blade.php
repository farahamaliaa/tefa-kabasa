<div class="row">
    @forelse ($classroomStudent->classroom->classroomStudents->where('student_id', '!=', $student_id) as $student)
        <div class="col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0">
                    <div class="bg-primary"
                        style="height: 100px; background-image: url('{{ asset('assets/images/background/buble-1.png') }}'); background-repeat: no-repeat; background-position: right bottom; background-size: 110px auto;">
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-4 order-lg-1 order-2"></div>
                        <div class="col-12 mt-n3 mb-3">
                            <div class="mt-n5">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <div
                                        class="linear-gradient d-flex align-items-center justify-content-center rounded-circle">
                                        <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                            style="width: 100px; height: 100px;">
                                            <img src="{{ $student->student->image != null ? asset('storage/'. $student->student->image) :  asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                                class="w-100 h-100" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center w-100">
                                    <h5 class="fs-5 mb-0 fw-semibold">{{ $student->student->user->name }}</h5>
                                    <p class="mb-0 fs-4">{{ $student->student->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center align-middle">
            <div
                class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                    alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Tidak ada siswa di kelas ini
                </p>
            </div>
        </div>
    @endforelse
</div>
