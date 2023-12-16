<?php
require "connection.php";
session_start();

    $senderid = $_POST["id"];
    $msg = $_POST["t"];
 


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if(empty($msg)){
        echo "Please enter a message to send";
    }else{

        Database::iud("INSERT INTO `teacher_chat` (`message`,`teacher_chat_id`,`admin_id`,`date`,`status`) VALUES ('".$msg."','".$senderid."','1','".$date."','1')");
        echo "success";

    }


?>