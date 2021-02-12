<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include ('templates/header.php');
if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {
    header('Location:index.php');
}

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $query =mysqli_query($conn, "SELECT user_email FROM user WHERE user_email='$email'");
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script language="javascript">';
        echo 'alert("E-mail is wrong !")';
        echo '</script>';
    }elseif(!$name || !$surname || !$email || !$password){
        echo '<script language="javascript">';
        echo 'alert("Name, E-mail and Message must be filled !")';
        echo '</script>';
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo '<script language="javascript">';
        echo 'alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")';
        echo '</script>';
    }elseif (mysqli_num_rows($query) > 0)  {
        echo '<script language="javascript">';
        echo 'alert("You have already account with this E-mail !")';
        echo '</script>';
    }
    else {
        $encrypt=md5($password);
        $sql = "INSERT INTO user (user_name, user_surname, user_email,user_password) VALUES ('$name', '$surname', '$email','$encrypt')";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("New record created successfully !")';
            echo '</script>';
            header("refresh: 0.1; url=login.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
echo '<form action="" method="post">

<h1 align="center">Sign up to Azamon</h1>
<table class="login" align="center"> 
<tr> 
<td></td>
<td><input type="text" name="name" id="" placeholder="Name.."/></td>
</tr>
<tr> 
<td></td>
<td><input type="text" name="surname" id="" placeholder="Surname.."/></td>
</tr>
<tr> 
<td></td>
<td><input type="email" name="email" id="" placeholder="E-mail.."/></td>
</tr>
<tr>
<td></td>
<td><input type="password" name="password" id="txtPassword" placeholder="Password.."/></td>
</tr>
<tr> 
<td></td>
<td><input type="password" name="confirmpassword" id="txtConfirmPassword" placeholder="Confirm Password.."/></td>
</tr>
<td></td>
<td><input type="submit" value="Sign Up" name="signup" onclick="return Validate()"/></td>
</tr>
</table>
<script src="js/confirmpass.js"></script>
</form>';
include ('templates/footer.php');
?>