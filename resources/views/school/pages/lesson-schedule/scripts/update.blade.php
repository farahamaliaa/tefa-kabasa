<script>
    $('.btn-edit').click(function() {
        var day = $(this).data('day');
        var id = $(this).data('id');
        var subject = $(this).data('subject');
        var teacher = $(this).data('teacher');
        var start = $(this).data('start');
        var end = $(this).data('end');

        $('#modal-update').modal('show');
        $('#subject').val(subject).trigger('change');
        $('#employee_id').val(teacher).trigger('change');

        var lessonHours = @json($lessonHourUpdates);
        var options = '<option value="" selected disabled>Pilih Jam Mulai</option>';
        var optionsEnd = '<option value="" selected disabled>Pilih Jam Berakhir</option>';

        if (lessonHours[day]) {
            lessonHours[day].forEach(function(lessonHour) {
                options += `<option value="${lessonHour.id}">${lessonHour.name}</option>`;
            });
        }

        if (lessonHours[day]) {
            lessonHours[day].forEach(function(lessonHour) {
                optionsEnd += `<option value="${lessonHour.id}">${lessonHour.name}</option>`;
            });
        }

        $('.lesson_hour_start').html(options).val(start).trigger('change');
        $('.lesson_hour_end').html(optionsEnd).val(end).trigger('change');

        $('#form-update').attr('action', `{{ route('school.lesson-schedule.update', '') }}/${id}`);
    })

    $('.subject-update').change(function() {
        var id = $(this).val();
        getTeacherUpdate(id);
    })

    function getTeacherUpdate(id) {
        $.ajax({
            url: "/school/teacher-subject/" + id,
            method: "GET",
            data: {
                subject_id: id
            },
            dataType: "JSON",
            beforeSend: function() {
                $('#employee_id').html('')
            },
            success: function(response) {
                $.each(response.data, function(index, data) {
                    $('#employee_id').append('<option value="' + data.employee_id + '">' + data.employee.user.name + '</option>')
                });
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
