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
