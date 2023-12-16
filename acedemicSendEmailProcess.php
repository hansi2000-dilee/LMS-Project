<?php

require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


if (isset($_GET["id"])) {
    $id = $_GET["id"];
  
        $email = Database::search("SELECT * FROM `student` WHERE `student_id`='" . $id . "'");
        $n = $email->num_rows;
      if($n == 1)
      $emailfs = $email->fetch_assoc();
      $e = $emailfs["email"];
      $f = $emailfs["fname"];
      $l = $emailfs["lname"];
   
      $uname = $f.$l;
      $upas = $f.uniqid();

      Database::iud("UPDATE `student` SET `password`='".$upas."' WHERE `student_id`='".$id."'");
      Database::iud("UPDATE `student` SET `username`='".$uname."' WHERE `student_id`='".$id."'");
      Database::iud("UPDATE `student` SET `invitationSend`='2' WHERE `student_id`='".$id."'");
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
           $bodyContent = '<div class="row">
           <div class="col-12">
           <div class="row p-3">
           <div class="col-8 text-blue text-center" style="border: 1px solid black;">
           <span class="fw-bold">Your Username :</span>
           <span class="fw-bold">'.$uname.'</span><br/>
           <span class="fw-bold">Your Password :</span>
           <span class="fw-bold">'.$upas.'</span><br/>
           <div class="row mt-3 ms-5">
           <span class="text-danger ms-5">* You will need these details to login *</span>
           </div>
           </div>
           </div></div>
           </div>';
           $mail->Body    = $bodyContent;
            
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            } else { 
                echo 'Success';
            } 
            //email code

       
    
}
