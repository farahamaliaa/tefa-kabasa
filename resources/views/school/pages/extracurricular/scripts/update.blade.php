<script>
    $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var employee = $(this).data('employee');
        $('#name-update').val(name);
        $('#employee-update').val(employee).trigger('change');
        $('#form-update').attr('action', `{{ route('school.extracurricular.update', '') }}/${id}`);
        $('#modal-edit').modal('show');
    });
</script>
