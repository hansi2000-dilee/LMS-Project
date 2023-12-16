<?php
session_start();
require "connection.php";

$sub = $_POST["id"];
$idA = $_SESSION["s"];

$ac = Database::search("SELECT * FROM `student` WHERE `student_id` = '".$idA["student_id"]."'");
$fsA = $ac->fetch_assoc();
$stu_id = $fsA["student_id"];
$gra_stu = Database::search("SELECT DISTINCT `grad_id` FROM `student_grade_subject` INNER JOIN `subject` ON `subject`.id = `student_grade_subject`.subj_id INNER JOIN `grade` ON `grade`.g_id = `student_grade_subject`.grad_id INNER JOIN `student` ON `student`.student_id = `student_grade_subject`.stude_id WHERE `student_grade_subject`.stude_id = '".$stu_id."'");
$g = $gra_stu->fetch_assoc();
$g_id = $g["grad_id"];
// echo $sub;
// echo $stu_id;
//  echo $g_id;
?>

  <!-- ==/////////===table===/////========== -->
  <table class="table1 mt-4 col-12">
<caption>Students Assignments</caption>
<thead>
<tr>
 <th>No</th>
 <th>Assignment name</th>
 <th>Deadline</th>
 <!-- <th>Assignment number</th> -->
 
 <th>Download</th>
 <th>Upload</th>
</tr>
</thead>
<tbody>

<?php
$exa = Database::search("SELECT * FROM `exam` INNER JOIN `subject` ON `subject`.id=`exam`.subject_id INNER JOIN `grade` ON `grade`.g_id=`exam`.grade_g_id INNER JOIN `teacher` ON `teacher`.id = `exam`.tea_id WHERE `subject_id`='".$sub."' AND `grade_g_id`='".$g_id."'");
$c = 0;
$n = $exa->num_rows;
for($i =0;$i<$n;$i++){
    $Ex = $exa->fetch_assoc();
    $c++;
    ?>
 <tr>
            <td><?php echo $c; ?></td>
            <td><?php echo $Ex["exam_name"]; ?></td>
            <td><?php echo $Ex["Deadline"]; ?></td>
        
            <td>
                
                <a download href="<?php echo $Ex["pdf_doc"]; ?>"><button class="view">Download</button></a>
            </td>
            <td>
            <div class="upload" onclick="uploadstudents(<?php echo $sub; ?>,<?php echo $stu_id; ?>,<?php echo $g_id; ?>,<?php echo $Ex['e_id']; ?>);">
     
      <button type = "button" class = "btn-warning" id="bbt">
        <i class = "fa fa-upload"></i> Upload File
        <input type="file" id="f">
      </button>
    </div>
            </td>
        </tr>
<?php
}
?>
</tbody>
</table>