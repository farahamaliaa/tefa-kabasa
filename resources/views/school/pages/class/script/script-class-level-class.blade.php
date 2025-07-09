<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#nav-tab a[data-bs-toggle="pill"]');
        const guruButtons = document.querySelectorAll('#guru-buttons');
        const pegawaiButtons = document.querySelectorAll('#pegawai-buttons');

        function updateButtons() {
            const activeTabId = document.querySelector('#nav-tab .nav-link.active').getAttribute('id');
            const isTeacherTabActive = activeTabId === 'teacher-tab';

            guruButtons.forEach(btn => btn.classList.toggle('d-none', !isTeacherTabActive));
            pegawaiButtons.forEach(btn => btn.classList.toggle('d-none', isTeacherTabActive));
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
                case '#employee-content':
                    tab = $('#employee-tab');
                    break;
                case '#teacher-content':
                    tab = $('#teacher-tab');
                    break;
                default:
                    tab = $('#teacher-tab');
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
            $('#teacher-tab').addClass('active');
            $('#teacher-content').addClass('active show');
        }
    });
</script>
