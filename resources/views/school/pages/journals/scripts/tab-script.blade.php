<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#nav-tab a[data-bs-toggle="pill"]');

        function updateButtons() {
            const activeTabId = document.querySelector('#nav-tab .nav-link.active').getAttribute('id');
            const isTeacherTabActive = activeTabId === 'all-tab';
        }

        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', updateButtons);
        });

        updateButtons();
    });
</script>

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
                case '#all-content':
                    tab = $('#all-tab');
                    break;
                case '#fill-content':
                    tab = $('#fill-tab');
                    break;
                case '#notfill-content':
                    tab = $('#notfill-tab');
                    break;
                default:
                    tab = $('#all-tab');
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

        changeTab(); // Initialize the correct tab on page load

        $('.nav-link').on('shown.bs.tab', function() {
            storeActiveTab();
        });

        var storedTab = localStorage.getItem('activeTab');
        if (storedTab) {
            window.location.hash = storedTab;
        } else {
            $('#all-tab').addClass('active');
            $('#all-content').addClass('active show');
        }
    });
</script>
