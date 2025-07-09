<div class="row d-flex align-items-stretch">
    <div class="col-lg-3">
        <div class="card shadow-none position-relative overflow-hidden h-75"
            style="background: linear-gradient(to bottom, #5D87FF, #5D87FF);">
            <div class="card-body px-4 py-3 position-relative">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="fw-semibold text-white mb-3 pt-3">Maks Poin Pada Sekolah</h5>
                        </div>
                        <nav aria-label="breadcrumb">
                            <span
                                class="badge fw-semibold fs-8 text-primary bg-white p-2 px-3">{{ $maxPoint }}</span>
                        </nav>
                    </div>
                </div>
                <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image" class="position-absolute"
                    style="bottom: 0; right: 0; width: 130px; height: auto; margin-bottom: -10px; margin-right: -10px;">
            </div>
        </div>
    </div>


    <div class="col-lg-9">
        <div class="card border border-grey shadow-none position-relative overflow-hidden h-75"
            style="background-color: #FEF5E5;">
            <div class="card-body px-4 py-4">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fs-5 mt-1"><b>Poin Peringatan</b></h4>
                        <nav aria-label="breadcrumb">
                            <ul style="list-style-type:disc; padding-left: 20px;">
                                @forelse ($schoolPoints as $schoolPoint)
                                    <li style="padding-bottom: 3px">Poin peringatan {{ $schoolPoint->point }}+ :
                                        {{ $schoolPoint->description }}</li>
                                @empty
                                    <li style="padding-bottom: 3px">Poin peringatan belum ditambahkan</li>
                                @endforelse
                                <li style="padding-bottom: 3px">Guru diharuskan untuk menindak lanjuti siswa yang
                                    mempunyai banyak point Pelanggaran</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5><b>Statistik Pelanggaran Siswa</b></h5>
                <div id="chart-line-basic"></div>
            </div>
        </div>
    </div>
</div>

<div class="card border shadow">
    <div class="card-body">
        <h5 class="mb-4"><b>Daftar Siswa Melanggar Baru - baru ini</b></h5>
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama Siswa
                        </th>
                        <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Tanggal
                        </th>
                        <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Jenis
                            Pelanggaran
                        </th>
                        <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Point
                        </th>
                        <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($violations as $violation)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/default-user.jpeg') }}" class="rounded-circle"
                                        width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">
                                            {{ $violation->classroomStudent->student->user->name }}</h6>
                                        <span
                                            class="fw-normal">{{ $violation->classroomStudent->classroom->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $violation->created_at->locale('id')->translatedFormat('d F Y') }}
                            </td>
                            <td>{{ $violation->regulation->violation }}</td>
                            <td>
                                <span class="badge bg-light-danger text-danger fw-semibold fs-2">+
                                    {{ $violation->regulation->point }} Point</span>
                            </td>
                            <td>
                                <button class="btn mb-1 btn-primary btn-detail-violation"
                                data-name="{{ $violation->classroomStudent->student->user->name }}"
                                data-classroom="{{ $violation->classroomStudent->classroom->name }}"
                                data-violation="{{ $violation->regulation->violation }}"
                                data-date="{{ \Carbon\Carbon::parse($violation->created_at)->translatedFormat('d F Y')  }}"
                                data-employee="{{ $violation->employee ? $violation->employee->user->name : 'Belum ada pelopor'}}"
                                type="button">Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">Belum ada data</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
