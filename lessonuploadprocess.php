<?php
require "connection.php";
$id = $_POST["id"];

$lesson = $_POST["n"];
$grade = $_POST["g"];
// $file = $_FILES["file"];
 if($grade == 0){
	echo "Select Grade";
}else if(empty($lesson)){
	echo "Enter Lesson Name";
}else{ 
	$subject = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id WHERE `te_id`='".$id."'");
	$sub_id = $subject->fetch_assoc();
	$ss_id = $sub_id["sub_id"];
if(!empty($_FILES["file"])){
		$file_name = $_FILES["file"]['name'];
		$file_temp = $_FILES["file"]['tmp_name'];
		$file_size = $_FILES["file"]['size'];
 
		$exp = explode(".", $file_name);
		$ext = end($exp);
		$file = time().'.'.$ext;
		$location = "uploads/".$file;


 
		if($file_size < 5242880){
			move_uploaded_file($file_temp, $location);
			Database::iud("INSERT INTO `lessons`(`grade_id`,`subect_id`,`teacher_id`,`lesson_name`,`filename`,`location`) VALUES( '".$grade."', '".$ss_id."','".$id."','".$lesson."','".$file."','".$location."')");
			echo "success";
		}else{
			echo "Large File Size!!";
		}
	}else{
		echo "Enter File Type";
	}
}
	

?>