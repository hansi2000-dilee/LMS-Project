<?php

require "connection.php";
session_start();
$id= $_POST["id"];


use PHPMailer\PHPMailer\PHPMailer;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


$ace = Database::search("SELECT * FROM `teacher` WHERE `id`='".$id."'");
$na = $ace->num_rows;
if($na == 1){
$fs = $ace->fetch_assoc();
$e = $fs["email"];
$f = $fs["firstname"];
$l = $fs["lastname"];

$upas = $f.uniqid();
$uname = $f.$l;

Database::iud("UPDATE `teacher` SET `password`='".$upas."' WHERE `id`='".$id."'");
Database::iud("UPDATE `teacher` SET `username`='".$uname."' WHERE `id`='".$id."'");
Database::iud("UPDATE `teacher` SET `invitationSend`='2' WHERE `id`='".$id."'");


}

// /email code
     
            
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
    $bodyContent = '<h3 style="color:red;" >Your Username : '.$uname.' </h3><br/><h3 style="color:red;" >Your Username : '.$upas.' </h3>';
    $mail->Body    = $bodyContent;
     
     if(!$mail->send()) { 
         echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
     } else { 
         echo 'Success';
     } 
     //email code





?>