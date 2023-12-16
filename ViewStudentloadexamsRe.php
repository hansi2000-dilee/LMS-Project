<?php
session_start();
require "connection.php";

$sId = $_POST["sid"];
$gId = $_POST["gid"];
$eId = $_POST["eid"];
$idA = $_SESSION["s"];
?>
<table class="table2 mt-4 col-12">
<caption>Results</caption>
<thead>
<tr>
 <th>No</th>
 <th>Student</th>
 <th>Assignment name</th>
 <th>Subject</th>
 <!-- <th>Assignment number</th> -->
 
 <th>Result</th>
</tr>
</thead>
<tbody>

<?php
$exa = Database::search("SELECT * FROM `marks`
INNER JOIN `student` ON `student`.student_id=`marks`.`student_id` 
INNER JOIN `subject` ON `subject`.`id` = `marks`.`subject_id` 
INNER JOIN `exam` ON `exam`.`e_id` = `marks`.`exam_id` 
INNER JOIN `grade` ON `grade`.`g_id` = `marks`.`grade_g_id` 
WHERE `marks`.`grade_g_id`='".$gId."' 
AND `marks`.`exam_id`='".$eId."' 
AND `marks`.`status`='1' 
AND `marks`.exam_id='".$eId."' 
AND `marks`.student_id = '".$idA["student_id"]."'");
$c = 0;
$n = $exa->num_rows;
for($i =0;$i<$n;$i++){
    $Ex = $exa->fetch_assoc();
    $c++;
    ?>
 <tr>
            <td><?php echo $c; ?></td>
            <td><?php echo $Ex["fname"]."".$Ex["lname"]; ?></td>
            <td><?php echo $Ex["exam_name"]; ?></td>
            <td><?php echo $Ex["subject_name"]; ?></td>
            <td><?php echo $Ex["marks"]; ?></td>
            
            
        
           
            
            </td>
        </tr>
<?php
}
?>
</tbody>
</table>