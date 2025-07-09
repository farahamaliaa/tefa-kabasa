<script>
    $('.btn-create-violation').on('click', function() {
        var id = $(this).data('id');
        console.log(id);
        $('#form-post-violation').attr('action', '{{ route('employee.violation.single.student-violation', '') }}/' + id);
        $('#modal-violation').modal('show');
    });

    $('.btn-create-repair').on('click', function() {
        var id = $(this).data('id');
        $('#form-post-repair').attr('action', '{{ route('employee.violation.single.student-repair', '') }}/' + id);
        $('#modal-repair').modal('show');
    });
</script>
