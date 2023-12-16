<?php
session_start();
require "connection.php";


$f = $_POST["f"];
$l = $_POST["l"];
$e = $_POST["e"];

if(empty($f)){
echo "Enter First name";
}else if(empty($l)){
    echo "Enter Last Name";
}else if(empty($e)){
    echo "Enter Email";
}else{
Database::iud("INSERT INTO `academic_officer`(`fname`,`lname`,`email`) VALUES('".$f."','".$l."','".$e."')");
echo "Success";
}

?>