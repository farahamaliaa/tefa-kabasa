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
                case '#pills-alumni':
                    tab = $('#pills-alumni-tab');
                    break;
                case '#pills-student':
                default:
                    tab = $('#pills-student-tab');
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

        changeTab();
        $('.nav-link').on('shown.bs.tab', function() {
            storeActiveTab();
        });

        var storedTab = localStorage.getItem('activeTab');
        if (storedTab) {
            window.location.hash = storedTab;
        } else {
            $('#pills-student-tab').addClass('active');
            $('#pills-student').addClass('active show');
        }
    });
</script>
