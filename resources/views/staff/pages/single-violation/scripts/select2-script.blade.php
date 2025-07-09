<script>
    $(document).ready(function() {
        $('.select2-create').select2({
            dropdownParent: $('#modal-violation')
        });
        $('.category-dropdown').on('hide.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'auto');
        });
    });
</script>
