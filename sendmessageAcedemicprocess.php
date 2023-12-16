<?php
require "connection.php";
session_start();

    $senderid = $_POST["id"];
    $msg = $_POST["t"];
 
 $ac = Database::search("SELECT * FROM `academic_officer` WHERE `id` = '".$senderid."'");
 $fsA = $ac->fetch_assoc();

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if(empty($msg)){
        echo "Please enter a message to send";
    }else{

        Database::iud("INSERT INTO `acedemic_chat` (`message`,`Academic_Officer_id`,`admin_id`,`date`,`status`) VALUES ('".$msg."','".$fsA["id"]."','1','".$date."','1')");
        echo "success";

    }


?>