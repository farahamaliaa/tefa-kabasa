<script>
    $(document).ready(function() {
        $(".custom-carousel").owlCarousel({
            loop: true,
            margin: 15,
            nav: false,  
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
