@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h5 class="fw-semibold text-white mb-2">Daftar Siswa</h5>
                    <h4 class="fw-semibold text-white mb-2">{{ $classroom->name }}</h4>
                    <h6 class="fw-semibold text-white mb-2">Daftar - daftar siswa di kelas ketika anda menjadi wali kelas</h6>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-3 mt-4">
        <form class="d-flex gap-2">
            <input type="text" name="search" class="form-control search-chat" value="{{ old('search', request('search')) }}" placeholder="Cari..">
            <button class="btn-primary btn" type="submit">Cari</button>
        </form>
    </div>

    <div class="">
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-black">No</th>
                        <th class="text-black">Nama</th>
                        <th class="text-black">Jenis Kelamin</th>
                        <th class="text-black">NISN</th>
                        <th class="text-black text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classroomStudents as $classroomStudent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $classroomStudent->student->user->avatar ?? asset('assets/images/default-user.jpeg') }}"
                                        class="rounded-circle" width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{$classroomStudent->student->user->name}}</h6>
                                        <span class="fw-normal">{{ $classroomStudent->classroom->name }}</span>
                                    </div>
                                </div>

                            </td>
                            <td>{{ $classroomStudent->student->gender->label() }}</td>
                            <td>{{ $classroomStudent->student->nisn }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a type="button" class="text-primary btn-detail"
                                        data-name="{{ $classroomStudent->student->user->name }}"
                                        data-email="{{ $classroomStudent->student->user->email }}"
                                        data-nisn="{{ $classroomStudent->student->nisn }}"
                                        data-classroom="{{ $classroomStudent->classroom->name }}"
                                        data-gender="{{ $classroomStudent->student->gender->label() }}"
                                        data-religion="{{ $classroomStudent->student->religion->name }}"
                                        data-birth_place="{{ $classroomStudent->student->birth_place }}"
                                        data-birth_date="{{ Carbon\Carbon::parse($classroomStudent->student->birth_date)->format('d F Y') }}"
                                        data-number_kk="{{ $classroomStudent->student->number_kk }}"
                                        data-nik="{{ $classroomStudent->student->nik }}"
                                        data-childnumber="{{ $classroomStudent->student->order_child }}"
                                        data-number_akta="{{ $classroomStudent->student->number_akta }}"
                                        data-numbersibling="{{ $classroomStudent->student->count_siblings }}"
                                        data-address="{{ $classroomStudent->student->address }}"
                                        data-image="{{ $classroomStudent->student->user->avatar ?? asset('assets/images/default-user.jpeg') }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                            </g>
                                        </svg>
                                    </a>
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
        {{-- <div class="pagination justify-content-end mt-2 mb-0">
            <x-paginate-component :paginator="$teachers" />
        </div> --}}
    </div>

    @include('teacher.pages.teacher-student.widgets.modal-detail')
@endsection

@section('script')
    @include('teacher.pages.teacher-student.script.script-detail')
@endsection
