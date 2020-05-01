<?php
if(isset($_POST['submit'])) {
$id=$_POST['id'];
 $data=simplexml_load_file('article/articledata.xml');
foreach($data->date as $date){
    if($date->id==$id){
unlink($date->image);
 $date->title=$_POST['title'];
 $date->overview=$_POST['overview'];
$target="./images/".md5(uniqid(time())).basename($_FILES['image']['name']);
 $date->image=$target;
    }
}
$handle=fopen("article/articledata.xml","wb");
fwrite($handle,$data->asXML());
fclose($handle);

if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:index.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
}
  ?>