<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include ('templates/header.php');


if (isset($_SESSION['admin']) or isset($_SESSION['user'])) {
    header('Location:index.php');
}

if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    if ($email && $password) {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' and admin_password='$password'");
        $datacount=mysqli_num_rows($query);
        if ($datacount>0) {
            $_SESSION['admin'] = $email;
            header('Location:index.php');
        }
        else {
            header('Location:admin.php?login=no');
        }
    }
}
echo '<form action="" method="post">


<h1 align="center">Log in to Azamon -- Admin</h1>
<table class="login" align="center">
<tr> 
<td></td>
<td><input type="email" name="email" id="" placeholder="E-mail.."/></td>
</tr>
<tr> 
<td></td>
<td><input type="password" name="password" id="" placeholder="Password.."/></td>
</tr>
<td></td>
<td><input type="submit" name="login" value="Log in"/></td>
</tr>

</table>
</form>
';
include ('templates/footer.php');
?>