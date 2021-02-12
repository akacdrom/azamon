<?php
include ("templates/header.php");
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?>
<?php
if (isset($_POST['upload-book'])) {
    $book_name =$_POST['book_name'];
    $book_descr =$_POST['book_descr'];
    $book_author =$_POST['book_author'];
    $book_genre =$_POST['book_genre'];
    $book_img = $_FILES['book_img']['name'];
    $book_price =$_POST['book_price'];
    $target = "book/".basename($book_img);
    $imgfiletype =  strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($imgfiletype != "jpg" and $imgfiletype != "png" and $imgfiletype != "jpeg") {
        echo '<script language="javascript">';
        echo 'alert("IMAGE can be just JPG,PNG or JPEG !")';
        echo '</script>';
    }
    else {
        $sql = "INSERT INTO book (book_name,book_descr,book_author,book_genre,book_price,book_img) VALUES ('".addslashes($book_name)."','".addslashes($book_descr)."','".addslashes($book_author)."','$book_genre','$book_price','$book_img')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($_FILES['book_img']['tmp_name'], $target)) {
            echo "Image uploaded successfully";
        }else{
            echo "Failed to upload image";
        }
    }
}
elseif(isset($_POST['upload-author'])) {
    $author_name =$_POST['author_name'];
    $author_img = $_FILES['author_img']['name'];
    $target2 = "author/".basename($author_img);
    $imgfiletype2 =  strtolower(pathinfo($target2,PATHINFO_EXTENSION));
    if ($imgfiletype2 != "jpg" and $imgfiletype2 != "png" and $imgfiletype2 != "jpeg") {
        echo '<script language="javascript">';
        echo 'alert("IMAGE can be just JPG,PNG or JPEG !")';
        echo '</script>';
    }
    else{
        $sql2 = "INSERT INTO author (author_name,author_img) VALUES ('".addslashes($author_name)."','$author_img')";
        mysqli_query($conn, $sql2);
        if (move_uploaded_file($_FILES['author_img']['tmp_name'], $target2)) {
            echo "Image uploaded successfully";
        }else{
            echo "Failed to upload image";
        }
    }
}
?>
    <table align="right" style="margin: 50px">
        <tr>
            <td></td>
            <td>
                <h1>Ad Book</h1>
            </td>
        </tr>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="size" value="1000000">
                </td>
            </tr>
            <tr>
                <td>Book Thumbnail</td>
                <td>
                    <input type="file" name="book_img">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text" name="book_name" placeholder="Book Name">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text" name="book_author" placeholder="Book Author">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><select name="book_genre" id="" >
                        <option>Biography</option>
                        <option >Philosophy</option>
                        <option >Self-Improvement</option>
                        <option >History</option>
                        <option >Science</option>
                        <option >Novel</option>
                        <option >Horror</option>
                        <option >Detective</option>
                        <option >Science-Fiction</option>
                        <option >Education</option>
                        <option >Comic-Book</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td>
      <textarea
              name="book_descr"
              cols="50"
              rows="10"
              placeholder="Say something about this book..."></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="number" name="book_price" placeholder="Book Price">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="upload-book">Upload Book</button>
                </td>
    </table>
    <table align="left" style="margin: 50px">
        <tr>
            <td></td>
            <td>
                <h1>Ad Author</h1>
            </td>
        </tr>
        <tr>
            <td>Author Thumbnail</td>
            <td>
                <input type="file" name="author_img">
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="author_name" placeholder="Author Name">
            </td>
        </tr>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="upload-author">Upload Author</button>
            </td>
        </tr>
    </table>


<?php
include ('templates/footer.php');
?>