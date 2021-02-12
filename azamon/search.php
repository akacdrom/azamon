<?php
include ('templates/header.php');
if (isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $result = mysqli_query($conn, "SELECT * FROM book WHERE book_name LIKE '%$searchq%' OR book_author LIKE '%$searchq%' OR book_genre LIKE '%$searchq%'");
    $count = mysqli_num_rows($result);
    if ($count ==0) {
        echo "<br><br><div style='text-align: center; font-size: 30px'>There is no search result :((</div>";
    }
    else {
        include ("book_list.php");
    }

}
include ('templates/footer.php');
?>