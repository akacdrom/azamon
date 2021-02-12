<?php
include ("templates/header.php");
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?>
<?php
$sorgu = mysqli_query($conn,"SELECT * FROM book WHERE book_id =".(int)$_GET['id']);
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = mysqli_fetch_assoc($sorgu); //sorgu çalıştırılıp veriler alınıyor
?>
<form method="post">
    <h1 align="center">Update Book Information</h1>
    <table class="table" align="center">
        <tr>
            <td>Book Name</td>
            <td><input type="text" name="book_name" class="form-control" value="<?php echo $sonuc['book_name'];
                // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>
        <tr>
            <td>Author</td>
            <td><textarea name="book_author" class="form-control"><?php echo $sonuc['book_author']; ?></textarea></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td>
                <select name="book_genre" id="book_genre" class="form-control">
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
                </select>
            </td>
        </tr>
        <tr>
            <td>Book Description</td>
            <td><textarea cols="50" rows="10" name="book_descr" class="form-control"><?php echo $sonuc['book_descr']; ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" name="book_price" class="form-control" value="<?php echo $sonuc['book_price'];
                // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" name="update" value="Update"></td>
        </tr>
        <tr>
            <td></td>
            <td><input style="background-color: red" type="submit" class="btn btn-primary" name="delete" value="Delete"></td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['update'])) { // Post olup olmadığını kontrol ediyoruz.
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_genre = $_POST['book_genre'];
    $book_descr = $_POST['book_descr'];
    $book_price = $_POST['book_price'];

    if ($book_name<>"" && $book_author<>"" && $book_genre<>"" && $book_price<>"" ) { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($conn->query("UPDATE book SET book_name = '".addslashes($book_name)."', book_author = '".addslashes($book_author)."', book_genre ='$book_genre' ,book_descr = '".addslashes($book_descr)."' , book_price ='$book_price' WHERE book_id =".(int)$_GET['id']))
        {
            echo '<script language="javascript">';
            echo 'alert("Book info is updated")';
            echo '</script>';

        }
        else
        {
            echo "There is a some error about update information into the database"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
elseif (isset($_POST['delete'])) {
    if ($conn->query("DELETE FROM book WHERE book_id=".(int)$_GET['id'])) {
        echo '<script language="javascript">';
        echo 'alert("Book is deleted !")';
        echo '</script>';
    }
}
include ('templates/footer.php')
?>