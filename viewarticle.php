<?php
$params=array('id'=>$_GET['id']);
       $xslDoc=new DOMDocument();
       $xslDoc->load("article/viewarticle.xsl");
       
       $xmlDoc=new DOMDocument();
       $xmlDoc->load("article/articledata.xml");

       $proc=new XSLTProcessor();
       $proc->importStylesheet($xslDoc);
       foreach($params as $key=>$val)
           $proc->setParameter('',$key,$val);
       
       echo $proc->transformToXml($xmlDoc);     
?>

