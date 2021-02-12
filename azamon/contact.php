<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include ('templates/header.php');

if($_POST){
    $other = 'mime-version: 1.0'."\r\n";
    $other .= 'content-type: text/html; charset=utf-8'."\r\n";
    $name = $_POST["name"];
    $subject =  $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script language="javascript">';
        echo 'alert("E-mail is wrong !")';
        echo '</script>';
        header("refresh: 0.5; url=contact.php");
    }elseif(!$name || !$message || !$email){
        echo '<script language="javascript">';
        echo 'alert("Name, E-mail and Message must be filled !")';
        echo '</script>';
        header("refresh: 0.5; url=contact.php");
    }else{
        $owner = "eternalchief81@gmail.com";
        $content = "Name :  ".$name."<br/> ".
            "E-mail:  ".$email. " <br/> Message: <br/> ".$message;
        $other .= "From: ".$email;
        $send = mail($owner,$subject,$content,$other);
        if($send){
            echo '<script language="javascript">';
            echo 'alert("E-mail is sent !! !")';
            echo '</script>';
            header("refresh: 0.5; url=contact.php");
        }
    }
}
else{
    echo '<form action="" method="post">

<h1 align="center">Contact Form</h1>
<table align="center"> 
<tr> 
<td></td>
<td><input type="text" name="name" id="" placeholder="Name.."></td>
</tr>
<tr> 
<td></td>
<td><select name="subject" id="" > 
<option>Question</option>
<option >About Website</option>
<option >Other</option>
</select></td>
</tr>
<tr> 
<td></td>
<td><input type="text" name="email" id="" placeholder="E-mail.."></td>
</tr>
<tr> 
<td></td>
<td><textarea name="message" cols="50" rows="10" placeholder="Message.."></textarea></td>
</tr>
<tr> 
<td></td>
<td><input type="submit" value="Send" /></td>
</tr>
</table>
</form>';
}

include ('templates/footer.php');
?>