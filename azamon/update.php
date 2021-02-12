 <?php
include ("templates/header.php");
 if (!isset($_SESSION['admin'])) {
     header('Location:index.php');
 }
 ?>
<?php
$sorgu = mysqli_query($conn,"SELECT * FROM user WHERE user_id =".(int)$_GET['id']);
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = mysqli_fetch_assoc($sorgu); //sorgu çalıştırılıp veriler alınıyor
?>
<form method="post">
    <h1 align="center">Update User Information</h1>
    <table class="table" align="center">
        <tr>
            <td>NAME</td>
            <td><input type="text" name="name" class="form-control" value="<?php echo $sonuc['user_name'];
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>
        <tr>
            <td>SURNAME</td>
            <td><textarea name="surname" class="form-control"><?php echo $sonuc['user_surname']; ?></textarea></td>
        </tr>
        <tr>
        <td>E-MAIL</td>
            <td><input type="text" name="email" class="form-control" value="<?php echo $sonuc['user_email'];
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
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    if ($name<>"" && $surname<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($conn->query("UPDATE user SET user_name = '$name', user_surname = '$surname', user_email = '$email' WHERE user_id =".(int)$_GET['id']))
        {
            header("location:signup.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
elseif (isset($_POST['delete'])) {
    if ($conn->query("DELETE FROM user WHERE user_id=".(int)$_GET['id'])) {
        echo '<script language="javascript">';
        echo 'alert("Record is deleted !")';
        echo '</script>';
        header("refresh: 0.5; url=index.php");
    }
}
include ('templates/footer.php')
?>