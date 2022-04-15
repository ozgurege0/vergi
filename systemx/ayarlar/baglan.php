<?php 

error_reporting(0);

try{
    $db=new PDO("mysql:host=localhost;dbname=panterya_vergi;charset=utf8","panterya_vergi","80158015Ege");
   

}catch(PDOEXception $hata){
    echo $hata->getMessage();

}

$site="https://vergi.genelyazilim.com";
?>