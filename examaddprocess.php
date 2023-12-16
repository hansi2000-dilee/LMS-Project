<?php
require "connection.php";

$id = $_POST["id"];

$g = $_POST["g"];
$e= $_POST["e"];

 if($g == 0){
    echo "Select Grade";
}else if(empty($e)){
    echo "Enter Exam Name";
}else{
    $subject = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id WHERE `te_id`='".$id."'");
	$sub_id = $subject->fetch_assoc();
	$s = $sub_id["sub_id"];

$result = Database::search("SELECT * FROM `exam` INNER JOIN `subject` ON `subject`.id=`exam`.subject_id INNER JOIN `grade` ON `grade`.g_id =`exam`.grade_g_id INNER JOIN `teacher` ON `teacher`.id= `exam`.tea_id WHERE `exam_name` = '".$e."' AND `subject_id`='".$s."' AND `exam`.`grade_g_id`='".$g."'");
$row = $result->num_rows;
if($row == 1){
    echo "Exam Name already exists";
}else{
Database::iud("INSERT INTO `exam`(`exam_name`,`subject_id`,`grade_g_id`,`tea_id`) VALUES('".$e."','".$s."','".$g."','".$id."')");
echo "success";
}
}
?>