<?php
session_start();

require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'OAuth.php';




if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {

        echo "Please enter your email address";
    } else {
        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' ");

        $an = $adminrs->num_rows;

        if ($an == 1) {
            $code = uniqid();
            Database::iud("UPDATE admin SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "' ");
           
            
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
    $mail->addAddress($email);
    $mail->isHTML(true);
           $mail->Subject = 'AIBS Admin Verification Code';
           $bodyContent = '<h1 style="color:Black;" >Your Verification code : '.$code.' </h1><h3>Now you can sign In admin panel using this verification Code</h3>';
           $mail->Body    = $bodyContent;
            
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            } else { 
                echo 'Success';
            } 
            //email code

        } else {
            echo "Invalid user";
        }
    }
} else {
    echo "Please enter your email address";
}