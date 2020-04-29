<!DOCTYPE html>
<?php
$error=false;
if(isset($_POST['login'])){
    $username=preg_replace('/[^A-Za-z]/','',$_POST['username']);
    $password=md5($_POST['password']);
    if(file_exists('users/'.$username.'.xml')){
        $xml=new SimpleXMLElement('users/'.$username.'.xml',0,true);
        if($password==$xml->password){
            session_start();
            $_SESSION['username']=$username;
            header('Location:index.php');
            die;
        }
    }
    $error=true;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="post" action="">
            <p>Username<input type="text" name="username" size="20"/></p>
            <p>Password<input type="password" name="password" size="20"/></p>
            <?php
            if($error){
                echo'<p>Invalid username and/or password</p>';
            }
            ?>
            <p><input type="submit" value="Login" name="login"></p>            
        </form>
        <a href="register.php">Register</a>
    </body>
</html>
