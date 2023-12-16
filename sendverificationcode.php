<?php

require "connection.php";
session_start();
$user = $_POST["u"];
$type = $_POST["t"];

use PHPMailer\PHPMailer\PHPMailer;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


if( $type == "1"){
    $ut = Database::search("SELECT * FROM `teacher` WHERE `username`='".$user."'");
    $tn = $ut->num_rows;
    if($tn == 1){
        $ft = $ut->fetch_assoc();
        $f = $ft["firstname"];
        $l = $ft["lastname"];
        $e = $ft["email"];

        $Vcode = uniqid();
        Database::iud("UPDATE `teacher` SET `verification_code`='".$Vcode."' WHERE `username` = '".$user."' AND `teacher`.email='".$e."' AND `user_type_u_id`='1'");
        Database::iud("UPDATE `teacher` SET `verify_status`='2' WHERE `username` = '".$user."' AND `teacher`.email='".$e."' AND `user_type_u_id`='1'");


    }
 }else if($type  == "2"){
    $ua = Database::search("SELECT * FROM `academic_officer` WHERE `username`='".$user."'");
    $tn = $ua->num_rows;
    if($tn == 1){
        $ft = $ua->fetch_assoc();
        $f = $ft["fname"];
        $l = $ft["lname"];
        $e = $ft["email"];

        $Vcode = uniqid();
        Database::iud("UPDATE `academic_officer` SET `verification_code`='".$Vcode."' WHERE `academic_officer`.username = '$user' AND `academic_officer`.email='".$e."' AND `user_type_u_id`='2'");
        Database::iud("UPDATE `academic_officer` SET `verify_status`='2' WHERE `academic_officer`.username = '$user' AND `academic_officer`.email='".$e."' AND `user_type_u_id`='2'");

    }
}else if($type  == "3"){
    $ut = Database::search("SELECT * FROM `student` WHERE `username`='".$user."'");
    $tn = $ut->num_rows;
    if($tn == 1){
        $ft = $ut->fetch_assoc();
        $f = $ft["fname"];
        $l = $ft["lname"];
        $e = $ft["email"];

        $Vcode = uniqid();
         Database::iud("UPDATE `student` SET `verification_code`='".$Vcode."' WHERE `username` = '".$user."' AND `student`.email='".$e."' AND `user_type_u_id`='3'");
         Database::iud("UPDATE `student` SET `verify_status`='2' WHERE `username` = '".$user."' AND `student`.email='".$e."' AND `user_type_u_id`='3'");


    }
}

    //email code
     
            
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hansidileesha206@gmail.com';
    $mail->Password = 'tvxezbocospvaoeb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('hansidileesha206@gmail.com', 'AIBS Institute');
    $mail->addReplyTo('hansidileesha206@gmail.com', 'AIBS Institute');
    $mail->addAddress($e);
    $mail->isHTML(true);
    $mail->Subject = 'AIBS Institute Login Details';
    $bodyContent = '<h3 style="color:red;" >Your Verification code : '.$Vcode.' </h3>';
    $mail->Body    = $bodyContent;
     
     if(!$mail->send()) { 
         echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
     } else { 
         echo 'Success';
     } 
     //email code





?>