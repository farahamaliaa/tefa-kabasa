<script>
    $('.btn-detail-violation').click(function() {
        var date = $(this).data('date');
        var violation = $(this).data('violation');
        var point = $(this).data('point');

        $('#date-detail').text(date);
        $('#violation-detail').text(violation);
        $('#point-detail').text(point);

        $('#violation-student-detail').modal('show');
    });

    $('.btn-detail-repair').click(function() {
        var name = $(this).data('name');
        var point = $(this).data('point');
        var approved = $(this).data('approved');
        var proof = $(this).data('proof');
        var date = $(this).data('date')

        $('#name-detail').text(name);
        $('#point-detail-repair').text('- ' + point + ' Point');
        $('#approved-detail').text(approved);
        $('#proof-detail').attr('src', proof);
        $('#date-detail-repair').text(date);

        $('#repair-student-detail').modal('show');
    });
</script>
