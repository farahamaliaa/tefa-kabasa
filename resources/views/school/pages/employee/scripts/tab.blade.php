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

        changeTab(); // Initialize the correct tab on page load
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#nav-tab a[data-bs-toggle="pill"]');
        var guruButtons = document.querySelectorAll('.guru-buttons');
        var pegawaiButtons = document.querySelectorAll('.pegawai-buttons');

        function updateButtons() {
            var activeTab = document.querySelector('#nav-tab .nav-link.active').getAttribute('id');
            if (activeTab === 'teacher-tab') {
                guruButtons.forEach(btn => btn.classList.remove('d-none'));
                pegawaiButtons.forEach(btn => btn.classList.add('d-none'));
            } else if (activeTab === 'employee-tab') {
                guruButtons.forEach(btn => btn.classList.add('d-none'));
                pegawaiButtons.forEach(btn => btn.classList.remove('d-none'));
            }
        }

        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', updateButtons);
        });

        updateButtons();
    });
</script>