@php
    use App\Enums\AttendanceEnum;
@endphp
@section('script')
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }



        const attendance = {{ count($attendanceJournals) }};
        const journal = @json($teacherJournal);
        console.log(attendance);

        let students = []

        console.log(students.length);
        $(document).ready(function() {
            function handleDeleteStudent(studentId, attendanceId) {
                let updatedStudents = students.map(student => {
                    if (student.classroom_student_id === studentId) {
                        return {
                            ...student,
                            id: attendanceId ? attendanceId : null,
                            classroom_student_id: student.id ? student.id : null,
                            action: 'delete'
                        };
                    }
                    return student;
                });

                if (students.length === 0) {
                    students.push({
                        id: attendanceId ? attendanceId : null,
                        classroom_student_id: studentId,
                        action: 'delete'
                    })
                } else {
                    students = updatedStudents;
                }

                console.log(students);
            }

            function addDeleteListenner() {
                $('.delete-btn').click(function() {
                    var row = $(this).closest('tr');
                    var studentId = row.find('select[name="siswa"]').val();
                    handleDeleteStudent(studentId, $(this).data('attendance'));
                    row.remove();
                });
            }

            function checkUpdate() {
                $(document).on('change', 'select', function() {
                    const tr = $(this).closest('.old');
                    console.log(tr.length);
                    if (tr.length > 0) {
                        var status = tr.find('select[name="status"]').val();
                        var studentId = tr.find('select[name="siswa"]').val();
                        var lessonHourId = tr.find('select[name="jam"]').val();
                        var attendanceId = tr.find('.delete-btn').data('attendance');

                        let exist = students.length === 0 ? false : students.find(student => student.id ===
                            attendanceId);

                        console.log(exist);

                        if (exist === false || exist == undefined) {
                            students.push({
                                status: status,
                                classroom_student_id: studentId,
                                lesson_hour_id: lessonHourId,
                                id: attendanceId,
                                action: 'update'
                            });
                        } else {
                            exist.status = status;
                            exist.classroom_student_id = studentId;
                            exist.lesson_hour_id = lessonHourId;
                            exist.action = 'update';
                        }
                        console.log(students);
                        console.log(exist);
                    }

                    // let studentExists = false;
                    // students = students.map(student => {
                    //     if (student.classroom_student_id === studentId) {
                    //         studentExists = true;
                    //         return {
                    //             ...student,
                    //             lesson_hour_id: lessonHourId,
                    //             status: status,
                    //             action: 'update',
                    //             id: attendanceId
                    //         };
                    //     }
                    //     return student;
                    // });

                    // if (!studentExists) {
                    //     students.push({
                    //         classroom_student_id: studentId,
                    //         lesson_hour_id: lessonHourId,
                    //         status: status,
                    //         action: 'update',
                    //         id: attendanceId
                    //     });
                    // }
                });
            }


            if (attendance) {
                $attendanceElement = `
                    @forelse ($attendanceJournals as $attendanceJournal)
                        <tr class="old">
                            <td>
                                <select class="form-select select2 w-100" name="siswa">
                                    <option value="" selected disabled>Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ $attendanceJournal->classroomStudent->student_id == $student->id ? 'selected' : '' }}>{{ $student->student->user->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select select2 w-100" name="jam">
                                        <option value="" selected disabled>Pilih Jam</option>
                                    @foreach ($lessonHours as $lessonHour)
                                        <option value="{{ $lessonHour->id }}" {{ $attendanceJournal->lesson_hour_id == $lessonHour->id ? 'selected' : '' }}>{{ $lessonHour->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select select2 w-100" name="status">
                                    <option value="" selected disabled>Pilih Status</option>
                                    @foreach (AttendanceEnum::cases() as $status)
                                        <option value="{{ $status->value }}" {{ $status->value === $attendanceJournal->status->value ? 'selected' : '' }}>{{ ucfirst($status->label()) }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="delete-btn btn btn-rounded btn-danger p-1 ms-2 btn-rfid" data-attendance="{{ $attendanceJournal->id }}">
                                    <!-- SVG Icon -->
                                    Batalkan
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                `;

                $('#student-table tbody').append($attendanceElement);
                addDeleteListenner();
                checkUpdate();
            }

            $element = `
                    <tr class="new">
                        <td>
                            <select class="form-select select2 w-100" name="siswa">
                                <option value="" selected disabled>Pilih Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student->user->name }}</option>
                                @endforeach
                                </select>
                        </td>
                        <td>
                            <select class="form-select select2 w-100" name="jam">
                                    <option value="" selected disabled>Pilih Jam</option>
                                @foreach ($lessonHours as $lessonHour)
                                    <option value="{{ $lessonHour->id }}">{{ $lessonHour->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select select2 w-100" name="status">
                                <option value="" selected disabled>Pilih Status</option>
                                @foreach (AttendanceEnum::cases() as $status)
                                    @if ($status->value !== 'present')
                                        <option value="{{ $status->value }}" {{ $status->value === 'alpha' ? 'selected' : '' }}>{{ ucfirst($status->label()) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center">
                            <button type="button"delete-btn class="delete-btn btn btn-rounded btn-danger p-1 ms-2 btn-rfid">
                                <!-- SVG Icon -->
                                Batalkan
                            </button>
                        </td>
                    </tr>
                `;

            $('#student-add-btn').click(function() {
                $('#student-table tbody').append($element);
                $('.select2').select2({
                    dropdownParent: $('body') // Adjust as necessary
                });

                addDeleteListenner();
                checkUpdate();
            });

            $('#submit-btn').click(function() {

                $('#student-table tbody tr.new').each(function() {
                    var status = $(this).find('select[name="status"]').val();
                    var studentId = $(this).find('select[name="siswa"]').val();
                    var lessonHourId = $(this).find('select[name="jam"]').val();
                    students.push({
                        classroom_student_id: studentId,
                        lesson_hour_id: lessonHourId,
                        status: status,
                        active: 'create'
                    });
                });

                var urls;
                var method;


                if (journal) {
                    urls = `{{ route('teacher.journals.update', request()->lessonSchedule->id) }}`;
                    method = `PUT`;
                } else {
                    urls = `{{ route('teacher.journals.store', request()->lessonSchedule->id) }}`;
                    method = `POSt`;
                }

                console.log(students);

                $.ajax({
                    url: urls,
                    method: method,
                    data: {
                        _token: '{{ csrf_token() }}',
                        description: $('#description').val(),
                        date: $('#date').val(),
                        students: students
                    },
                    success: function(response) {
                        console.log(response);
                        toastr["success"](response.success)
                    },
                    error: function(xhr, message, error) {
                        let errorMessage = 'Terjadi kesalahan saat mengirim data';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }
                        toastr["error"](message);
                    }
                })

                // console.log(students);

                // console.log(
                //     $('#lesson_schedule_id').val()
                // );
                // console.log(
                //     $('#description').val(),
                //     // $('#date').val(),
                //     // students
                // )
            })
        });
    </script>
@endsection
