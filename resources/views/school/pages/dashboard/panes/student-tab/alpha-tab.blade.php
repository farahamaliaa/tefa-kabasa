<div class="table-responsive rounded-2 mb-4" style="max-height: 400px; overflow-y: auto;">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead class="text-dark fs-4" style="position: sticky; top: 0; background-color: #5D87FF; z-index: 10;">
            <tr class="">
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">No</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Kelas</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Status</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($alpha as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->model ? $item->model->student->user->name : 'Tidak ada' }}
                    </td>
                    <td>
                        {{ $item->model ? $item->model->classroom->name : 'Tidak ada' }}
                    </td>
                    <td>
                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">Alpha</span>
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
