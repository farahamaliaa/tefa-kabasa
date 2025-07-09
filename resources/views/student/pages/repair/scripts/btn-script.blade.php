<script>
    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var employee = $(this).data('employee');
        var student = $(this).data('student');
        var repair = $(this).data('repair');
        var point = $(this).data('point');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        var proof = $(this).data('proof');        

        $('#employee-detail').text(employee);
        $('#student-detail').text(student);
        $('#repair-detail').text(repair);
        $('#point-detail').text(point + ' Point');
        $('#start_date-detail').text(start_date);
        $('#end_date-detail').text(end_date);
        $('#proof-detail').attr('src', proof);


        $('#repair-list-detail').modal('show');
    });

    $('.btn-upload').click(function() {
        var id = $(this).data('id');
        var employee = $(this).data('employee');
        var student = $(this).data('student');
        var repair = $(this).data('repair');
        var point = $(this).data('point');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        $('#employee-upload').text(employee);
        $('#student-upload').text(student);
        $('#repair-upload').text(repair);
        $('#point-upload').text(point + ' Point');
        $('#start_date-upload').text(start_date);
        $('#end_date-upload').text(end_date);

        $('#form-upload').attr('action', `{{ route('student.repairs.update', '') }}/${id}`);
        $('#repair-upload-detail').modal('show');
    });
</script>
