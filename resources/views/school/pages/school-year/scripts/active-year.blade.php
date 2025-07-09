<script>
    $('.activated-btn').click(function() {
        var id = $(this).data('id');
        $('#active-school-year-form').attr('action', '{{ route('school.school-year.setActive', ':id') }}'
            .replace(':id', id));
        $('#modal-confirm-active').modal('show');
    });
</script>
