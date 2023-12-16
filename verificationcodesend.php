<?php
 $veri = $_POST["v"];
 $uname = $_POST["us"];
 $utype = $_POST["ut"];
 $upas = $_POST["up"];
//  echo $veri;
//  echo $uname;
//  echo $utype;
//  echo $upas;
 if(empty($veri)){
echo "Enter Verification Code";
 }else{
    echo "ok";
 }



?>