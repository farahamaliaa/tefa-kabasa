<script>
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.delete-access.violation', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>
