<?php
session_start();
require "connection.php";


$id = $_POST["id"];

$sT = Database::search("SELECT DISTINCT `te_id`,`teacher`.`firstname`,`teacher`.`lastname`,`teacher`.`email`,`teacher`.`username` FROM `teacher_grade_subect` INNER JOIN `subject` ON `subject`.id = `teacher_grade_subect`.sub_id INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id INNER JOIN `grade` ON `grade`.g_id=`teacher_grade_subect`.gr_id WHERE `sub_id`='".$id."'");
$sTn = $sT->num_rows;
$c = 0;
for($i=0;$i<$sTn;$i++){
  $u = $sT->fetch_assoc();
  $c++;
  ?>
   <hr/>
<div class="row mt-3 mb-4">
  <div class="col-12">
    <div class="row">
      <div class="col-12 col-lg-1"><?php echo $c; ?></div>
      <div class="col-12 col-lg-4"><?php echo $u["firstname"]." ".$u["lastname"]; ?></div>
      <div class="col-12 col-lg-4"><?php echo $u["email"]; ?></div>
      <div class="col-12 col-lg-3"><?php echo $u["username"]; ?></div>
   
    </div>
  </div>
</div>
<hr/>
  <?php
}





?>