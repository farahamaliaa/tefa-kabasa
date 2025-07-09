<div class="row d-flex">
    <div class="col-lg-9 col-md-12">
        <div class="card border shadow">
            <div class="card-body">
                <h5 class="mb-4"><b>Daftar Guru Tidak Mengisi Jurnal</b></h5>
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">No</th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama Guru</th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Tanggal</th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Kelas - Mapel</th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notfill as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->teacherSubject->employee->user->name }}</td>
                                    <td>{{ $value->created_at->locale('id')->translatedFormat('d F Y') }}</td>
                                    <td>{{ $value->classroom->name }} - {{ $value->teacherSubject->subject->name }}</td>
                                    <td>
                                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">Tidak Mengisi</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center align-middle">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                            <p class="fs-5 text-dark text-center mt-2">Tidak ada guru yang belum mengisi jurnal</p>
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

    <div class="col-lg-3 col-md-12 mb-3">
        <div class="statistik-container">
            <h4><b>Statistik</b></h4>
            <div class="line">
                <div class="small-line"></div>
                <div class="smaller-line"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border shadow rounded-4 p-0 card-body-with-line">
                    <div class="card-body">
                        <h5><b>Jumlah Guru</b></h5>
                        <h3 class="text-primary">{{ $teachers }} Guru</h3>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border shadow rounded-4 p-0 card-body-with-line2">
                    <div class="card-body">
                        <h5><b>Guru Mengisi Jurnal</b></h5>
                        <h3 class="text-success">{{ $fill->count() }} Guru</h3>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border shadow rounded-4 p-0 card-body-with-line3">
                    <div class="card-body">
                        <h5><b>Guru Tidak Mengisi Jurnal</b></h5>
                        <h3 class="text-danger">{{ $notfill->count() }} Guru</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- <a href="#" class="btn waves-effect waves-light btn-outline-primary w-100">Lihat Selengkapnya</a> --}}
    </div>
</div>
