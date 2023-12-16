<?php
session_start();
require "connection.php";

$id = $_GET["id"];
$g_id = $_SESSION["g"];
$teach = $_SESSION["teacherID"];
// echo $id;
// echo $g_id;

$marks = Database::search("SELECT * FROM `exam` WHERE `grade_g_id`='".$g_id."' AND `subject_id`='".$id."' AND `tea_id`='".$teach."'");
$nm = $marks->num_rows;
if($nm == 0){
?>
<div class="justify-content-center fw-bold fs-3"><span class="text-center justify-content-center">No Exams</span></div>
<?php
}else{
  for($i=0;$i<$nm;$i++){
    $fm = $marks->fetch_assoc();
    ?>
     <div class="col-6 col-lg-4 offset-4"><button class="btn btn-outline-secondary col-12 fw-bold mt-4 justify-content-end text-center mb-3" onclick='viewresultstudentTeacher(<?php echo $fm["e_id"]; ?>);'><?php echo $fm["exam_name"]; ?></button> </div>
<?php
 }

}

?>