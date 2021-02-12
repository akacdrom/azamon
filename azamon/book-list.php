<?php
include ('templates/header.php');
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?>
    <style type="text/css">
        table{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;

        }
        tr {
            border: 1px solid #dddddd;
        }
        td {
            text-align: center;
            padding: 8px;

        }

        th {

            padding-top: 12px;
            padding-bottom: 12px;
            background-color: black;
            color: white;
            text-align: center;
        }

        tr:hover {background-color: #1c427f;}

    </style>
<?php
$sql = "SELECT * FROM book";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<h1 align='center'>You can click the books for change the book information</h1>";
        echo "<table align='center'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Img</th>";
        echo "<th>Name</th>";
        echo "<th>Author</th>";
        echo "<th>Genre</th>";
        echo "<th>Price</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'> " . $row['book_id'] . "</a></td>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'> <img src=\"book/".$row['book_img']."\" width=\"90\" height=\"130\"></a></td>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'>" . $row['book_name'] . "</a></td>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'>" . $row['book_author'] . "</a></td>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'>" . $row['book_genre'] . "</a></td>";
            echo "<td><a href='update-book.php?id=".$row['book_id']."'>" . $row['book_price'] . "</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


include ('templates/footer.php');
?>