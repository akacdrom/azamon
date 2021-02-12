<?php session_start();
include "connectdb.php";
function btn($product_item) {
    if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION["shoppingCart"];
        $books = $shoppingCart['books'];
    }
    else {

        $books = array();
    }
        if (array_key_exists($product_item['book_id'],$books)){
        $books[$product_item['book_id']]['count']++;


    }   else {
        $books[$product_item['book_id']] = $product_item;

    }

        // sepetin hespalanması

    $total_price = 0;
    $total_count = 0;
    foreach ($books as $book){
        $book['total_price'] = $book['count'] * $book['book_price'];
        $total_price = $total_price + $book['total_price'];
        $total_count += $book['count'];
    }


    $summary['total_price'] = $total_price;
    $summary['total_count'] = $total_count;

    $_SESSION['shoppingCart']['books'] = $books;
    $_SESSION['shoppingCart']['summary'] = $summary;


}
if (isset($_POST['p'])) {
    $islem = $_POST['p'];
    if($islem == "btn") {
        $id = $_POST['book_id'];

        $result = mysqli_query($conn, "SELECT * FROM book where book_id={$id}");
        $book = mysqli_fetch_array($result);
        $book['count'] = 1;

        btn($book);
    } elseif ($islem == "remove") {

    }
}