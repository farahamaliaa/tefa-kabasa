<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
    <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
        <div class="mb-3 mb-md-0 me-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari...">
        </div>

        <div class="mb-3 mb-md-0 me-md-3">
            <select name="points" class="form-select">
                <option value="highest">Point Tertinggi</option>
                <option value="lowest">Point Terendah</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</div>


<div class="row">
    @forelse ($classrooms as $classroom)
        <div class="col-lg-4 col-md-12">
            <div class="card position-relative">
                <div class="card-body">
                    <div class="justify-content-between d-flex align-items-end">
                        <div>
                            <h3>{{ $classroom->name }}</h3>
                            <h6>MERDEKA | {{ $classroom->schoolYear->school_year }}</h6>
                        </div>
                        <div>
                            <h5>{{ $classroom->employee->user->name }}</h5>
                            <div class="d-flex gap-2 align-items-center justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-2" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M17.928 19.634h2.138a1.165 1.165 0 0 0 1.116-1.555a6.851 6.851 0 0 0-6.117-3.95m0-2.759a3.664 3.664 0 0 0 3.665-3.664a3.664 3.664 0 0 0-3.665-3.674m-1.04 16.795a1.908 1.908 0 0 0 1.537-3.035a8.026 8.026 0 0 0-6.222-3.196a8.026 8.026 0 0 0-6.222 3.197a1.909 1.909 0 0 0 1.536 3.034zM9.34 11.485a4.16 4.16 0 0 0 4.15-4.161a4.151 4.151 0 0 0-8.302 0a4.16 4.16 0 0 0 4.151 4.16" />
                                </svg>
                                <h5>{{ $classroom->classroomStudents->count() }} Siswa</h5>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-between d-flex align-items-center mt-5">
                        <div>
                            <h5><strong>Jumlah Point Keseluruhan :</strong></h5>
                        </div>
                        <div>
                            <span class="mb-1 badge font-medium bg-light-danger text-danger"> {{ $classroom->classroomStudents->sum(function($classroomStudent){ return $classroomStudent->student->point; }) }} Point </span>
                        </div>
                    </div>
                    <div class="card mt-3 mb-0">
                        <div class="card-body py-3 px-3 bg-light-primary">
                            <h6><strong>Jumlah Siswa Melanggar :</strong></h6>
                            <div class="d-flex gap-2 align-items-center justify-content-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-2" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M17.928 19.634h2.138a1.165 1.165 0 0 0 1.116-1.555a6.851 6.851 0 0 0-6.117-3.95m0-2.759a3.664 3.664 0 0 0 3.665-3.664a3.664 3.664 0 0 0-3.665-3.674m-1.04 16.795a1.908 1.908 0 0 0 1.537-3.035a8.026 8.026 0 0 0-6.222-3.196a8.026 8.026 0 0 0-6.222 3.197a1.909 1.909 0 0 0 1.536 3.034zM9.34 11.485a4.16 4.16 0 0 0 4.15-4.161a4.151 4.151 0 0 0-8.302 0a4.16 4.16 0 0 0 4.151 4.16" />
                                </svg>
                                <h5>{{ $classroom->classroomStudents->sum(function($student) { return $student->studentViolations->count(); }) }} Siswa</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('employee.violation.class-point.detail', ['classroom' => $classroom->id]) }}" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>

<x-paginate-component :paginator="$classrooms" />
