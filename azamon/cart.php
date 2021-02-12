<?php
include ('templates/header.php');
if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {
    header('Location:index.php');
}

if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION['shoppingCart'];
        $total_count = $shoppingCart['summary']['total_count'];
        $total_price = $shoppingCart['summary']['total_price'];
        $shopping_products = $shoppingCart['books'];

}else {
    $total_price = 0;
    $total_count = 0;
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

    <?php if ($total_count > 0) { ?>
    <h2 align="center">You have <span style="color: #4CAF50"><?php echo $total_count; ?></span> book in your cart.</h2>

    <?php
    } else {
       echo " <h2 align='center'>You have no book in your cart.</h2>";
       die();
}
    ?>
    <table align="center">
        <tr>
            <th>Book Image</th>
            <th>Book Name</th>
            <th>Book Genre</th>
            <th>Number of Books</th>
            <th>Book Price</th>
            <th>Total Price</th>
        </tr>
        <?php foreach ($shopping_products as $book) { ?>
            <tr>
                <td width="120" ><img src="book/<?php echo $book['book_img'] ?>" width="90" height="130"></td>
                <td width="300" ><?php echo $book['book_name'] ?></td>
                <td width="150" ><?php echo $book['book_genre'] ?></td>
                <td ><strong><?php echo $book['count'] ?></strong></td>
                <td ><?php echo $book['book_price'] ?> ZŁ</td>
                <td ><strong><?php echo $book['count'] * $book['book_price'] ?> ZŁ</strong></td>
            </tr>
            <?php } ?>
        <tr>
        <th></th>
        <th></th>
        <th></th>
            <th>Total Book Number: <span style="color: #ff2a31"><?php echo $total_count ?></span></th>
            <th></th>
        <th>Total Price: <span style="color: #ff2a31"> <?php echo $total_price ?> zł</span></th>
        </tr>
    </table>

<?php
include ('templates/footer.php');
?>