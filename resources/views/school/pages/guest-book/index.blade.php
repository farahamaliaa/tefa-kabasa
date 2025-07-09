@extends('school.layouts.app')

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-8 col-md-9">
                    <h4 class="fw-semibold mb-2 text-light">Buku Tamu</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Daftar pengunjung di sekolah</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-4 col-md-3 text-center">
                    <img src="{{ asset('assets/images/background/bag.png') }}" class="img-fluid mb-n3">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row justify-content-between mb-4">
        <form class="d-flex flex-column flex-md-row" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari..."
                    value="{{ old('search', request()->input('search')) }}">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <div class="row">

        <div class="table-responsive my-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Keperluan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guestBooks as $guestBook)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="align-items-center">
                                <h5 class="m-0">{{ $guestBook->name }}</h5>
                                <p class="m-0">{{ $guestBook->email }}</p>
                            </td>
                            <td class="">
                                <span class="badge bg-light-{{ $guestBook->status->color() }} text-{{ $guestBook->status->color() }} text-capitalize">{{ $guestBook->status }}</span>
                            </td>
                            <td class="">{{ Carbon\Carbon::parse($guestBook->date)->format('d F Y') }}</td>
                            <td class="">{{ Str::limit($guestBook->needs, 50) }}</td>
                            <td class="">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a class="btn-detail" type="button"
                                    data-name="{{ $guestBook->name }}"
                                    data-email="{{ $guestBook->email }}"
                                    data-status="{{ $guestBook->status }}"
                                    data-date="{{ $guestBook->date }}"
                                    data-position="{{ $guestBook->position }}"
                                    data-address="{{ $guestBook->address }}"
                                    data-needs="{{ $guestBook->needs }}"
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
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
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
    </div>

    @include('school.pages.guest-book.widgets.detail')
@endsection
@section('script')
    @include('school.pages.guest-book.scripts.detail')
@endsection
