<script>
    $('.btn-detail-violation').click(function() {
        let name = $(this).data('name');
        let classroom = $(this).data('classroom');
        let violation = $(this).data('violation');
        let date = $(this).data('date');
        let employee = $(this).data('employee');

        $('#detail-student-name').text(name);
        $('#detail-student-classroom').text(classroom);
        $('#detail-student-violation').text(violation);
        $('#detail-violation-date').text(date);
        $('#detail-employee-name').text(employee);
        $('#violation-detail').modal('show');
    });
</script>
