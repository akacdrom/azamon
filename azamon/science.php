<?php
include('templates/header.php');
?>

<?php
$result = mysqli_query($conn, "SELECT * FROM book WHERE book_genre='science' ORDER BY book_id DESC");

include ('book_list.php');
?>


<?php include('templates/footer.php') ?>