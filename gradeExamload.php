<?php
session_start();
require "connection.php";
$id = $_GET["id"];
if(isset($id)){
    $gr = Database::search("SELECT * FROM `grade` WHERE `g_id`='".$id."'");
    $fs = $gr->fetch_assoc();
    $_SESSION["g"] = $fs["g_id"];
    ?>
 <span class="fs-3 fw-bold text-black ms-5">Grade &nbsp;<?php echo $fs["g_name"]; ?>&nbsp;Subjects</span>
    <?php
    
    $exams = Database::search("SELECT  * FROM `subject`");
$sn = $exams->num_rows;
for($i=0;$i<$sn;$i++){
    $fs = $exams->fetch_assoc();
    $sid = $fs["id"];
    $ex = Database::search("SELECT * FROM `exam` WHERE `grade_g_id`='".$id."' AND `subject_id`='". $sid."'");
    $ssn=$ex->num_rows;
    ?>

             <div class="col-6 col-lg-4 "><button class="btn btn-dark col-12 fw-bold mt-4 justify-content-end text-center" onclick='searchexams(<?php echo $fs["id"]; ?>);'><?php echo $fs["subject_name"]; ?> &nbsp;&nbsp;&nbsp;<span class="badge badge-success"><?php echo $ssn; ?></span></button> </div>

    <?php

}
?>

<?php
}


?>