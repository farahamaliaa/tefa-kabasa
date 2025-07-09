<script>
    $(document).ready(function() {
        function resetActiveTab() {
            $('.nav-link').removeClass('active');
            $('.tab-pane').removeClass('active show');
        }

        function changeTab() {
            var hash = window.location.hash;
            resetActiveTab();
            var tab = null;
            switch (hash) {
                case '#pills-detail':
                    tab = $('#pills-detail-tab');
                    break;
                default:
                    tab = $('#pills-keseluruhan-tab');
                    break;
            }
            tab.addClass('active');
            $(tab.attr('href')).addClass('active show');
        }

        function storeActiveTab() {
            var activeTab = $('.nav-link.active').attr('href');
            localStorage.setItem('activeTab', activeTab);
        }

        $(window).on('hashchange', function() {
            changeTab();
            storeActiveTab();
        });

        $('.nav-link').on('shown.bs.tab', function() {
            storeActiveTab();
        });

        var storedTab = localStorage.getItem('activeTab');
        if (storedTab) {
            window.location.hash = storedTab;
        } else {
            $('#pills-keseluruhan-tab').addClass('active');
            $('#pills-keseluruhan').addClass('active show');
        }

        changeTab();
    });
</script>
