<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Kelas</th>
            <th>Judul</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->teacherJournals->first() ? \Carbon\Carbon::parse($item->teacherJournals->first()->created_at)->translatedFormat('d F Y') : 'tidak mengisi' }}</td>
            <td>{{ $item->teacherSubject->employee->user->name }}</td>
            <td>{{ $item->teacherSubject->employee->nip }}</td>
            <td>{{ $item->classroom->name }} - {{ $item->teacherSubject->subject->name }}</td>
            <td>{{ $item->teacherJournals->first() ? $item->teacherJournals->first()->title : 'tidak mengisi' }}</td>
            <td>{{ $item->teacherJournals->first() ? $item->teacherJournals->first()->description : 'tidak mengisi' }}</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
