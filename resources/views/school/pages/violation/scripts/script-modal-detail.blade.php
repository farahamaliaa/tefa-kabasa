<script>
    $('.btn-detail').click(function() {
        var violation = $(this).data('violation');
        var point = $(this).data('point');

        $('#violation-detail').text(violation);
        $('#point-detail').text('+ ' + point + ' Point');
        $('#modal-detail').modal('show');
    });
</script>
