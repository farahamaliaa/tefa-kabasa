<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showCreateModal = @json(session('showCreateModal'));
        const showEditModal = @json(session('showEditModal'));

        if (showCreateModal) {
            var createModalErrors = document.querySelectorAll('.error-create');
            if (createModalErrors.length > 0) {
                var createModalElement = new bootstrap.Modal(document.getElementById('create-student'));
                createModalElement.show();
            }
        }

        if (showEditModal) {
            var editModalErrors = document.querySelectorAll('.error-edit');
            if (editModalErrors.length > 0) {
                var editModalElement = new bootstrap.Modal(document.getElementById('update-student'));
                editModalElement.show();
            }
        }
    });
</script>