<script>
    $(document).ready(function() {
        // Handle move to right
        $('#move-to-right').click(function() {
            $('#left-table tbody tr').each(function() {
                if ($(this).find('.form-check-input').is(':checked')) {
                    $(this).find('.form-check-input').prop('checked', false);
                    $('#right-table tbody').append($(this));
                }
            });
        });

        // Handle move to left
        $('#move-to-left').click(function() {
            $('#right-table tbody tr').each(function() {
                if ($(this).find('.form-check-input').is(':checked')) {
                    $(this).find('.form-check-input').prop('checked', false);
                    $('#left-table tbody').append($(this));
                }
            });
        });

        // Handle save button
        $('#save-button').click(function() {
            var addStudents = [];
            var removeStudents = [];

            $('.empty-tr').remove();
            $('#right-table tbody tr').each(function() {
                addStudents.push($(this).data('id'));
            });

            $('#left-table tbody tr').each(function() {
                removeStudents.push($(this).data('id'));
            });

            $('#add-students').val(addStudents.join(','));
            $('#remove-students').val(removeStudents.join(','));

            $('#save-form').submit();
        });
    });
</script>