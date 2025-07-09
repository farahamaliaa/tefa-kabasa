<script>
    $('.btn-update-level').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#name-level').val(name);
        $('#form-update-level').attr('action', '{{ route('school.level-class.update', '') }}/' + id);
        $('#update-level').modal('show');
    });

    $('.btn-update-classroom').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var employee = $(this).data('employee');
        var level = $(this).data('level');
        $('#name-edit').val(name);
        $('#employee-edit').val(employee).trigger('change');
        $('#class-level').val(level).trigger('change');
        $('#edit-class-form').attr('action', '{{ route('school.classroom.update', '') }}/' + id);
        $('#update-class').modal('show');
    });

    $('.btn-delete-level').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.level-class.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });

    $('.btn-delete-class').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.classroom.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>