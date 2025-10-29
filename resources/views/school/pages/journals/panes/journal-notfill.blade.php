<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="row g-2 w-100" method="GET">
                <div class="col-12 col-md-auto mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search_notfill" class="form-control" placeholder="Cari..."
                        value="{{ old('search_notfill', request()->input('search_notfill')) }}">
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notfill_journals as $notfill_journal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $notfill_journal->teacherSubject->employee->image ? asset('storage/' . $notfill_journal->teacherSubject->employee->image) : asset('assets/images/default-user.jpeg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/default-user.jpeg') }}';"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover"
                                        width="40" height="40" alt="" />
                                    <div class="ms-2">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">
                                            {{ $notfill_journal->teacherSubject->employee->user->name }}</h6>
                                        {{-- <span class="fw-normal">{{ $notfill_journal->teacherSubject->employee->user->modelHasRfid ? $notfill_journal->teacherSubject->employee->user->modelHasRfid->rfid : 'Tidak ada rfid' }}</span> --}}
                                        <span class="fw-normal">{{ $notfill_journal->teacherSubject->employee->nip }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($notfill_journal->created_at)->translatedFormat('d F Y') }}
                            </td>
                            <td>{{ $notfill_journal->classroom->name }} -
                                {{ $notfill_journal->teacherSubject->subject->name }}</td>
                            <td><span class="mb-1 badge font-medium {{ $notfill_journal->teacherJournals->first() ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}">{{ $notfill_journal->teacherJournals->first() ? 'Mengisi' : 'Tidak Mengisi' }}</span></td>
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
            <x-paginate-component :paginator="$notfill_journals->appends(request()->input())" />
        </div>
    </div>
</div>
