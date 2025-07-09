<script>
    $('.btn-detail').on('click', function() {
        var name = $(this).data('name');
        var classroom = $(this).data('classroom');
        var is_teacher_present = $(this).data('is_teacher_present');
        var summary = $(this).data('summary');
        $('#name-detail').text(name);
        $('#classroom-detail').text(classroom);
        $('#is_teacher_present-detail').text(is_teacher_present == '1' ? 'Masuk' : 'Tidak Masuk');
        $('#summary-detail').text(summary);

        $('#modal-detail').modal('show');
    });

</script>
