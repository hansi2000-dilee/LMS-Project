<?php
session_start();
require "connection.php";


$u = $_POST["u"];
$p = $_POST["p"];
$t = $_POST["t"];

// echo $u;
// echo $p;
// echo $t;

if(empty($u)){
    echo "1";
}else if(empty($p)){
    echo "2";

}else if($t == "0"){
        echo "4";
}else {
    if($t == "1"){
        $tea = Database::search("SELECT * FROM `teacher` WHERE `password`='".$p."' AND `username`='".$u."' AND `verify_status`='2'");
        $tn = $tea->num_rows;
        if($tn == 1){
            $_SESSION["t"] = $tea->fetch_assoc();
            echo "5";
        }else{
            echo "9";
        }

    }else if($t == "2"){
        $ace = Database::search("SELECT * FROM `academic_officer` WHERE `password`='".$p."' AND `username`='".$u."' AND `verify_status`='2'");
        $an = $ace->num_rows;
        if($an == 1){
            // $i = $ace->fetch_assoc();
            $_SESSION["a"] = $ace->fetch_assoc();
            echo "7";
        }else{
            echo "9";
        }
       
    }else if($t == "3"){
        $stu = Database::search("SELECT * FROM `student` WHERE `password`='".$p."' AND `username`='".$u."' AND `verify_status`='2'");
        $an = $stu->num_rows;
        if($an == 1){
            // $i = $ace->fetch_assoc();
            $_SESSION["s"] = $stu->fetch_assoc();
            echo "6";
        }else{
            echo "9";
        }
    }else{
        echo "8";
    }
   
 
  
 

}

?>