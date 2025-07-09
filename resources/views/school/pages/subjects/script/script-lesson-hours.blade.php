
<script>
    $('.btn-create').click(function() {
        var id = $(this).data('id');
        var start = $(this).data('start');
        var day = $(this).data('day');
        var name = $(this).data('name');

        if (!id || !start || !day || !name) {
            $('#store-name').val('');
            $('#store-start').val('07:00');
            $('#modal-create').modal('show');
            $('#form-create').attr('action', `{{ route('school.lesson-hours.store', '') }}/${day}`);
        } else {
            if (name != 'Istirahat') {
                var extractedNumber = name.match(/\d+/)[0];
                $('#store-name').val(extractedNumber).trigger('change');
            }

            $('#store-start').val(start);
            $('#modal-create').modal('show');
            $('#form-create').attr('action', `{{ route('school.lesson-hours.store', '') }}/${day}`);
        }
    })

    $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var start = $(this).data('start');
        var end = $(this).data('end');
        var name = $(this).data('name');

        // get hour number
        const matches = name.match(/\d+/);
        const hour = matches ? matches[0] : null;

        $('#name').val(hour);
        $('#start').val(start);
        $('#end').val(end);
        $('#modal-update').modal('show');
        $('#form-update').attr('action', `{{ route('school.lesson-hours.update', '') }}/${id}`);
    })

    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#modal-delete').modal('show');
        $('#form-delete').attr('action', `{{ route('school.lesson-hours.destroy', '') }}/${id}`);
    })

</script>
