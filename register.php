<?php 
if(isset($_POST['login'])){
    $username=preg_replace('/[^A-Za-z]/','',$_POST['username']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $a_password=$_POST['a_password'];
    
    if(file_exists('users/'.$username.'.xml')){
        $errors[]='Username already exists';
    }
    if($username==''){
        $errors='Username is blank';
    }
    if($email==''){
        $errors[]='Email is blank';
    }
    if($password==''||$a_password==''){
        $errors[]='Passwords are blank';
    }
    if($password !=$a_password){
        $errors[]='Passwords do not match';
    }
    if(count($errors)==0){
        $xml=new SimpleXMLElement('<user></user>');
        $xml->addChild('password',md5($password));
        $xml->addChild('email',$email);
        $xml->asXML('users/'.$username.'.xml');
        header('Location:login.php');
        die;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form method="post" action="">
            <?php
            if(isset($_POST['login'])){
            if(count($errors)>0){
                echo '<ul>';
                foreach($errors as $e){
                    echo'<li>'.$e.'</li>';
                }
            }}
            ?>
            <p>Username <input type="text" name="username" size="20"/></p>
            <p>Email <input type="text" name="email" size="20"/></p>
            <p>Password <input type="password" name="password" size="20"/></p>
            <p>Confirm Password <input type="password" name="a_password" size="20"/></p>
            <p><input type="submit" name="login" value="Login"/></p>
        </form>
    </body>
</html>
