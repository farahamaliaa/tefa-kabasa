<script>
    $(document).ready(function() {
        $('.btn-create').on('click', function() {
            var id = $(this).data('id');
            var clock = $(this).data('clock');
            var teacher_name = $(this).data('teacher_name');
            var teacher_email = $(this).data('teacher_email');
            var is_teacher_present = $(this).data('is_teacher_present');
            var summary = $(this).data('summary');
            var lesson = $(this).data('lesson');
            $('#clock-detail').text(clock);
            $('#teacher_name-detail').text(teacher_name);
            $('#teacher_email-detail').text(teacher_email);
            $('#lesson-detail').text(lesson);
            $('#is_teacher_present-detail').val(is_teacher_present).trigger('change');
            $('#summary-detail').text(summary);
            
            $('#all_is_teacher_present-detail').text(is_teacher_present == '1' ? 'Masuk' : (is_teacher_present == '0' ? 'Tidak Masuk' : 'Tidak ada tanggapan'));
            $('#all_summary-detail').text(summary == '' ? 'Tidak ada tanggapan' : summary);

            var form = $('#form-create');
            var submitButton = $('#submit-button');

            if (summary == '') {
                form.attr('action', `{{ route('student.feedback.store', '') }}/${id}`);
                form.attr('method', 'POST');
                submitButton.text('Tambah');
            } else {
                form.attr('action', `{{ route('student.feedback.update', '') }}/${id}`);
                form.append('@method("put")');
                submitButton.text('Edit');
            }

            console.log(id, clock, teacher_name, teacher_email, is_teacher_present, summary);
            $('#modal-create').modal('show');
        });
    });
</script>
