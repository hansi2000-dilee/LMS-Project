<?php
session_start();
require "connection.php";


$t = $_POST["t"];
$s = $_POST["s"];
$g = $_POST["g"];

if($t == 0){
echo "Select Teacher";
}else if($g == 0){
    echo "Select Grade";
}else if($s == 0){
    echo "Select Subject";
}else{
Database::iud("INSERT INTO `teacher_grade_subect`(`te_id`,`gr_id`,`sub_id`) VALUES('".$t."','".$g."','".$s."')");
echo "Success";
}

?>