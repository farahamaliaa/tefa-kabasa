@php
    use Carbon\Carbon;
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Jurnal Guru</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">{{ auth_user()->name }}</a></li>
                        </ol>
                    </nav>
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

    <div class="card">
        <div>
            <span class="badge bg-warning fs-5 px-4 text-white mt-3 fw-semibold me-4 mb-4"
                style="border-radius:0px 5px 5px 0px;">Informasi</span>
        </div>
        <ul class="ms-5 pb-2" style="list-style-type:disc;">
            <li>Jurnal wajib di isi oleh semua guru & staff untuk direkap sekolah</li>
            <li>Ketika tidak mengisi jurnal, maka pihak sekolah akan menganggap bahwa guru tersebut tidak masuk/mengajar
                pada jam mapel tersebut</li>
            <li>Batas jam pengisian jurnal adalah 23.59 WIB</li>
        </ul>
        <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
            <img src="{{ asset('assets/images/background/bubble-warning.png') }}" alt="Description" class="img-fluid"
                style="max-width: 150px; height: auto;">
        </div>
    </div>

    <div class="row me-3 mb-3">
        <div class="col-lg-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="d-flex align-items-start align-items-md-center mb-3 mb-md-0">
                    <span class="mb-1 badge bg-primary p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                        </svg>
                    </span>
                    <h4 class="ms-3 mb-0">Pengisian Jurnal</h4>
                </div>
                <div class="d-flex align-items-start align-items-md-center">
                    <p class="mb-0">Tanggal saat ini:</p>
                    <span class="badge bg-light-primary text-primary ms-2 fw-semibold d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary me-1" width="18" height="18"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                        </svg>
                        <?php echo date('d F Y'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="card border shadow mt-3">
        <div class="card-body pt-3">
            <h4 class="pb-3">Jadwal Mengajar Hari Ini</h4>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table text-nowrap border customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class=" rounded-start">Mapel</th>
                            <th class="">Kelas</th>
                            <th class="">Jam</th>
                            <th class="">Tanggal</th>
                            <th class=" text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teacherSchedules as $lessonSchedule)
                            {{-- @php
                                dd(explode(' - ', $lessonSchedule->start->name)[1]);
                            @endphp --}}
                            <tr>
                                <td>{{ $lessonSchedule->teacherSubject->subject->name }}</td>
                                <td>{{ $lessonSchedule->classroom->name }}</td>
                                <td>{{ Carbon::parse($lessonSchedule->start->start)->format('H:i') }} -
                                    {{ Carbon::parse($lessonSchedule->end->end)->format('H:i') }}</td>
                                @if ($lessonSchedule->start->name != 'Istirahat')
                                    <td>{{ Carbon::now()->locale('id')->translatedFormat('d F Y') }}</td>
                                @endif
                                @if ($lessonSchedule->teacherJournals->count() > 0)
                                    <td class="text-center">
                                        <a href="{{ route('teacher.journals.show', $lessonSchedule->teacherJournals->first()->id) }}"
                                            class="btn btn-primary">Detail</a>
                                        <a href="{{ route('teacher.journals.edit', $lessonSchedule->teacherJournals->first()->id) }}"
                                            class="btn btn-warning">Edit Jurnal</a>
                                    </td>
                                @else
                                    <td class="text-center"><a
                                            href="{{ route('teacher.journals.create', $lessonSchedule->id) }}"
                                            class="btn btn-primary">Isi Jurnal</a></td>
                                @endif
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
    </div>
    {{-- <div class="pagination justify-content-end mt-2 mb-0">
    </div> --}}

    <div class="row me-3 mb-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h4 class="ms-3 mb-0">Riwayat Jurnal</h4>
            </div>
        </div>

        <div class="row me-3 mb-3">
            <form method="GET">
                <div class="col-lg-12">
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="d-flex align-items-start align-items-md-center mb-3 mb-md-0">
                            <div class="mb-3 mb-md-0 me-md-3">
                                <input type="text" name="search" class="form-control" placeholder="Cari..."
                                    value="{{ old('search', request('search')) }}">
                            </div>
                            <div class="mb-3 mb-md-0 me-md-3">
                                <select name="filter" class="form-select">
                                    <option value="">Tampilkan semua</option>
                                    <option value="terlama"
                                        {{ old('filter', request('filter')) == 'terlama' ? 'selected' : '' }}>
                                        Terlama</option>
                                    <option value="terbaru"
                                        {{ old('filter', request('filter')) == 'terbaru' ? 'selected' : '' }}>
                                        Terbaru</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="d-flex align-items-start align-items-md-center">
                            <div class="d-flex">
                                <input type="date" name="date" class="form-control me-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row me-3 mb-3">
        @forelse ($histories as $journal)
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                        <h4 class="mb-0 text-white card-title">
                            {{ $journal->lessonSchedule->classroom->name }} -
                            {{ $journal->lessonSchedule->teacherSubject->subject->name }}
                        </h4>
                        <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                            <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}" alt="Description"
                                class="img-fluid" style="max-width: 210px; height: auto; position: relative;">
                            <span class="d-flex align-items-center ms-5"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%; font-size: 13px">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                                </svg>
                                {{ Carbon::parse($journal->date)->isoFormat('DD MMMM YYYY') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row pb-2" style="border-bottom: 1px solid #c0c0c0">
                            <div class="col-lg-8" style="border-right: 1px solid #c0c0c0;">
                                <div class="pe-3">
                                    <h5 class="card-title mb-4">Deskripsi:</h5>
                                    <p>{{ \Illuminate\Support\Str::limit($journal->description, 100) }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ps-3">
                                    <h5 class="card-title mb-4 ms-5 ps-3">Rekap Absensi:</h5>
                                    <div class="row px-5">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-primary text-primary fs-7 fw-semibold mb-1 py-2">{{ $journal->attendanceJournals->where('status', AttendanceEnum::PERMIT)->count() }}</span>
                                                <p>Izin</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-warning text-warning fs-7 fw-semibold mb-1 py-2">{{ $journal->attendanceJournals->where('status', AttendanceEnum::SICK)->count() }}</span>
                                                <p>Sakit</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-danger text-danger fs-7 fw-semibold mb-1 py-2">{{ $journal->attendanceJournals->where('status', AttendanceEnum::ALPHA)->count() }}</span>
                                                <p>Alfa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div>
                            <a href="{{ route('teacher.journals.show', $journal->id) }}" class="btn btn-primary mt-3">
                                Lihat Detail Jurnal
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="text-center align-middle">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                    <p class="fs-5 text-dark text-center mt-2">
                        Belum ada data
                    </p>
                </div>
            </div>
        @endforelse
    </div>


    {{-- <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances" />
    </div> --}}

    <!-- modal upload -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Upload Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <form class="mt-3">
                                <input class="form-control" type="file" id="formFile">
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <small class="text-info">Download</small>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
