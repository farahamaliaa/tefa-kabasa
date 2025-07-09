<script>
    $('.btn-upload').click(function() {
        var id = $(this).data('id');
        $('#form-upload').attr('action', `{{ route('school.student.upload.proof', '') }}/${id}`);
        $('#modal-import').modal('show');
    });
</script>