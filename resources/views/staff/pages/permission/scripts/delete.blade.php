<script>
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', `{{ route('employee.delete.permission', '') }}/${id}`);
        $('#modal-delete').modal('show');
    });
</script>
