<?php
session_start();
require "connection.php";

$gid = $_POST["id"];
$m = $_POST["m"];
$s = $_POST["s"];
$e = $_POST["e"];

$teach = $_SESSION["teacherID"];
if($e == "0"){ 
    echo "Select Exam";
}else if(empty($m)){
    echo "Enter Student Mark";
}else{
$te = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id  
WHERE `te_id`='".$teach."' AND `teacher_grade_subect`.gr_id='".$gid."'");
$fs = $te->fetch_assoc();
$sub = $fs["sub_id"];

$result = Database::search("SELECT * FROM `marks` INNER JOIN `subject` ON `subject`.id=`marks`.subject_id INNER JOIN `grade` ON `grade`.g_id =`marks`.grade_g_id INNER JOIN `teacher` ON `teacher`.id= `marks`.teacher_id INNER JOIN `student` ON `student`.student_id = `marks`.student_id WHERE `marks`.`exam_id` = '".$e."' AND `marks`.`subject_id`='".$sub."' AND `marks`.grade_g_id='".$gid."' AND `marks`.student_id='".$s."' AND `marks`.teacher_id = '".$teach."'");
$row = $result->num_rows;
if($row == 1){
   
    Database::iud("UPDATE `marks` SET `marks`.`marks` = '".$m."' WHERE `marks`.`exam_id` = '".$e."' AND `marks`.`subject_id`='".$sub."' AND `marks`.grade_g_id='".$gid."' AND `marks`.student_id='".$s."' AND `marks`.teacher_id = '".$teach."'");
    echo "This Subject's Mark already exists in Student.Now Updated!";
}else{
Database::iud("INSERT INTO `marks`(`marks`,`teacher_id`,`student_id`,`subject_id`,`exam_id`,`grade_g_id`) VALUES('".$m."','".$teach."','".$s."','".$sub."','".$e."','".$gid."')");
echo "success";
}
}
?>