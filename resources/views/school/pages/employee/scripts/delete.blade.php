{{-- handle delete teacher --}}
<script>
    $('.btn-delete-teacher').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/teacher/' + id);
        $('#modal-delete').modal('show');
    });
</script>

{{-- handle delete staff --}}
<script>
    $('.btn-delete-staff').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/staff/' + id);
        $('#modal-delete').modal('show');
    });
</script>