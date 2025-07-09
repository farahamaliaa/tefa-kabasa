<script>
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#modal-delete').modal('show');
        $('#form-delete').attr('action', `{{ route('school.lesson-schedule.destroy', '') }}/${id}`);
    })
</script>
