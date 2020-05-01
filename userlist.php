<?php
session_start();
if(!file_exists('users/'.$_SESSION['username'].'.xml')){
    header('Location:login.php');
    die;
}
?>
<html>
    <head>       
    </head>
    <body>
        <h1>User Page</h1>
        <h2>Welcome,<?php echo $_SESSION['username'];?></h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php 
            $files=glob('users/*.xml');
            foreach($files as $file){
                $xml=new SimpleXMLElement($file,0,true);
                echo '<tr>'
                .'<td>'.basename($file,'.xml').'</td>'
                .'<td>'.$xml->email.'</td>'
                .'</tr>';
            }
            ?>
        </table>
        <hr/>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </body>
</html>
