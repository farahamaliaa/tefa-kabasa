<script>
    document.getElementById('status').addEventListener('change', function() {
        var instansiContainer = document.getElementById('instansi-container');
        if (this.value === 'negeri' || this.value === 'swasta') {
            instansiContainer.style.display = 'block';
        } else {
            instansiContainer.style.display = 'none';
        }
    });
</script>

<script>
    var today = new Date();
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = today.toLocaleDateString('id-ID', options);
    document.getElementById("currentDate").innerHTML += formattedDate;
</script>

<script>
    var today = new Date();
    var year = today.getFullYear();
    var month = String(today.getMonth() + 1).padStart(2, '0');
    var day = String(today.getDate()).padStart(2, '0');
    var hours = String(today.getHours()).padStart(2, '0');
    var minutes = String(today.getMinutes()).padStart(2, '0');
    var seconds = String(today.getSeconds()).padStart(2, '0');

    var formattedDate = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

    document.getElementById("currentDateInput").value = formattedDate;

</script>
