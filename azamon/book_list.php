<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
if (!isset($_GET['book'])) {
while ($row = mysqli_fetch_array($result)) {
echo "<div class='container'>";
    echo "<a href='books.php?book=book&book_id={$row['book_id']}'><img src='book/".$row['book_img']."' alt='".$row['book_name']."' class='image'></a>";
    echo "<div class='book'>".$row['book_name']." <br>".$row['book_price']." zł</div>";
    echo "<div class='author'>".$row['book_author']."</div>";
    ?>
    <div class='price' >
        <button book-id="<?php echo $row['book_id']; ?>" type='submit' name='' class="btn" value="">Add to Cart</button>
    </div>
    <?php

    echo "</div>";
}
}

?>
<script>
   $(document).ready(function () {
    $(".btn").click(function () {

        var url = "http://localhost/azamon/cart_db.php";
        var data = {
            p : "btn",
            book_id : $(this).attr("book-id")
        }
        $.post(url,data, function (response) {
            alert("Book has been added to your cart !");
        })
    })
   })
</script>