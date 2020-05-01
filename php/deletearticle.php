<?php
$id=$_GET['id'];

$xml=new DOMDocument();
$xml->load('../article/articledata.xml');

$xml1=simplexml_load_file("../article/articledata.xml");
$img=$xml1->date[$id-1]->image;
unlink($img);
$xpath=new DOMXPATH($xml);
foreach($xpath->query("/root/date[id='$id']")as $node){
    $node->parentNode->removeChild($node);
}
$xml->formatoutput=true;
$xml->save('../article/articledata.xml');

 header('location:../index.php');
?>