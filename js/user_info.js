$(document).ready(function() {
    $('#contacto').DataTable({
        "ajax": '../controller/user_info.php',
        "paging": false,
        "ordering": false,
        "info": false,
        "filter": false
    });
});