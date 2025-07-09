<script>
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', `{{ route('school.extracurricular.destroy', '') }}/${id}`);
        $('#modal-delete').modal('show');
    });
</script>
