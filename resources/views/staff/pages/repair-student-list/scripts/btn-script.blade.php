<script>
    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var student = $(this).data('student');
        var classroom = $(this).data('classroom');
        var gender = $(this).data('gender');
        var employee = $(this).data('employee');
        var repair = $(this).data('repair');
        var proof = $(this).data('proof');
        var is_approved = $(this).data('is_approved');
        var date = $(this).data('date');

        $('#student-detail').text(student);
        $('#classroom-detail').text(classroom);
        $('#gender-detail').text(gender);
        $('#employee-detail').text(employee);
        $('#repair-detail').text(repair);
        $('#proof-detail').attr('src', proof);
        $('#is_approved-detail').text(is_approved);
        $('#date-detail').attr('src', date);
        $('.btn-reject').data('id', id);

        $('#modal-detail-remidial').modal('show');
    });

    $('.btn-confirm').click(function() {
        var id = $(this).data('id');
        var student = $(this).data('student');
        var employee = $(this).data('employee');
        var repair = $(this).data('repair');
        var proof = $(this).data('proof');
        var point = $(this).data('point');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');

        $('#student-confirm').text(student);
        $('#employee-confirm').text(employee);
        $('#repair-confirm').text(repair);
        $('#point-confirm').text(point + ' Point');
        $('#proof-confirm').attr('src', proof);
        $('#start_date-confirm').text(start_date);
        $('#end_date-confirm').text(end_date);
        $('.btn-reject').data('id', id);

        $('#form-confirm').attr('action', '{{ route('employee.violation.student-repair.approved', '') }}/' + id);
        $('#modal-waiting-confirmation').modal('show');
    });

    $('.btn-reject').click(function() {
        var id = $(this).data('id');
        $('#form-confirm').attr('action', '{{ route('employee.violation.student-repair.reject', '') }}/' + id);
    });
</script>
