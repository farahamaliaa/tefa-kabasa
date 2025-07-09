<script>
    $(document).ready(function() {
        $('.select2-jenis').select2({
            dropdownParent: $('#violation-student-create'),
            placeholder: "Pilih Jenis Pelanggaran",
            allowClear: false // Disable the clear (X) button
        });

        $('.select2-siswa').select2({
            dropdownParent: $('#violation-student-create'),
            placeholder: "Pilih Nama Siswa",
            allowClear: false // Disable the clear (X) button
        });

        let counter = 0;

        // Function to initialize select2 on newly created elements
        function initializeSelect2() {
            $('.select2-jenis').select2({
                dropdownParent: $('#violation-student-create'),
                placeholder: "Pilih Jenis Pelanggaran",
                allowClear: false // Disable the clear (X) button
            });

            $('.select2-siswa').select2({
                dropdownParent: $('#violation-student-create'),
                placeholder: "Pilih Nama Siswa",
                allowClear: false // Disable the clear (X) button
            });
        }

        // Reinitialize select2 after adding a new item
        $(document).on('click', '[data-repeater-create]', function() {
            counter++;
            setTimeout(() => {
                const newItem = $('[data-repeater-item]').last();
                newItem.find('.select2-jenis').attr('id', 'select2-jenis-' + counter);
                newItem.find('.select2-siswa').attr('id', 'select2-siswa-' + counter);
                initializeSelect2();
            }, 0);
        });

        // Initialize select2 when the page is first loaded
        initializeSelect2();
    });
</script>
