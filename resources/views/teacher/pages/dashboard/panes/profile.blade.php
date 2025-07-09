<div class="row">
    <div class="col-lg-6 col-12 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-5 text-center">
                        <img src="{{ asset('assets/images/default-user.jpeg') }}" width="120px" alt=""
                            class="img-fluid mb-3">
                    </div>
                    <div class="col-lg-8 col-6 col-ms-1">
                        <h3><b>{{ auth()->user()->name }}</b></h3>
                        <h5>Tahun Ajaran {{ $schoolYear->school_year }}</h5>
                    </div>
                    <div class="col-12 pt-2 mb-0">
                        @forelse ($teacherSubjects as $teacherSubject)
                            <div class="m-1 badge bg-light-primary text-primary">
                                {{ $teacherSubject->subject->name }}
                            </div>
                        @empty
                            <div class="badge bg-light-warning text-warning">Anda tidak mengajar pelajaran apapun
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    @if ($classroom)
                        <div class="col-lg-8 col-6">
                            <h5><b>Wali Kelas Dari</b></h5>
                            <h3 class="my-4"><b>{{ $classroom->name }}</b></h3>
                            <div class="badge bg-light-primary text-primary fs-5">
                                {{ $classroom->classroomStudents->count() }} Total Siswa
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <img src="{{ asset('assets/images/Topi.png') }}" width="300px" alt="" class="img-fluid mt-2">
                        </div>
                    @else
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('assets/images/Topi.png') }}" width="120px" alt="" class="img-fluid mt-2 mb-3">
                            <h4>Anda saat ini tidak terdaftar sebagai wali kelas</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
