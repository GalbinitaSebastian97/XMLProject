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