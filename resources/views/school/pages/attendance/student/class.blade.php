@extends('school.layouts.app')

@section('content')
<div class="d-flex flex-wrap align-items-center">
    <div class="col-12 col-md-2 mb-3">
        <form action="" class="position-relative">
            <input type="text" name="name" value="{{ request()->name }}" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="col-12 col-md-2 mb-3 ms-3">
        <form action="" class="d-flex">
            <select id="status-activity" name="year" class="form-select">
                @foreach ($schoolYears as $schoolYear)
                    <option value="{{ $schoolYear->school_year }}">{{ $schoolYear->school_year }}</option>
                @endforeach
            </select>
            <button type="submit" class="ms-2 btn btn-primary">Cari</button>
        </form>
    </div>
</div>

<div class="row">
    @forelse ($classrooms as $classroom)
        <div class="col-lg-3">
            <div class="card">
                <div class="position-relative">
                    <img class="card-img-top img-responsive"src="{{ asset('admin_assets/dist/images/backgrounds/student.png') }}"
                        alt="Card image cap">
                </div>
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <h3 class="fs-4">{{ $classroom->name }}</h3>
                        <span class="ms-auto fs-4">{{ $classroom->schoolYear->school_year }}</span>
                    </div>
                    <div class="d-flex mb-4">
                        <span class="fs-4">{{ $classroom->employee->user->name }}</span>
                        <div class="ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                            <span class="ms-2 fs-4">
                                {{ $classroom->classroomStudents->count() }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('presence-student.index', ['classroom' => $classroom->id]) }}"
                        class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</a>
                </div>
            </div>
        </div>
    @empty
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
            <p class="fs-5 text-dark text-center mt-2">
                Kelas belum ditambahkan
            </p>
        </div>
    @endforelse
</div>
<div class="pagination justify-content-center mb-0">
    <x-paginate-component :paginator="$classrooms" />
</div>
@endsection
