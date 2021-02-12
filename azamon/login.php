<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include ('templates/header.php');
if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {
    header('Location:index.php');
}

if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    if ($email && $password) {
        $query = mysqli_query($conn, "SELECT * FROM user WHERE user_email='$email' and user_password='$password'");
        $datacount=mysqli_num_rows($query);
        if ($datacount>0) {
            $_SESSION['user'] = $email;
            header('Location:index.php');
        }
        else {
            header('Location:login.php?login=no');
        }
    }
}
    echo '<form action="" method="post">


<h1 align="center">Log in to Azamon</h1>
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
</form>';
include ('templates/footer.php');
?>