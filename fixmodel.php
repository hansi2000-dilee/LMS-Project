<?php
session_start();

require "connection.php";

$id = $_GET["id"];
$teach = $_SESSION["teacherID"];

$gr = Database::search("SELECT * FROM `exam`  WHERE `tea_id`='".$teach."' AND `grade_g_id`='".$id."'");
$u = $gr->num_rows;
if($u == 0){
    ?>
    <option value="0">Select Exam</option>
    <?php
}else{
    ?>
   <option value="0">Select Exam</option>
    <?php
    for($i=0; $i<$u;$i++){
        $user = $gr->fetch_assoc();
    
        ?>
        
   
   
        <option value="<?php echo $user["e_id"];  ?>" id="e"><?php echo $user["exam_name"];  ?></option>
        <?php
    
    }
}





?>