<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Keterangan</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Poin</th>
            <th>Maksimal poin</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y') }}</td>
            <td>{{ $item->model->student->user->name }}</td>
            <td>{{ $item->model->classroom->name }}</td>
            <td>{{ $item->status->label() }}</td>
            <td>{{ $item->checkin ? \Carbon\Carbon::parse($item->checkin)->format('H:i') : '-' }}</td>
            <td>{{ $item->checkout ? \Carbon\Carbon::parse($item->checkout)->format('H:i') : '-' }}</td>
            <td>{{ $item->point }}</td>
            <td>{{ $item->point }}</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
