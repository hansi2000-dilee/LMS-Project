<?php
require "connection.php";

$grade = $_POST["g"];
$stu = $_POST["u"];
$sub = $_POST["s"];

// echo $grade;
// echo $stu;
// echo $sub;

if($grade == "0"){
    echo "Select student grade";
    }else if($sub == "0"){
        echo "Select student subject";
    }else if($stu == "0"){
        echo "Select student";
    }else{
        $stu = Database::search("SELECT * FROM `student_grade_subject` WHERE `subj_id`='".$sub."' AND `grad_id`='".$grade."' AND `stude_id`='".$stu."'");
        $s = $stu->num_rows;
        if($s == 1){
            echo "Already added Student";
        }else{
        Database::iud("INSERT INTO `student_grade_subject`(`subj_id`,`grad_id`,`stude_id`) VALUES('".$sub."','".$grade."','".$stu."');");
        echo "Successed Added";
        }
    }
?>