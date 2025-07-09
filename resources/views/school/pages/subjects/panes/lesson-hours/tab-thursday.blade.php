    <h4 class="mb-3">Jam Pelajaran</h4>
    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-white" style="background-color: #3DBCEC;">No</th>
                    <th class="text-white" style="background-color: #3DBCEC;">Jam</th>
                    <th class="text-white" style="background-color: #3DBCEC;">Penempatan</th>
                    {{-- <th class="text-white" style="background-color: #3DBCEC;">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($lessonHours['thursday'] ?? [] as $index => $lessonHour)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> <span
                                class="badge {{ $lessonHour->name == 'Istirahat' ? 'bg-light-warning text-warning' : 'bg-light-primary text-primary' }}">
                                {{ date('H:i', strtotime($lessonHour->start)) }} -
                                {{ date('H:i', strtotime($lessonHour->end)) }}
                            </span></td>
                        <td>{{ $lessonHour->name }}</td>
                        {{-- <td>
                            <div class="gap-3">
                                <button class="btn btn-light-primary text-primary me-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update">Edit</button>
                                <button class="btn btn-light-danger text-danger btn-delete">Hapus</button>
                            </div>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Jam Pelajaran belum ditambahkan
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <div>
                            <button type="button" data-id="{{ $latestHour[3][0] ? $latestHour[3][0]->id : '' }}" data-day="{{ $latestHour[3][0] ? $latestHour[3][0]->day : 'thursday' }}" data-name="{{ $latestHour[3][0] ? $latestHour[3][0]->name : '' }}" data-start="{{ $latestHour[3][0] ? $latestHour[3][0]->end : '' }}" class="btn-create btn btn-info btn-rounded m-t-10 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"></path>
                            </svg>
                            Tambah Jam
                        </button>
                        </div>
                    </td>
                    <td colspan="1"></td>
                    @if (isset($lessonHours['thursday']))
                        <td>
                            <div class="mb-3">
                                <button data-id="{{ $latestHour[3][0] ? $latestHour[3][0]->id : '' }}" class="btn-delete btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24">
                                    <path fill="#FFFFFF" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"></path>
                                </svg>
                            </button>
                            </div>
                        </td>
                    @endif
                </tr>
            </tfoot>
        </table>
    </div>
