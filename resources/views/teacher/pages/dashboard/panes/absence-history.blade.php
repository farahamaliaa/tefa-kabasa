<div class="row mb-4">
    <div class="col-lg-8 col-12 mb-4 d-flex align-items-stretch">
        <div class="card w-100 h-100 border">
            <div class="card-body">
                <h4>Riwayat Absensi</h4>
                <div class="table-responsive rounded-2 mt-3">
                    <table class="table border text-nowrap customize-table mb-0 align-middle">
                        <thead class="sticky-top" style="background-color: #5D87FF;">
                            <tr>
                                <th class="text-white">Hari</th>
                                <th class="text-white">Tanggal</th>
                                <th class="text-white">Masuk</th>
                                <th class="text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody style="max-height: 300px; overflow-y: auto;">
                            @forelse ($attendances->take(5) as $attendance)
                                <tr>
                                    <td>{{ $attendance->created_at->translatedFormat('l') }}</td>
                                    <td>{{ $attendance->created_at->format('d F Y') }}</td>
                                    <td>{{ $attendance->checkin }}</td>
                                    <td>
                                        <span
                                            class="mb-1 badge font-medium {{ $attendance->status->color() }}">{{ $attendance->status->label() }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center align-middle">
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
            </div>
        </div>
    </div>



    <div class="col-lg-4 col-12 d-flex align-items-stretch">
        <div class="card w-100 h-100 overflow-hidden border">
            <div class="card-body">
                <div class="row align-items-center">
                    <h5 class="card-title fw-semibold">Statistik Absensi Guru</h5>
                    <h6 class="mb-3">Hari ini</h6>
                    <div id="chart-teacher" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
