<script>
    $(document).ready(function() {
        function handleTabChange() {
            var activeTab = $('.nav-link.active').attr('href');

            if (activeTab === '#student') {
                $('#tambah-perbaikan').addClass('d-none');
                $('#tambah-pelanggaran').removeClass('d-none');
            } else if (activeTab === '#class') {
                $('#tambah-perbaikan').removeClass('d-none');
                $('#tambah-pelanggaran').addClass('d-none');
            }
        }

        handleTabChange();

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            handleTabChange();
        });
    });
</script>
