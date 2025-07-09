<script>
    $('.btn-detail').click(function() {
        let name = $(this).data('name');
        let employee = $(this).data('employee');
        let classroom = $(this).data('classroom');
        let violation = $(this).data('violation');
        let date = $(this).data('date');

        $('#detail-student-name').text(name);
        $('#detail-student-employee').text(employee);
        $('#detail-student-classroom').text(classroom);
        $('#detail-student-violation').text(violation);
        $('#detail-violation-date').text(date);
        $('#detail-violation-student').modal('show');
    });
</script>
