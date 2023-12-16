<?php
require "connection.php";
session_start();
$idA = $_SESSION["t"];

$ac = Database::search("SELECT * FROM `teacher` WHERE `id` = '".$idA["id"]."'");
$fsA = $ac->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Teacher's Panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="mycss/teacher.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="icon" href="images/logo2.png">
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
      <div class="col-12 row mt-5 mb-5">
          <div class="col-10 ms-5">
          <span class="nametag"><h3 class="verification fw-bold"><?php echo $fsA["verification_code"]; ?> &nbsp;&nbsp; <?php echo $fsA["firstname"]." ".$fsA["lastname"]; ?></h3></span>
            <span class="nametag"><h6 class="verification fw-bold"> &nbsp;&nbsp; <?php echo $fsA["email"]; ?> &nbsp;&nbsp;Teacher</h6></span>
            
           
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
              <div class="motto d-none d-sm-block px-2">Teaching is the highest form of understanding.</div>
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
              <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Add Lessons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">Add student Results</a>
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
                <!-- /////////////////////////////////////////////////////////////////// -->
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
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='1'  ORDER BY `id` DESC LIMIT 5");
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
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='1'  ORDER BY `id` DESC LIMIT 5 OFFSET 5");
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
              <!-- /////////////////////////////////////////////////////////////////// -->
        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
          <h5 class="card-title offset-3 offset-lg-5 text-black fw-bold"><u>Your Lecture Time table</u></h5>
          <div class="row mt-5">
            <div class="col-10 offset-1 mt-5">
              <div class="row">
                <div class="col-12">
                <div class="row mb-3">
                <?php
                  $time = Database::search("SELECT * FROM `timetable`  INNER JOIN `teacher` ON `timetable`.teacher_id = `teacher`.id INNER JOIN `subject` ON `subject`.id = `timetable`.`subject` INNER JOIN `grade` ON `grade`.g_id = `timetable`.`Grade` WHERE  `timetable`.`teacher_id` = '".$idA["id"]."' ORDER BY `timetable`.id DESC LIMIT 4");
                  $tn = $time->num_rows;
                  $c = 0;
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
                  ?>
               </div>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- /////////////////////////////////////////////////////////////////// -->
        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
          <h5 class="card-title fw-bold text-success text-center"><u>Add Student Lessons</u></h5>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 mb-3 justify-content-center text-center text-danger" id="error"></div>
               
                    <div class="col-10 offset-1 mb-3">
                      <select class="form-select col-12" id="g">
                        <option value="0">Select Grade</option>
                        <?php
                       $sub = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id WHERE `te_id`='".$idA["id"]."'");
                       $tn = $sub->num_rows;
                       for($i=0;$i<$tn;$i++){
                         $su = $sub->fetch_assoc();
                         ?>
                             <option value="<?php echo $su["g_id"] ?>"><?php echo $su["g_name"] ?></option>
                         <?php
                       }
                        ?>
                      </select>
                    </div>
                    <div class="col-10 offset-1 mb-3">
<span class="fw-bold mb-2 text-center fs-6">Lesson Name</span><br/>
<input type="text" class="form-control col-12" placeholder="Enter Lesson Name" id="n"/>
                    </div>
                    <!-- /////////////////////////////////// -->
                    <div class="container_file">
  <div class="card_file">
    <h3>Upload Files</h3>
    <div class="drop_box">
      <header>
        <h4>Select File here</h4>
      </header>
      <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
      <input type="file"  multiple = "" id="f">
      
    </div>

  </div>
</div>
                    <!-- ////////////////////////// -->
                    <div class="col-8 offset-2 mb-4 mt-3">
                      <button class="button-62 col-12" onclick="addlessons(<?php echo $idA['id'];  ?>);">Add your Lesson</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
                <!-- /////////////////////////////////////////////////////////////////// -->
        <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
          <h5 class="card-title fw-bold fs-5 text-success text-center">Students' Results</h5>
          <div class="row">
            <div class="col-12">
              <div class="row">
              
                    <div class="col-12 mt-2 mb-5">
                      <div class="row p-3" style="border: solid 2px green;">
                      <label class="fw-bold mb-3 mt-3">You can Add New Exams Or Assignments</label>
                      <div class="col-12 mb-3 text-center text-capitalize text-danger" id="see"></div>  
                      <div class="col-12 col-lg-6 mb-3">
                        <select class="form-select col-12" id="g1">
                        <option value="0">Select Grade</option>
                        <?php
                       $sub = Database::search("SELECT DISTINCT `gr_id` ,`g_name`,`g_id` FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id WHERE `te_id`='".$idA["id"]."'");
                       $tn = $sub->num_rows;
                       for($i=0;$i<$tn;$i++){
                         $su = $sub->fetch_assoc();
                         ?>
                             <option value="<?php echo $su["g_id"]; ?>" ><?php echo $su["g_name"]; ?></option>
                         <?php
                       }
                        ?>
                      </select>
                        </div>
                     
                        <div class="col-12 col-lg-6">
                          <input type="text" class="form-control col-12" placeholder="Add Exams Or Assignments" id="t1"/>
                        </div>
                        <div class="col-10 ms-2 col-lg-8 offset-lg-5 offset-1  mt-3"><button class="button-86 col-7 offset-lg-5 offset-3 text-white" onclick="addexam(<?php echo $idA['id']; ?>);">Add</button></div>
                      </div>
                    </div>
                    <label class="fw-bold mb-3 fs-6">Add student Results</label>
                    <div class="col-12 mb-3 text-center text-capitalize text-danger" id="addRS"></div>  
            <div class="col-6 mb-4">
               <select id="my-select" class="form-select col-12" >
  <option value="" disabled selected>Select Grade</option>
  <?php

$gu = Database::search("SELECT * FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id WHERE `te_id`='".$idA["id"]."'");
$gn = $gu->num_rows;
for($i=0;$i<$gn;$i++){
  $gfs = $gu->fetch_assoc();
  ?>
  <option value="<?php echo $gfs["g_id"]; ?>"><?php echo $gfs["g_name"]; ?></option>
<?php
}
?>

</select>

               </div>
                <div class="col-6 mb-4">
                <select class="form-select col-12" id="e">
                <option value="0">Select Exam</option>
                      </select>
                </div>
               
               <div class="col-12 text-center fw-bold mt-4 mb-2"><span>Send Student Marks </span></div>
                <div class="col-12 mb-4" style="overflow-x: hidden; overflow-y: scroll; height: 400px;">
                  <div class="row ms-2 me-2">
                 <div class="col-1 fw-bold text-center" style="border: solid 1px black;">#</div>
                 <div class="col-6 fw-bold text-center" style="border: solid 1px black;">Student_Name</div>
                 <div class="col-3 fw-bold text-center" style="border: solid 1px black;">Enter Mark</div>
                 <div class="col-2 fw-bold text-center" style="border: solid 1px black;">Submit</div>
                  </div>
                  <hr/>
                  <div id="tabload"></div>
               </div>
              </div>
            </div>
          </div>
        </div>
                <!-- /////////////////////////////////////////////////////////////////// -->
        <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
        <div class="row">

<div class="col-12">
<h5 class="card-title fw-bold text-success">Students' Marks</h5>
<div class="row">
<?php
$_SESSION["teacherID"] = $idA["id"];
$grade = Database::search("SELECT DISTINCT `gr_id` ,`g_name` FROM `teacher_grade_subect` INNER JOIN `teacher` ON `teacher`.id = `teacher_grade_subect`.te_id  INNER JOIN `subject` ON `teacher_grade_subect`.sub_id = `subject`.id  INNER JOIN `grade` ON `teacher_grade_subect`.gr_id = `grade`.g_id WHERE `te_id`='".$idA["id"]."'");

$gn = $grade->num_rows;
for($i=0;$i<$gn;$i++){
  $g = $grade->fetch_assoc();

  ?>
<div class="col-6 col-lg-4"><button class="button-37 col-12 fw-bold mt-4" onclick='gradeExamloadTeacher(<?php echo $g["gr_id"]; ?>);' >Grade&nbsp;<?php echo $g["g_name"]; ?></button> </div>
  <?php
}
?>
</div>
</div>
</div>

<div class="row  mt-5 mb-5">
<div class="col-12">
  <div class="row btsub mb-4" id="loadexams"></div>
                                    
</div>
</div>
        </div>
        <!-- /////////////////////////////////////////////////////////////////// -->
        <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab">
          <h5 class="card-title">Contact Admin</h5>
         <div class="row">
           <div class="col-8 col-lg-10">
             <input type="text" placeholder="Type Your Message" class="col-12" style="height: 56px;" id="msgtxt"/>
           </div>
           <div class="col-4 col-lg-2">
           <button class="button-88" onclick='sendTeachermessageAdmin(<?php echo $idA["id"]; ?>);'>Send message</button>
           </div>
         </div>
         <div class="row">
           <div class="col-12">
             <div class="row px-2 py-3" id="chatrow">
               <!-- //////////////////////////////// -->
               <?php
               $senderrs = Database::search("SELECT * FROM `teacher_chat` WHERE `teacher_chat_id`='" . $idA["id"] . "' OR `admin_id`='1' ORDER BY `date` DESC");
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


            if ($f["teacher_chat_id"] == $idA["id"]) {
                // echo "me : ";

                // echo "<br/>";
        ?>
                <!-- Reciever Message-->
              
                <div class="col-7 mb-1">
                <div class="media-body" >
                     
                          <?php
                          if(empty($f["adminmessage"])){ 
                          ?>
                             <div class=" rounded py-2 px-3 mb-1" style="border: solid 1px black;"><img src="images/logo2" style="height: 50px; width: auto;"/>
                          <p class="text-small mb-0 text-body">Please Wait</p>
                          </div>
                          <?php
                          }else{
                            ?>
                               <div class=" rounded mb-1" style="border: solid 1px black;">
                                 <div class="row">
                                   <div class="col-12">
                                     <div class="row">
                                       <div class="col-2 col-lg-1" style="border-right: solid 1px black;"> <img src="images/logo1.png" class="ms-2" style="height: 50px; width: auto;"/></div>
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
      <!-- END TABS DIV -->
      
    </div>

  </div>
</div>
        </div>
<?php
require "footer.php";
?>


<script src="script2.js"></script>
<script src="script3.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
</html>