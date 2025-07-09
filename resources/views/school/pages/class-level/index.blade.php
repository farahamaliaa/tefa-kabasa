@extends('school.layouts.app')

@section('style')
    <style>
        #keagamaan {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', request()->name) }}" class="form-control search-chat py-2 px-4 ps-5" id="search-name"
                            placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                    Tambah Tingkatan Kelas
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($levelClasses as $levelClass)
            <div class="col-lg-3">
                <div class="card card-body bg-transparent border-2 shadow-none">
                    <div class="text-center">
                        <h5>{{ $levelClass->name }}</h5>
                        <div class="mt-4">
                            <button type="button" data-id="{{ $levelClass->id }}" data-name="{{ $levelClass->name }}"
                                class="btn btn-edit mb-1 btn-primary px-4 me-2">
                                Edit
                            </button>
                            <button type="button" data-id="{{ $levelClass->id }}"
                                class="btn btn-delete mb-1 btn-light-danger text-danger px-4">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Tingkatan kelas belum ditambahkan
                </p>
            </div>
        @endforelse
    </div>
    <div class="pagination justify-content-center mb-0">
        <x-paginate-component :paginator="$levelClasses" />
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahTingkatanKelas" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTingkatanKelas">Tambah Tingkatan Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('class-level.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Tingkatan Kelas</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan tingkatan kelas"
                                value="{{ old('name') }}">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="editTingkatanKelas" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTingkatanKelas">Edit Tingkatan Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Tingkatan Kelas</label>
                            <input type="text" name="name" id="name-update" class="form-control" placeholder="Masukkan tingkatan kelas">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#form-update').attr('action', '/school/update-class-level/' + id);
            $('#name-update').val(name);
            $('#modal-update').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/delete-class-level/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
