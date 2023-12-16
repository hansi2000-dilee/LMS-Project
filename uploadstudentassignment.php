<?php
session_start();
require "connection.php";

$subject = $_POST["su"];
$student = $_POST["st"];
$grade = $_POST["g"];
$exam = $_POST["e"];
$ud = Database::search("SELECT * FROM `student_upload_exam` INNER JOIN `exam` ON `exam`.e_id =`student_upload_exam`.exa_id INNER JOIN `student` ON `student`.student_id = `student_upload_exam`.studd_id INNER JOIN `grade` ON `grade`.g_id = `student_upload_exam`.stu_gr_id WHERE `student_upload_exam`.exa_id = '".$exam."' AND `student_upload_exam`.studd_id = '".$student."' AND `student_upload_exam`.stu_gr_id = '".$grade."' AND `student_upload_exam`.subjectt_id = '".$subject."'");
$ns = $ud->num_rows;
if($ns == 1){
echo "you want to update your assaignment ?";
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
        Database::iud("UPDATE `student_upload_exam` SET `uploads`='".$file."' AND `location`='".$location."' WHERE `student_upload_exam`.exa_id = '".$exam."' AND `student_upload_exam`.studd_id = '".$student."' AND `student_upload_exam`.stu_gr_id = '".$grade."' AND `student_upload_exam`.subjectt_id = '".$subject."'");
        echo "success1";
    }else{
        echo "Large File Size!!";
    }
}else{
    echo "Enter File Type";
}
}else{
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
            Database::iud("INSERT INTO `student_upload_exam`(`uploads`,`exa_id`,`studd_id`,`stu_gr_id`,`location`,`subjectt_id`,`status`) VALUES( '".$file."', '".$exam."','".$student."','".$grade."','".$location."','".$subject."','2')");
            echo "success";
        }else{
            echo "Large File Size!!";
        }
    }else{
        echo "Enter File Type";
    }
}


?>