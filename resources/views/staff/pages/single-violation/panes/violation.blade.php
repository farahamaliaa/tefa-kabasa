<div class="table-responsive rounded-2 mb-4 mt-3">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">Pelanggaran</th>
                <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                <th class="text-white" style="background-color: #5D87FF;">Point</th>
                <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classroomStudent->studentViolations as $studentViolation)
                <tr>
                    <td>{{ $studentViolation->regulation->violation }}</td>
                    <td>{{ $studentViolation->created_at->translatedFormat('d F Y') }}</td>
                    <td>
                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">+
                            {{ $studentViolation->regulation->point }}</span>
                    </td>
                    <td>
                        <button class="btn mb-1 waves-effect waves-light btn-primary"
                            type="button">Detail</button>
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
