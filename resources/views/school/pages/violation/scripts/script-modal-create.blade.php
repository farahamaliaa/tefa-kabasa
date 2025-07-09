<script>
    $('.btn-create').click(function() {
        $('#form-create').attr('action', '{{ route('school.violation.store') }}');
        $('#modal-create-violation').modal('show');
    });
</script>
