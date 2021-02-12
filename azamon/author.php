<?php
include ('templates/header.php');

if (!isset($_GET['author'])) {



$author = mysqli_query($conn, "SELECT * FROM author");

while ($author_row = mysqli_fetch_array($author)) {
       $author_row2 = $author_row['author_name'];




    $query =mysqli_query($conn,"SELECT * FROM book where book_author='$author_row2'" ) ;
    $query_row = mysqli_fetch_array($query) ;



    echo "<style>img {
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
}</style>";

    echo "<div class='container'>";
    echo "<a href='author.php?author=book&book_author={$query_row['book_author']}'><img src='author/".$author_row['author_img']."' alt='".$query_row['book_author']."' class='image'></a>";
    echo "<div class='book'>".$query_row['book_author']."</div>";
    echo "</div>";

}
}
else {

    $bookauthor = $_GET['book_author'];

    $result = mysqli_query($conn, "SELECT * FROM book where book_author='$bookauthor'");
    include ("book_list.php");
}
?>
<?php include ('templates/footer.php') ?>