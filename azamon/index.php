<?php
include ('templates/header.php');
?>
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <a href="index.jjpg"><img src="img/banner1.jpg" style="width:100%"></a>
        <div class="text">Caption One</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img/banner2.jpg" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img/banner3.png" style="width:100%">
        <div class="text">Caption Three</div>
    </div>

</div>
<script src="js/slider.js"></script>
<?php
$result = mysqli_query($conn, "SELECT * FROM book ORDER BY book_id DESC");
include ('book_list.php');
?>



<?php include ('templates/footer.php') ?>


