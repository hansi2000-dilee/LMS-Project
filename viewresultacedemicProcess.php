<?php
session_start();
require "connection.php";


$id = $_GET["id"];
$g_id = $_SESSION["g"];
// echo $id;
// echo $g_id;
$_SESSION["exam_id"] = $id;

$r = Database::search("SELECT * FROM `marks`
INNER JOIN `teacher` ON `teacher`.`id`= `marks`.`teacher_id`
INNER JOIN `student` ON `student`.`student_id`=`marks`.`student_id` 
INNER JOIN `subject` ON `subject`.`id` = `marks`.`subject_id` 
INNER JOIN `exam` ON `exam`.`e_id` = `marks`.`exam_id` 
INNER JOIN `grade` ON `grade`.`g_id` = `marks`.`grade_g_id` WHERE `marks`.`grade_g_id`='".$g_id."' AND `marks`.`exam_id`='".$id."' AND `marks`.`status`='1'");
$nsr = $r->num_rows;
if($nsr == 0){
?>
<div class="justify-content-center fw-bold fs-3"><span class="text-center justify-content-center">No Marks added Or Released</span></div>
<?php
}else{
    $srow = $r->fetch_assoc();
    ?>
    <div class="justify-content-center fw-bold fs-4 mb-4"><u><span class="text-center justify-content-center">Grade&nbsp;<?php echo $srow["g_name"];  ?>&nbsp;[<?php echo $srow["exam_name"];  ?>] Exam Results&nbsp;</span></u></div>
     <div class="col-12">
      <div class="row">
          <div class="col-1 col-lg-2 fw-bold fs-5">No</div>
          <div class="col-6 col-lg-5 fw-bold fs-5">Student'name</div>
          
          <div class="col-2 col-lg-2 fw-bold fs-5">Result</div>
          <div class="col-3 col-lg-3 fw-bold fs-5">Release</div>
      </div>
      <hr/>
  </div>
  <div class="row" style="height: 200px;">
  <?php
for($i=0;$i<$nsr;$i++){  
  
?>
 
          <div class="col-1 col-lg-2 mt-4"><?php echo $srow["m_id"]; ?></div>
          <div class="col-6 col-lg-5 mt-4"><?php echo $srow["fname"]." ".$srow["lname"]; ?></div>
          
          <div class="col-2 col-lg-2 mt-4"><?php echo $srow["marks"]; ?></div>
          <div class="col-3 col-lg-3 mt-4">
          <button class="btn btn-outline-secondary mb-3" onclick='releaseMarksStudent(<?php echo $srow["m_id"]; ?>);' id="releasebut<?php echo $srow["m_id"]; ?>">Release</button>
          </div>
     <hr/>
      <?php
    }
    ?>
  
            
             <!-- ................///////////table end............... -->
<?php

 ?>
  </div>

    
 
 
 <?php

}

?>