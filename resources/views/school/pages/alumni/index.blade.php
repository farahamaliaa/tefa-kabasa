@extends('school.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">

    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <form action="">
            <div class="d-flex flex-wrap align-items-center">
                <div class="mb-3">
                    <input type="text" name="name" value="{{ old('name', request('name')) }}"
                        class="form-control product-search" id="input-search" placeholder="Cari...">
                </div>
            </div>
        </form>

        <div>
            <a href="{{ route('school.class-alumni.index') }}" class="btn btn-primary">
                Kembali
            </a>
        </div>
    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Kelas</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                    height="30" alt="" />
                                {{ $classroom->student->user->name }}
                            </div>
                        </td>
                        <td>
                            {{ $classroom->classroom->name }}
                        </td>
                        <td>
                            {{ $classroom->student->nisn }}
                        </td>
                        <td>{{ $classroom->student->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>

                        <td>
                            <div class="category-selector btn-group">
                                <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end category-menu">
                                    <button type="button"
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                        Jadikan Siswa
                                    </button>
                                    <a href="#"
                                        class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$classrooms" />
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.category-dropdown').on('show.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'visible');
        });

        $('.category-dropdown').on('hide.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'auto');
        });
    });
</script>
@endsection
