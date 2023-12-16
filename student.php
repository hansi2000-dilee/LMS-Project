<?php
require "connection.php";
session_start();
$idA = $_SESSION["s"];

$ac = Database::search("SELECT * FROM `student` WHERE `student_id` = '".$idA["student_id"]."'");
$fsA = $ac->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student's Panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="mycss/student.css">
        <link rel="icon" href="images/logo2.png">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        require "topheader.php";
        ?>

<div class="row mt-3">
         <div class="col-10 offset-1" style="border: solid 1px black; padding: 14px;">
           <div class="row">
             <div class="col-12 col-lg-4 fw-bold fs-4">Learning Management System(LMS)</div>
             <div class="col-12 col-lg-2 fw-bold"><a href="index.php"><i class="uil uil-home fs-3"></i>&nbsp;&nbsp;HOME</a></div>
             <div class="col-12 col-lg-2 fw-bold"><a href="myprofile.php"><i class="uil uil-user-circle fs-3"></i>&nbsp;&nbsp;MY PROFILE</a></div>
             <div class="col-12 col-lg-2 fw-bold"><a href="#"><i class="uil uil-edit-alt fs-3"></i>&nbsp;&nbsp;EDIT PROFILE</a></div>
             <div class="col-12 col-lg-2 fw-bold"><a href="#"><i class="uil uil-signout fs-3"></i>&nbsp;&nbsp;SIGN OUT</a></div>
             
           </div>
         </div>
        </div>
         <div class="row mt-5 mb-5">
          <div class="col-10 ms-5">
          <span class="nametag"><h3 class="verification fw-bold"><?php echo $fsA["verification_code"]; ?> &nbsp;&nbsp; <?php echo $fsA["fname"]." ".$fsA["lname"]; ?></h3></span>
            <span class="nametag"><h6 class="verification fw-bold"> &nbsp;&nbsp; <?php echo $fsA["email"]; ?> &nbsp;&nbsp; Student</h6></span>
            
           
          </div>
        </div>
        <div class="col-12">
  
  <div class="card col-12">
    <div class="card-header col-12">
      
      <div class="d-flex">
        <div class="title">
          <h3 class="fw-bold">AIBS Institute</h3>
          <!-- <p class="mb-4">Created with &#x1F9E1; by <a href="https://elmah.io/?utm_source=codepen&utm_medium=social&utm_campaign=codepen" target="_blank">elmah.io</a> team.</p> -->
        </div>
        <div class="ml-auto">
          <!-- <a class="text-dark" href="https://elmah.io/?utm_source=codepen&utm_medium=social&utm_campaign=codepen" target="_blank"> -->
            <div class="elmahio-ad d-flex">
              <div class="logo"><img src="images/logo1.png" /></div>
              <div class="motto d-none d-sm-block px-2">Be the best for yourself, its better to achieve success rather than showing.</div>
            </div>
          </a>
        </div>
      </div>
      
      <!-- START TABS DIV -->
      <div class="tabbable-responsive">
        <div class="tabbable">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item first">
              <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Notice Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">TimeTable</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">View Lessons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">Assignments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth" aria-selected="false">View Results</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="sixth-tab" data-toggle="tab" href="#sixth" role="tab" aria-controls="sixth" aria-selected="false">Inqueries</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      
      <div class="tab-content">
        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
        <div class="row">
          <div class="col-12">
              
          <p>
  
          <button class="button-82-pushable col-9 offset-1" role="button" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <span class="button-82-shadow"></span>
  <span class="button-82-edge"></span>
  <span class="button-82-front text">
  AIBS Institute
  </span>
</button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    
  <!-- ......................................... -->
  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Old</button>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <?php
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='3'  ORDER BY `id` DESC LIMIT 5");
    $na = $noticeA->num_rows;
    $c = 0;
    for($i=0;$i<$na;$i++){
      $nfs = $noticeA->fetch_assoc();
      $c++;
      ?>
<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-1"><?php echo $c; ?></div>
      <div class="col-8"><?php echo $nfs["notice"]; ?></div>
      <div class="col-3"><?php echo $nfs["Data"]; ?></div>

    </div>
  </div>
</div>
<hr/>
      <?php
}
    ?>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <?php
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='3'  ORDER BY `id` DESC LIMIT 5 OFFSET 5");
    $na = $noticeA->num_rows;
    $c = 0;
    for($i=0;$i<$na;$i++){
      $nfs = $noticeA->fetch_assoc();
      $c++;
      ?>
<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-1"><?php echo $c; ?></div>
      <div class="col-8"><?php echo $nfs["notice"]; ?></div>
      <div class="col-3"><?php echo $nfs["Data"]; ?></div>

    </div>
  </div>
</div>
<hr/>
      <?php
}
    ?>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
  <!-- ........................................ -->
  </div>
</div> 
            
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
          <h5 class="card-title offset-3 offset-lg-5 text-black fw-bold"><u>Your Lecture Time table</u></h5>
          <div class="row mt-5">
            <div class="col-10 offset-1 mt-3">
              <div class="row">
                <div class="col-12">
                <div class="row mb-3">
                <?php
                  $time = Database::search("SELECT * FROM `timetable_student`  INNER JOIN `student` ON `timetable_student`.stUde_id = `student`.student_id INNER JOIN `subject` ON `subject`.id = `timetable_student`.`subject` INNER JOIN `grade` ON `grade`.g_id = `timetable_student`.`grade` WHERE  `timetable_student`.stUde_id = '".$idA["student_id"]."' ORDER BY `timetable_student`.ts_id DESC LIMIT 4");
                  $tn = $time->num_rows;
                  $c = 0;
                  if($tn == 0){
                    ?>
                    <div class="col-12 fw-bold fs-6 text-center text-success">No Lessons Sheaduled for you</div>
                                <?php
                  }else{
                    for($i=0;$i<$tn;$i++){
                      $fat = $time->fetch_assoc();
                      $c++;
                      ?>
                     <div class="col-7 col-md-6 col-lg-4 col-xl-3">
                       <a class="card2" href="#">
      <h4 class="fw-900 ms-3"><i class="uil uil-book-open fs-3"></i> &nbsp;&nbsp; <?php echo $fat["subject_name"]; ?></h4>
      <hr/>
      <p class="fw-bold fs-6"><i class="uil uil-graduation-cap"></i> &nbsp;&nbsp; Grade &nbsp;<?php echo $fat["g_name"]; ?> </p>
      <hr/>
      <p class="fw-bold fs-6"><i class="uil uil-clock-eight"></i> &nbsp;&nbsp; Time : &nbsp;<?php echo $fat["time"]; ?></p>
      <hr/>
      <p class="fw-bold fs-6"><i class="uil uil-calendar-alt"></i> &nbsp;&nbsp; Date : &nbsp;<?php echo $fat["date"]; ?></p>
      <hr/>
   
  <button class="button-72" role="button"><i class="uil uil-link fs-4"></i>&nbsp;&nbsp;Join Now</button>
    </a>
    </div>
   <?php
  
                    }
                  }
              
                  ?>
               </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
        <div class="row">
      <?php
            $stu_grade = Database::search("SELECT * FROM `student_grade_subject` INNER JOIN `subject` ON `subject`.id = `student_grade_subject`.subj_id INNER JOIN `grade` ON `grade`.g_id = `student_grade_subject`.grad_id INNER JOIN `student` ON `student`.student_id = `student_grade_subject`.stude_id WHERE `student_grade_subject`.stude_id = '".$idA["student_id"]."'");
            $ns = $stu_grade->num_rows;
            if($ns == 0){
            ?>
<div class="col-12 fw-bold fs-6 text-center text-success">No Lessons Sheaduled for you</div>
            <?php
            }else{
              for($i=0;$i<$ns;$i++){
                $fs = $stu_grade->fetch_assoc();
             ?>
              <div class="cardsub">
       <details class="warning" >
        <summary><?php echo $fs["subject_name"]; ?></summary>
        <?php
       
  $lesson = Database::search("SELECT * FROM `lessons` INNER JOIN `subject` ON `subject`.id = `lessons`.subect_id INNER JOIN `grade` ON `grade`.g_id = `lessons`.grade_id WHERE `lessons`.grade_id = '".$fs["grad_id"]."' AND `lessons`.subect_id = '".$fs["subj_id"]."'");
  $nl = $lesson->num_rows;
 if($nl <= 0){
?>
<p>No Lessons Added.</p>
<?php
 }else{
    while($fl = $lesson->fetch_assoc()){
      ?>

      <p class="fw-bold fs-5"><u><?php echo $fl["lesson_name"]; ?></u></p> 
      <div class="row">
        <div class="col-12">
          <div class="row">
          <div class="col-12 text-center justify-content-center  subname1">
                 <span class="fw-bold text-black text-center justify-content-center fs-4"><?php echo $fs["subject_name"]; ?>&nbsp;--&nbsp;<?php echo $fl["lesson_name"]; ?></span>
                 </div>
                 <!-- ==/////////===table===/////========== -->
                 <table class="tablel mt-4">
        <caption>Lecture Notes</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Lesson name</th>
                <th>Lesson number</th>
                
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               
                <td>1</td>
                <td><?php echo $fl["lesson_name"]; ?></td>
                <td><?php echo $fl["lesson_chapter"]; ?></td>
                <td>
                    <button class="view">Download</button>
                 
                </td>
            </tr>
</tbody>
        
    </table>
        <!-- ==/////////===table===/////========== -->
          </div>
        </div>
      </div>
     <?php
    }
  

 }
    ?>
            </details>
       </div>
               
   
                <?php
              }
           
            }
        ?>
      </div>
              </div>
       
        <!-- ///////////=========//////////////////////======================= -->
        <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
         <div class="row">
           <div class="col-12 justify-content-center">
             <button class="col-5 offset-3 justify-content-center btn btn-outline-success"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View Assignments</button>
             <div class="collapse mt-3" id="collapseExample">
           <div class="card card-body">
             <div class="row">
      <div class="col-12">
        <div class="row">
           <?php
            $STu_grade = Database::search("SELECT * FROM `student_grade_subject` INNER JOIN `subject` ON `subject`.id = `student_grade_subject`.subj_id INNER JOIN `grade` ON `grade`.g_id = `student_grade_subject`.grad_id INNER JOIN `student` ON `student`.student_id = `student_grade_subject`.stude_id WHERE `student_grade_subject`.stude_id = '".$idA["student_id"]."'");
            $nss = $STu_grade->num_rows;
            if($nss == 0){
            ?>
<div class="col-12 fw-bold fs-6 text-center text-success">No Subjects Sheaduled for you</div>
            <?php
            }else{
              for($i=0;$i<$nss;$i++){
                $fs = $STu_grade->fetch_assoc();
                ?>
          <div class="col-6 col-lg-4"><button class="btn btn-success col-12" onclick="loadexamss(<?php echo $fs['id']; ?>);"><?php echo $fs["subject_name"]; ?></button></div>
                <?php
              }
            }
         ?>
</div>
</div>

          </div>

           </div>
             </div>

           </div>
           <div class="col-10 offset-1" id="loExams">

</div>
         </div>
        </div>
         <!-- ///////////=========//////////////////////======================= -->
        <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
        <div class="row">
           <div class="col-12 justify-content-center">
             <button class="col-5 offset-3 justify-content-center button-72"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View Assignments</button>
             <div class="collapse mt-3" id="collapseExample">
           <div class="card card-body">
             <div class="row">
      <div class="col-12">
        <div class="row">
           <?php
            $STu_grade = Database::search("SELECT * FROM `student_grade_subject` INNER JOIN `subject` ON `subject`.id = `student_grade_subject`.subj_id INNER JOIN `grade` ON `grade`.g_id = `student_grade_subject`.grad_id INNER JOIN `student` ON `student`.student_id = `student_grade_subject`.stude_id WHERE `student_grade_subject`.stude_id = '".$idA["student_id"]."'");
            $nss = $STu_grade->num_rows;
            if($nss == 0){
            ?>
<div class="col-12 fw-bold fs-6 text-center text-success">No Subjects Sheaduled for you</div>
            <?php
            }else{
              for($i=0;$i<$nss;$i++){
                $fs = $STu_grade->fetch_assoc();
                ?>
          <div class="col-6 col-lg-4"><button class="btn btn-outline-success col-12" onclick="loadexamssResult(<?php echo $fs['id']; ?>);"><?php echo $fs["subject_name"]; ?></button></div>
                <?php
              }
            }
         ?>
</div>
</div>

          </div>

           </div>
             </div>

           </div>
           <div class="col-10 offset-1" id="viewRe">
           </div>
           <div class="col-10 offset-1" id="loadRe">

</div>
        
        </div>
        </div>
        <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab">
        <h5 class="card-title">Contact</h5>
         <div class="row">
           <div class="col-8 col-lg-10">
             <input type="text" placeholder="Type Your Message" class="col-12" style="height: 56px;" id="msgtxt"/>
           </div>
           <div class="col-4 col-lg-2">
           <button class="button-88" onclick='sendStudentmessageAdmin(<?php echo $idA["student_id"]; ?>);'>Send message</button>
           </div>
         </div>
         <div class="row">
           <div class="col-12">
             <div class="row px-2 py-3" id="chatrow">
               <!-- //////////////////////////////// -->
               <?php
               $senderrs = Database::search("SELECT * FROM `student_chat` WHERE `student_chat_id`='" . $idA["student_id"] . "' OR `admin_id`='1' ORDER BY `date` DESC");
               $n = $senderrs->num_rows;

    if ($n == 0) {
?>

        <!-- empty message -->
        <div class="col-12 mb-1 text-center">
            <div class="msgbodyimg"></div>
            <p class="fs-4 mt-1 fw-bold text-black-50">No Messages To Show.</p>
        </div>
        <!-- empty message -->

        <?php
    } else {
        for ($x = 0; $x < $n; $x++) {

            $f = $senderrs->fetch_assoc();


            if ($f["student_chat_id"] == $idA["student_id"]) {
                // echo "me : ";

                // echo "<br/>";
        ?>
                <!-- Reciever Message-->
              
                <div class="col-7 mb-1">
                <div class="media-body" >
                     
                          <?php
                          if(empty($f["adminmessage"])){ 
                          ?>
                              <div class=" rounded mb-1" style="border: solid 1px black;">
                          <div class="row">
                                   <div class="col-12">
                                     <div class="row">
                                     <div class="col-2 col-lg-1" style="border-right: solid 1px black;"> <img src="images/logo2.png" class="ms-2" style="height: 50px; width: auto;"/></div>
                                       <div class="col-10 col-lg-11"><p class="text-small mb-0 text-body">Please Wait</p></div>
                                     </div>
                                   </div>
                                 </div>
                          </div>
                          <?php
                          }else{
                            ?>
                               <div class=" rounded mb-1" style="border: solid 1px black;">
                                 <div class="row">
                                   <div class="col-12">
                                     <div class="row">
                                     <div class="col-2 col-lg-1" style="border-right: solid 1px black;"> <img src="images/logo2.png" class="ms-2" style="height: 50px; width: auto;"/></div>
                                       <div class="col-10 col-lg-11"><p class="text-small mb-0 text-body p-1"><?php echo $f["adminmessage"]; ?></p></div>
                                     </div>
                                   </div>
                                 </div>
                              </div>
                          <?php
                          }
                          ?>
                            
                        
                      
                    </div>
                </div>
                <div class="col-7 media ml-auto">
                    <div class="media-body">
                    <div class=" rounded mb-1" style="border: solid 1px black;">
                                 <div class="row">
                                   <div class="col-12">
                                     <div class="row">
                                       <div class="col-2 col-lg-1" style="border-right: solid 1px black;"> <img src="images/user.png" class="ms-2" style="height: 50px; width: auto;"/></div>
                                       <div class="col-10 col-lg-11"><p class="text-small mb-0 text-body p-1"><?php echo $f["message"]; ?></p></div>
                                     </div>
                                   </div>
                                 </div>
                              </div>
                        <p class="small text-muted"><?php echo $f["date"]; ?></p>
                    </div>
                </div>
     
                <!-- Reciever Message -->



            <?php
            } 
          }
        }
        ?>
               <!-- ////////////////////////////// -->
             </div>
           </div>
         </div>
      </div>
      </div>
      <!-- END TABS DIV -->
      
    </div>
   
  </div>
</div>
<?php
require "footer.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script2.js"></script>
    </body>
</html>