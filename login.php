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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Galbinita Sebastian, and Bootstrap contributors">
    <title>IFood Login</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
    <form class="form-signin" method="post">
  <div class="text-center mb-4">
      <img class="mb-4" src="images/icon.png" alt="" width="122" height="72">
    <h1 class="h3 mb-3 font-weight-normal">IFood</h1>
  </div>
            <?php
            if($error){
                echo"<p class='text-danger text-center'>Invalid username and/or password</p>";              
            }
            ?>
  <div class="form-label-group">
    <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="inputEmail">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">Sign in</button>
  <div class="text-center mb-4">
      <br>
      <a href="register.php">Register</a>
  </div>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2019-2020</p>
</form>
</body>
</html>
