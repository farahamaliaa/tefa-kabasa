<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="row g-2 w-100" method="GET">
                <div class="col-12 col-md-auto mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search_fill" class="form-control" placeholder="Cari..."
                        value="{{ old('search_fill', request()->input('search_fill')) }}">
                </div>
                <div class="col-12 col-md-auto">
                    <button type="submit" class="btn btn-primary w-100 w-md-auto">Cari</button>
                </div>
            </form>
        </div>

        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-s4">
                    <tr class="">
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fill_journals as $fill_journal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $fill_journal->teacherSubject->employee->image ? asset('storage/'. $fill_journal->teacherSubject->employee->image ) : asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                        height="40" alt="" />
                                    <div class="ms-2">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">
                                            {{ $fill_journal->teacherSubject->employee->user->name }}</h6>
                                        <span
                                            class="fw-normal">{{$fill_journal->teacherSubject->employee->user->modelHasRfid ? $fill_journal->teacherSubject->employee->user->modelHasRfid->rfid : 'Tidak ada rfid'}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($fill_journal->created_at)->translatedFormat('d F Y') }}</td>
                            <td>{{ $fill_journal->classroom->name }} - {{ $fill_journal->teacherSubject->subject->name }}</td>
                            <td><span class="mb-1 badge font-medium {{ $fill_journal->teacherJournals->first() ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}">{{ $fill_journal->teacherJournals->first() ? 'Mengisi' : 'Tidak Mengisi'  }}</span></td>
                            <td>{{ $fill_journal->teacherJournals->first() ? \Illuminate\Support\Str::limit($fill_journal->teacherJournals->first()->description, 50) : 'Kosong..'}}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a type="button" class="text-primary btn-detail-journal"
                                        data-author="{{ $fill_journal->teacherSubject->employee->user->name }}"
                                        data-date="{{ \Carbon\Carbon::parse($fill_journal->created_at)->translatedFormat('d F Y') }}"
                                        data-description="{{ $fill_journal->teacherJournals->first() ? $fill_journal->teacherJournals->first()->description : 'kosong...' }}"
                                        data-classroom="{{ $fill_journal->classroom->name }} - {{ $fill_journal->teacherSubject->subject->name }}">
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
                                    Data tidak ditemukan
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-end mb-0">
            <x-paginate-component :paginator="$fill_journals->appends(request()->input())" />
        </div>
    </div>
</div>

