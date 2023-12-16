<?php
session_start();
require "connection.php";


$exams_id = $_GET["id"];
$g_id = $_SESSION["g"];
// echo $id;
// echo $g_id;
$_SESSION["exam_id"] = $exams_id;
$teach = $_SESSION["teacherID"];
$r = Database::search("SELECT * FROM `marks`
INNER JOIN `teacher` ON `teacher`.`id`= `marks`.`teacher_id`
INNER JOIN `student` ON `student`.`student_id`=`marks`.`student_id` 
INNER JOIN `subject` ON `subject`.`id` = `marks`.`subject_id` 
INNER JOIN `exam` ON `exam`.`e_id` = `marks`.`exam_id` 
INNER JOIN `grade` ON `grade`.`g_id` = `marks`.`grade_g_id` WHERE `marks`.`grade_g_id`='".$g_id."' AND `marks`.`exam_id`='".$exams_id."' AND `marks`.`status`='1'");
$nsr = $r->num_rows;
if($nsr == 0){
?>
<div class="justify-content-center fw-bold fs-3"><span class="text-center justify-content-center">No Marks added Or Released</span></div>
<?php
}else{
    $srow = $r->fetch_assoc();
    ?>
    
    <div class="justify-content-center fw-bold fs-4 mb-4"><u><span class="text-center justify-content-center">Grade&nbsp;<?php echo $srow["g_name"];  ?>&nbsp;[<?php echo $srow["exam_name"];  ?>] Exam Results&nbsp;</span></u></div>
     <div class="col-10 offset-1">
      <div class="row">
          <div class="col-1 col-lg-2 fw-bold fs-5">No</div>
          <div class="col-7 col-lg-7 fw-bold fs-5">Student'name</div>
          
          <div class="col-2 col-lg-2 fw-bold fs-5">Result</div>
          
      </div>
      <hr/>
  </div>
  <div class="col-10 offset-1 mb-2">
  <div class="row">
    <h4></h4>
  <?php
for($i=0;$i<$nsr;$i++){  
  
?>
 
          <div class="col-1 col-lg-2 mt-4"><?php echo $srow["m_id"]; ?></div>
          <div class="col-7 col-lg-7 mt-4"><?php echo $srow["fname"]." ".$srow["lname"]; ?></div>
          
          <div class="col-2 col-lg-2 mt-4"><?php echo $srow["marks"]; ?></div>
         
     <hr/>
      <?php
    }
    ?>
  
            
             <!-- ................///////////table end............... -->
<?php

 ?>
  </div>
  </div>

    
 
 
 <?php

}

?>