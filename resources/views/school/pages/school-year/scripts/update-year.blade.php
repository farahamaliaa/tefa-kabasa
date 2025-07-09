<script>
    $('.btn-update-year').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');

        var years = name.split('/');
        var startYear = years[0];
        var endYear = years[1];

        $('#update-start-year').val(startYear).trigger('change');
        $('#update-end-year').val(endYear).trigger('change');
        $('#form-update').attr('action', '{{ route('school.school-years.update', '') }}/' + id);
        $('#modal-update-school-year').modal('show');
    });
</script>
