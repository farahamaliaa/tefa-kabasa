<script>
    $('.btn-update').click(function() {
        var id = $(this).data('id');
        var violation = $(this).data('violation');
        var point = $(this).data('point');

        $('#violation-edit').val(violation);
        $('#point-edit').val(point);

        $('#form-update').attr('action', '{{ route('school.violation.update', '') }}/' + id);
        $('#modal-update-violation').modal('show');
    });
</script>
