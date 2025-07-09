<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="row g-2 w-100" method="GET">
                <div class="col-12 col-md-auto mb-2 mb-md-0 me-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Cari..."
                        value="{{ old('name', request()->input('name')) }}">
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
                        <th>Nama Staff</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($completedJournals as $journal)
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
                            <td>
                                <span
                                    class="mb-1 badge font-medium bg-light-{{ $journal->status->color() }} text-{{ $journal->status->color() }}">
                                    {{ $journal->status->label() }}
                                </span>
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($journal->description, 65, '...') }}</td>
                            </td>
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
            <x-paginate-component :paginator="$completedJournals->appends(request()->input())" />
        </div>
    </div>
</div>
