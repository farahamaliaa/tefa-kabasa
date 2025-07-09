<script>
    $('.btn-delete-year').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.school-years.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>
