<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h5>Statistik Absensi Siswa</h5>
        <div class="d-flex">
            <h5>{{ \Carbon\Carbon::parse($date)->format('d F Y') }}</h5>

            <div class="btn-group">
                <div class="btn-group dropstart" role="group">
                    <button type="button" class="btn border-0 dropdown-toggle-split show" data-bs-toggle="dropdown" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom: 17px;" width="30" height="30" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4" /></svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Download SVG</a></li>
                        <li><a class="dropdown-item" href="#">Download PNG</a></li>
                        <li><a class="dropdown-item" href="#">Download CSV</a></li>
                    </ul>
                </div>
                {{-- <button type="button" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/></svg>
                </button> --}}
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div id="custom-legend">
            <div><span class="legend-text me-3">Petunjuk</span></div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(19, 222, 185);"></span>
                <span class="legend-text">Masuk</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(93, 135, 255);"></span>
                <span class="legend-text">Izin</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(255, 174, 31);"></span>
                <span class="legend-text">Sakit</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(250, 137, 107);"></span>
                <span class="legend-text">Alfa</span>
            </div>
        </div>
    </div>
    <div id="chart-student"></div>
</div>

<div class="card card-body mt-3">
    <h5 class="mb-4">Data Absensi</h5>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="text-white" style="background-color: #5D87FF;">No</th>
                    <th class="text-white" style="background-color: #5D87FF;">Nama Pengguna</th>
                    <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                    <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                    <th class="text-white" style="background-color: #5D87FF;">Point</th>
                    <th class="text-white" style="background-color: #5D87FF;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->model ? $attendance->model->student->user->name : 'siswa tidak ditemukan' }}</td>
                        <td>{{ $attendance->checkin ? Carbon\Carbon::parse($attendance->checkin)->format('H.i') : '-' }}
                        </td>
                        <td>{{ $attendance->checkout ? Carbon\Carbon::parse($attendance->checkout)->format('H.i') : '-' }}
                        </td>
                        <td>{{ $attendance->point }}</td>
                        <td>
                            <span class="badge {{ $attendance->status->color() }}">
                                {{ $attendance->status->label() }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Tidak ada kehadiran siswa
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances->appends(request()->input())" />
    </div>
</div>
