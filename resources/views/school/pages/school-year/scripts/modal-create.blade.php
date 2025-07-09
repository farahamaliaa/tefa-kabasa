<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek session flash dan kesalahan untuk modal create
        const showCreateModal = @json(session('showCreateModal'));
        const showEditModal = @json(session('showEditModal'));

        if (showCreateModal) {
            var createModalErrors = document.querySelectorAll('.error-create');
            if (createModalErrors.length > 0) {
                var createModalElement = new bootstrap.Modal(document.getElementById('modal-create-school-year'));
                createModalElement.show();
            }
        }

        // Cek session flash dan kesalahan untuk modal edit
        if (showEditModal) {
            var editModalErrors = document.querySelectorAll('.error-edit');
            if (editModalErrors.length > 0) {
                var editModalElement = new bootstrap.Modal(document.getElementById('modal-update-school-year'));
                editModalElement.show();
            }
        }
    });
</script>