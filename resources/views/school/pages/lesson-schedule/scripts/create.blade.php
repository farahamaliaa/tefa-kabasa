<script>
    $('.btn-create').click(function() {
        var classroom = $(this).data('classroom');
        var day = $(this).data('day');
        $('#modal-create').modal('show');
        $('#form-create').attr('action',
            `{{ route('school.lesson-schedule.store', ['classroom' => ':classroom', 'day' => ':day']) }}`
            .replace(':classroom', classroom).replace(':day', day));

        var lessonHours = @json($lessonHours);
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

        $('#jamStart').html(options);
        $('#jamEnd').html(optionsEnd);
    })

    $('.subject').change(function() {
        var id = $(this).val();
        getTeacher(id);
    })

    function getTeacher(id) {
        $.ajax({
            url: "/school/teacher-subject/" + id,
            method: "GET",
            data: {
                subject_id: id
            },
            dataType: "JSON",
            beforeSend: function() {
                $('#pengajar').html('')
            },
            success: function(response) {
                $.each(response.data, function(index, data) {
                    $('#pengajar').append('<option value="' + data.employee_id + '">' + data.employee.user.name + '</option>')
                });
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
