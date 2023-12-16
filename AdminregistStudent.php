<?php
require "connection.php";

$e = $_POST["e"];
$f = $_POST["f"];
$l = $_POST["l"];
 if(empty($f)){
     echo "1";
   }else if(empty($l)){
      echo "1";
   }else if(empty($e)){
      echo "1";

 }else{
    Database::iud("INSERT INTO `student`(`fname`,`lname`,`email`) VALUES('".$f."','".$l."','".$e."');");
 }
// echo $e;
// echo $s;

    
?>
