<?php session_start();
include ('connectdb.php');

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="icon" href="img/icon.png">
    <meta charset="UTF-8">
    <title>Azamon</title>
    <!--==============================menu=================================-->
    <ul>
        <li><a>Genre</a>
            <ul>
                <li><a href="biography.php">Biography</a></li>
                <li><a href="philosophy.php">Philosophy</a></li>
                <li><a href="self-improvement.php">Self-Improvement</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="science.php">Science</a></li>
                <li><a href="novel.php"> Novel</a></li>
                <li><a href="horror.php">Horror</a></li>
                <li><a href="detective.php">Detective</a></li>
                <li><a href="science-fiction.php">Science-Fiction</a></li>
                <li><a href="education.php">Education</a></li>
                <li><a href="comic-book.php">Comic-Book</a></li>

            </ul>
        </li>
        <li><a href="author.php">Authors</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <div style="float:right; margin-top:40px;margin-right: 50px"><a href="login.php" >
            <?php
            if (!isset($_SESSION['admin']) and !isset($_SESSION['user'])) {
                echo "Log-in";
            }
            ?></a></div>
    <div style="float:right; margin-top:40px;margin-right: 10px"><a href="logout.php" > <?php
            if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {
                echo "Log-out";
            }
            ?></a></div>

    <div style="float:right; margin-top:40px;margin-right: 50px"><a href="signup.php"> <?php
            if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {
                echo "Sign-up";
            }
            ?></a></div>
    <div style="float: left; margin-left: 50px;margin-top: 25px"><a href="index.php" ><img src="img/azamon.jpg" width="200px" height="60px"></a></div>
    <div class="search-container">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="Search Book, Author or Genre">
        </form>
    </div>
    <div style="float: left; margin-top: 40px; margin-left:100px">
        <?php
        if (isset($_SESSION['user'])) {
            echo "Welcome:  ";
            echo "<span style='color: #4CAF50'>".$_SESSION['user']."</span>";
        }
        elseif (isset($_SESSION['admin'])) {
            echo "Welcome:  ";
            echo "<span style='color: #4CAF50'>".$_SESSION['admin']."</span>";
            echo '<div ><a href="user.php">User-List</a><a href="upload.php"> -- Ad-Book</a><a href="book-list.php"> -- Book List</a> </div>';
        }
        else {
            echo "Welcome, user";
        }
        ?>
    </div>
    <?php if (isset($_SESSION['user']) or (isset($_SESSION['admin'])) ) {?>
    <div style="float: right; margin-right: 20px;margin-top: 30px ">
        <a href="cart.php"><img src="img/basket.png" width="50" height="50" alt="basket"></a>
    </div>
    <?php
    }
    else { ?>
        <div style="float: right; margin-right: 80px;margin-top: 30px ">
            <a href="login.php"><img src="img/basket.png" width="50" height="50" alt="basket"></a>
        </div>
    <?php
    }
    ?>
    <br><br><br><br><br>
</head>
<body>