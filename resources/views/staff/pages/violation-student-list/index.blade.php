@extends('staff.layouts.app')
@section('style')
    <style>
        .sticky-footer {
            position: sticky;
            bottom: 0;
            z-index: 1000;
            background-color: white;
            /* Sesuaikan warna latar footer */
            padding: 15px;
            /* Tambahkan padding sesuai kebutuhan */
        }
    </style>
@endsection
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pelanggaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Daftar siswa perbaikan untuk mengurangi point pelanggaran</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/welcome.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <form class="position-relative">
            <div class="d-flex flex-wrap align-items-end">
                <div class="col-12 col-md-6 col-lg-5 mb-3 me-3 position-relative">
                    <input type="text" class="form-control product-search ps-5" name="search"
                        value="{{ request('search') }}" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mb-3 me-3">
                    <select name="gender" class="form-select">
                        <option value="">Tampilkan semua</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-12 col-md-1 col-lg-2 mb-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>




        <div>
            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#import-violation">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                            d="M13.586 2a2 2 0 0 1 1.284.467l.13.119L19.414 7a2 2 0 0 1 .578 1.238l.008.176V20a2 2 0 0 1-1.85 1.995L18 22h-6v-2h6V10h-4.5a1.5 1.5 0 0 1-1.493-1.356L12 8.5V4H6v8H4V4a2 2 0 0 1 1.85-1.995L6 2zM7.707 14.465l2.829 2.828a1 1 0 0 1 0 1.414l-2.829 2.828a1 1 0 1 1-1.414-1.414L7.414 19H3a1 1 0 1 1 0-2h4.414l-1.121-1.121a1 1 0 1 1 1.414-1.415ZM14 4.414V8h3.586z" />
                    </g>
                </svg>
                Import
                Pelanggaran</button>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#violation-student-create">Tambah
                Pelanggaran</button>
        </div>
    </div>

    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4 text-center">
                <tr>
                    <th>No</th>
                    <th class="text-start nama-col">Nama</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($studentViolations as $studentViolation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="{{ $studentViolation->classroomStudent->student->image ? asset('storage/' . $studentViolation->classroomStudent->student->image) : asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-2">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">
                                        {{ $studentViolation->classroomStudent->student->user->name }}</h6>
                                    <span
                                        class="fw-normal">{{ $studentViolation->classroomStudent->classroom->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $studentViolation->regulation->violation }}</td>
                        <td>{{ $studentViolation->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-danger text-danger">+
                                {{ $studentViolation->regulation->point }} Point</span>
                        </td>
                        <td>
                            <button data-name="{{ $studentViolation->classroomStudent->student->user->name }}"
                                data-classroom="{{ $studentViolation->classroomStudent->classroom->name }}"
                                data-violation="{{ $studentViolation->regulation->violation }}"
                                data-date="{{ $studentViolation->created_at->translatedFormat('d F Y') }}" type="button"
                                class="btn mb-1 waves-effect waves-light btn-primary btn-detail">Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada siswa melanggar
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    @include('staff.pages.violation-student-list.widgets.detail-violation')
    @include('staff.pages.violation-student-list.widgets.import')
    @include('staff.pages.violation-student-list.widgets.create-violation')
@endsection

@section('script')
<script>
    $('#classroom-violation').change(function() {
        var id = $(this).val();
        console.log(id);    
        
        getStudent(id);
    })

    function getStudent(id) {
        $.ajax({
            url: "/get-students",
            method: "GET",
            data: {
                classroom_id: id
            },
            dataType: "JSON",
            beforeSend: function() {
                $('.select2-siswa').html('')
            },
            success: function(response) {
                console.log(response);
                
                $.each(response.data, function(index, data) {
                    $('.select2-siswa').append('<option value="' + data.id + '">' + data.student.user.name + '</option>')
                });
            }
        })
    }
</script>
    @include('staff.pages.violation-student-list.scripts.create-script')
    @include('staff.pages.violation-student-list.scripts.detail')
@endsection
