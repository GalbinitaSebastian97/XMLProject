<?php 
if(isset($_POST['login'])){
    $username=preg_replace('/[^A-Za-z]/','',$_POST['username']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    
    if(file_exists('users/'.$username.'.xml')){
        $errors[]='Username already exists';
    }
    if($username==''){
        $errors='Username is blank';
    }
    if($email==''){
        $errors[]='Email is blank';
    }
    if($password==''||$c_password==''){
        $errors[]='Passwords are blank';
    }
    if($password !=$c_password){
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Galbinita Sebastian, and Bootstrap contributors">
    <title>IFood Register</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/floating-labels.css" rel="stylesheet">
    <link href="css/add-image.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
<body>
    <form class="form-signin" method="post" action="">
        <div class="text-center mb-4">
            <img class="mb-4" src="images/icon.png" alt="" width="122" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Register</h1>
        </div>
            <?php
            if(isset($_POST['login'])){
            if(count($errors)>0){
                foreach($errors as $e){
                     echo"<p class='text-danger text-center'>$e</p>";
                }
            }}
            ?>
        <div class="form-label-group">
          <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
          <label for="inputUsername">Username</label>
        </div>
        
        <div class="form-label-group">
          <input type="text" id="username" class="form-control" placeholder="Email" name="email" required autofocus>
          <label for="inputEmail">Email</label>
        </div>

        <div class="form-label-group">
          <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
          <label for="inputPassword">Password</label>
        </div>

        <div class="form-label-group">
          <input type="password" id="password" class="form-control" name="c_password" placeholder="Confirm Password" required>
          <label for="inputPassword">Confirm Password</label>
        </div>

        <button class="file-upload-btn" type="submit" name="login" value="Login">Submit</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; Galbinita Sebastian 2020</p>
    </form>
</body>
</html>
