$(document).ready(function() {
    $('#example').DataTable({
        "ajax": '../controller/userTable.php',
        // "ajax": window.location.href = "../templates/user-profile.html"
    });
});