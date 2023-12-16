<?php
require "connection.php";
session_start();

$grade_id = $_GET["id"];
$teach = $_SESSION["teacherID"];

$techer_subject = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id  
WHERE `te_id`='".$teach."'");
$fs_te = $techer_subject->fetch_assoc();
$sub_id = $fs_te["sub_id"];

$user = Database::search("SELECT * FROM `student_grade_subject` 
INNER JOIN `student` ON `student`.student_id = `student_grade_subject`.stude_id 
INNER JOIN `grade` ON `student_grade_subject`.grad_id = `grade`.g_id 
INNER JOIN `subject` ON `student_grade_subject`.subj_id = `subject`.id
WHERE `grad_id`='".$grade_id."' AND `subj_id`='".$sub_id."'");

$ns = $user->num_rows;
$c = 0;
for($i = 0;$i<$ns; $i++){
    $fs= $user->fetch_assoc();
    $c++;
    ?>
 <div class="row ms-2 me-2">
                 <div class="col-1 fw-bold text-center" style="border-right: solid 1px black;"><?php echo $c; ?></div>
                 <div class="col-6 fw-bold text-center" style="border-right: solid 1px black;"><?php echo $fs["fname"]." ".$fs["lname"]; ?></div>
                 <div class="col-3 fw-bold text-center" style="border-right: solid 1px black;"><input type="number" class="col-9" id="markfield<?php echo $fs['student_id']; ?>"/></div>
                 <div class="col-2 text-center" style="border-right: solid 1px black;"><button class="col-10 col-lg-6 btn btn-warning" onclick="addStudentMarks(<?php echo $fs['grad_id']; ?>,<?php echo $fs['student_id']; ?>);"><i class="uil uil-corner-down-right-alt fs-4"></i></button></div>
                  </div>
                  <hr/>
<?php
}
?>