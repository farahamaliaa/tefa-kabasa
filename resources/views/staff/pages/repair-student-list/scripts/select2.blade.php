{{-- <script>
    $(document).ready(function() {
        $('.select2-siswa-remidial').select2({
            dropdownParent: $('#modal-create-remidial')
        });

        $('.select2-violation').select2({
            dropdownParent: $('#modal-create-remidial')
        });

        $('.select2-point').select2({
            dropdownParent: $('#modal-create-remidial')
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        // Fungsi untuk menginisialisasi select2 dengan kunci unik
        function initializeSelect2() {
            $('.select2-siswa-remidial').each(function(index, element) {
                $(element).select2({
                    dropdownParent: $('#modal-create-remidial')
                });
            });

            $('.select2-violation').each(function(index, element) {
                $(element).select2({
                    dropdownParent: $('#modal-create-remidial')
                });
            });

            $('.select2-point').each(function(index, element) {
                $(element).select2({
                    dropdownParent: $('#modal-create-remidial')
                });
            });
        }

        // Inisialisasi select2 untuk elemen yang sudah ada
        initializeSelect2();

        // Reinisialisasi select2 ketika item repeater baru ditambahkan
        $('[data-repeater-create]').on('click', function() {
            setTimeout(function() {
                // Tambahkan kunci unik pada elemen select2
                $('[data-repeater-item]').last().find('.select2').each(function(index, element) {
                    $(element).attr('id', $(element).attr('id') + '-' + Date.now());
                });
                initializeSelect2();
            }, 100);
        });
    });
</script>