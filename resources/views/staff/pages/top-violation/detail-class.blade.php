@extends('staff.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h6><strong>Daftar Siswa Melanggar</strong></h6>
                    <h4 class="fw-semibold mb-8">{{ $studentClass->count() }} Siswa Melanggar</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Daftar daftar siswa yang melanggar akan mendapatkan point sesuai apa yang di langgar </a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/pagar.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="gender" class="form-select">
                    <option value="">Jenis Kelamin</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="points" class="form-select">
                    <option value="highest">Point Tertinggi</option>
                    <option value="lowest">Point Terendah</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        {{-- <form action="" class="d-flex gap-2">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="date" name="search-date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a class="btn btn-warning" href="{{ route('employee.violation.student-point.index') }}">Kembali</a>
        </form> --}}
    </div>

    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4 text-center">
                <tr>
                    <th class="text-start nama-col">Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($studentClass as $student)
                    <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-2">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->classroomStudent->student->user->name }}</h6>
                                    <span class="fw-normal">{{ $student->classroomStudent->student->gender->label() }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $student->classroomStudent->classroom->name }}</td>
                        <td>{{ $student->regulation->violation }}</td>
                        <td>{{ \Carbon\Carbon::parse($student->created_at)->format('d M Y') }}</td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-danger text-danger">{{ $student->regulation->point }} Point</span>
                        </td>
                        <td>
                            <a href="{{ route('employee.violation.student-point.detail', ['student' => $student->classroomStudent->student->id]) }}" class="btn mb-1 waves-effect waves-light btn-primary">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Tidak ada siswa melanggar
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <x-paginate-component :paginator="$studentClass->appends(request()->input())" />
    </div>
@endsection
