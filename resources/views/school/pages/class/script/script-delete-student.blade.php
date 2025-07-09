
<script>
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.students.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>

<script>
    $('#rfid-student').on('shown.bs.modal', function() {
        $('#rfid-input').focus();
    });
</script>