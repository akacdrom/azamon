<?php
include ('templates/header.php');
$bookid = $_GET['book_id'];
$result = mysqli_query($conn, "SELECT * FROM book where book_id='$bookid'");
include('book_list.php');
$row = mysqli_fetch_array($result);

echo "<div style='float: left; margin-left: 50px'><h1>".$row['book_name']."</h1>";
if (isset($_SESSION['admin'])) {
    echo "<h3 style='display: inline'><a style='color: #ff1616;' href='update-book.php?id=".$row['book_id']."'>===>Update Book Info<===</a></h3>";
}
echo "</div><br><br><br><br><br>";
echo "<img  src='book/".$row['book_img']."' alt='".$row['book_name']."' class='image2'>";
echo "<h2 style='display: inline'>Book Author:</h2><h2 style='display: inline'> <a  style='color: #4CAF50' href='author.php?author=book&book_author={$row['book_author']}'> ".$row['book_author']."</a></h2>


<div style='float: right; margin-right: 50px'>
<button book-id='".$row['book_id']."' type='submit' style='width:250px' class='btn'>Add to Cart</button>
</div>



<br><br>";
echo "<h2 style='display: inline; '>Book Genre: </h2><h2 style='display: inline'> <a style='color: #f39c12' href='".strtolower($row['book_genre']).".php'> ".$row['book_genre']."</a></h2><br><br>";
echo "<h2 style='display: inline'>Book Price: </h2><h2 style='color: #ff1616;display: inline'>" .$row['book_price']." ZŁ</h2><br><br>";
echo "<h2 style='display: inline'>Book Description:</h2><br><br>
<table style='margin-right: 100px; margin-top: 10px;border-radius: 25px;border: 2px solid #6098d0;'><tr><td><p style='font-size: large;'> " .$row['book_descr']."</p></td></tr></table>";


include ('templates/footer.php');
?>
