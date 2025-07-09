<script>
    $(document).ready(function() {
        $('.btn-detail').on('click', function() {
            var name = $(this).data('name');
            var username = $(this).data('username');
            var nik = $(this).data('nik');
            var phone_number = $(this).data('phone-number');
            var health_center = $(this).data('health-center');
            var address = $(this).data('address');
            $('#username-detail').text(username);
            $('#name-detail').text(name);
            $('#nik-detail').text(nik);
            $('#health-center-detail').text(health_center);
            $('#phone-number-detail').text(phone_number);
            $('#address-detail').text(address);
            $('#modal-detail').modal('show');
        });
    });
</script>
