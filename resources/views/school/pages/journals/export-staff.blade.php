@extends('school.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8" style="color: #5D87FF">Cetak Jurnal Staff</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-primary">
                                Jurnal Staff
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card bg-light-warning shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3 text-warning">Perhatian</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Lengkapi form dibawah untuk melakukan export jurnal
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <form id="form-action" class="row d-flex align-items-center">
                        <div class="col-12 col-lg-6 mt-4 d-flex gap-2 flex-wrap">
                            <div class="form-group flex-fill">
                                <label for="startDate" class="mb-2">Tanggal Awal</label>
                                <input type="date" class="form-control" id="startDate" name="start"
                                    value="{{ request('start') ?? now()->format('Y-m-d') }}">
                            </div>
                            <div class="form-group flex-fill">
                                <label for="endDate" class="mb-2">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="endDate" name="end"
                                    value="{{ request('end') ?? now()->format('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 mt-4 d-none d-lg-flex gap-2 flex-wrap justify-content-lg-end">
                            <div class="form-group">
                                <button type="submit" class="btn-review btn btn-warning w-100 w-lg-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/>
                                    </svg>
                                    Tampilkan
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-export btn btn-primary w-100 w-lg-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                            <path fill="currentColor" d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zM16 16H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1m-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z"/>
                                        </g>
                                    </svg>
                                    Download
                                </button>
                            </div>
                        </div>


                        <!-- untuk tampilan mobile -->
                        <div class="col-12 col-lg-6 mt-4 d-lg-none d-flex flex-column gap-2">
                            <div class="form-group">
                                <button type="submit" class="btn-review btn btn-warning w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/>
                                    </svg>
                                    Tampilkan
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-export btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                            <path fill="currentColor" d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zM16 16H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1m-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z"/>
                                        </g>
                                    </svg>
                                    Download
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Daftar Jurnal</h5>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4 bg-primary">
                        <tr class="">
                            <th>No</th>
                            <th>Nama Staff</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($journals as $journal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $journal->employee->image ? asset('storage/' . $journal->employee->image) : asset('assets/images/default-user.jpeg') }}"
                                            class="rounded-circle me-2 user-profile" style="object-fit: cover"
                                            width="40" height="40" alt="" />
                                        <div class="ms-2">
                                            <h6 class="fs-4 fw-semibold mb-0 text-start">
                                                {{ $journal->employee->user->name }}</h6>
                                            <span class="fw-normal">{{ $journal->employee->user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($journal->created_at)->translatedFormat('d F Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($journal->description, 65, '...') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a type="button" class="text-primary btn-detail-journal"
                                            data-author="{{ $journal->employee->user->name }}"
                                            data-title="{{ $journal->title }}"
                                            data-date="{{ \Carbon\Carbon::parse($journal->created_at)->translatedFormat('d F Y') }}"
                                            data-description="{{ $journal->description }}">
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
            <div class="pagination justify-content-end mb-0">
                <x-paginate-component :paginator="$journals" />
            </div>
        </div>
    </div>

    @include('school.pages.journals.widgets.modal-detail-staff')
@endsection

@section('script')
    <script>
        $('.btn-preview').on('click', function() {
            var id = $(this).data('id');
            $('#form-action').attr('action', '{{ route('school.employee-journal.export') }}');
        });

        $('.btn-export').on('click', function() {
            var id = $(this).data('id');
            $('#form-action').attr('action', '{{ route('school.employee-journal.download') }}');
        });
    </script>
    @include('school.pages.journals.scripts.detail-staff')
@endsection
