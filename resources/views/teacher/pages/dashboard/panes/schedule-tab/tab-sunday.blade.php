<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">No</th>
                <th class="text-white" style="background-color: #5D87FF;">Mapel</th>
                <th class="text-white" style="background-color: #5D87FF;">Waktu</th>
                <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($lessonSchedules['sunday']))
            @foreach ($lessonSchedules['sunday'] as $lessonSchedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lessonSchedule->teacherSubject->subject->name }}</td>
                    <td>
                        <span class="badge bg-light-primary text-primary">
                            {{ \Carbon\Carbon::parse($lessonSchedule->start->start)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($lessonSchedule->end->end)->format('H:i') }}
                        </span>
                        @php
                            $lessonHours = App\Models\LessonHour::whereBetween('start', [
                                $lessonSchedule->start->start,
                                $lessonSchedule->end->start,
                            ])
                                ->where('day', 'sunday')
                                ->where('name', 'Istirahat')
                                ->get();
                        @endphp
                        @foreach ($lessonHours as $lessonHour)
                            <br>
                            <span class="badge bg-light-warning text-warning mt-1">
                                {{ $lessonHour->name }} : {{ $lessonHour->start }} - {{ $lessonHour->end }}
                            </span>
                        @endforeach
                    </td>
                    <td>Jam ke {{ explode(' - ', $lessonSchedule->start->name)[1] }} -
                        {{ explode(' - ', $lessonSchedule->end->name)[1] }}</td>
                    <td>{{ $lessonSchedule->classroom->name }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center align-middle">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                            width="300px">
                        <p class="fs-5 text-dark text-center mt-2">
                            Belum ada data
                        </p>
                    </div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
