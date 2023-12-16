<?php
require "connection.php";
session_start();
$idA = $_SESSION["a"];

$ac = Database::search("SELECT * FROM `academic_officer` WHERE `id` = '".$idA["id"]."'");
$fsA = $ac->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Acedemic officer's Panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="mycss/acedemic.css">
        <link rel="icon" href="images/logo2.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
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

         <div class="col-12 row mt-4 mb-5">
          <div class="col-10 ms-2">
            <span class="nametag"><h3 class="verification"><?php echo $fsA["verification_code"]; ?> &nbsp;&nbsp; <?php echo $fsA["fname"]." ".$fsA["lname"]; ?></h3></span>
            <span class="nametag"><h6 class="verification"> &nbsp;&nbsp; <?php echo $fsA["email"]; ?> &nbsp;&nbsp; Acedemic officer</h6></span>
            
           
          </div>
        </div>
        <div class="col-12">
  
  <div class="card col-12">
    <div class="card-header col-12">
      
      <div class="d-flex">
        <div class="title">
          <h3>AIBS Institute</h3>
          <!-- <p class="mb-4">Created with &#x1F9E1; by <a href="https://elmah.io/?utm_source=codepen&utm_medium=social&utm_campaign=codepen" target="_blank">elmah.io</a> team.</p> -->
        </div>
        <div class="ml-auto">
          <!-- <a class="text-dark" href="https://elmah.io/?utm_source=codepen&utm_medium=social&utm_campaign=codepen" target="_blank"> -->
            <div class="elmahio-ad d-flex">
              <div class="logo"><img src="images/logo1.png" /></div>
              <div class="motto d-none d-sm-block px-2">If we can challenge convention, we can solve any problem..</div>
            </div>
          </a>
        </div>
      </div>
      
      <!-- START TABS DIV -->
      <div class="tabbable-responsive">
        <div class="tabbable">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item first">
              <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Notice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Student Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Send Invitations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">View Released Marks</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth" aria-selected="false">Inqueries</a>
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
  
  <button class="btn btn-success col-12" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <span class="noticeg">See your Notices</span>

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
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='2'  ORDER BY `id` DESC LIMIT 5");
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
    $noticeA = Database::search("SELECT * FROM `notice` WHERE `user_type_u_id`='2'  ORDER BY `id` DESC LIMIT 5 OFFSET 5");
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
          <h5 class="card-title fw-bold text-success fs-3">Student Registrations</h5>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 offset-5 showerror" id="error"></div>
                <div class="col-6 mt-4">
                  <input type="text" class="form-control" placeholder="First Name" id="f"/>
                </div>
                <div class="col-6 mt-4">
                <input type="text" class="form-control" placeholder="Last Name" id="l"/>
                </div>
                <div class="col-12 mt-4">
                <input type="email" class="form-control" placeholder="Email" id="e"/>
                </div>
                <div class="col-8 offset-3 mt-4">
                <button class="btn btn-success col-8" onclick="registerstudentByA();">Register</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <span class="fw-bold text-center fs-5"> <u>Assign Student to Grade and subject</u></span>
                </div>

                <div class="col-6">
                <span class="fw-bold fs-5">Student grade</span>
                <select class="form-select col-12" id="gr">
                 <option value="0">Select grade</option>
                 <?php 
                   $grade_s = Database::search("SELECT * FROM `grade`");
                   $gn = $grade_s->num_rows;
                   for($i=0;$i<$gn;$i++){
                     $fds = $grade_s->fetch_assoc();
                     ?>
                        <option value="<?php echo $fds["g_id"] ?>"><?php echo $fds["g_name"] ?></option>
                     <?php

                   }
                 ?>
                </select>
                </div>
                <div class="col-6">
                <span class="fw-bold fs-5">Student Subject</span>
                <select class="form-select col-12" id="su">
                 <option value="0">Select Subject</option>
                 <?php 
                   $subject_s = Database::search("SELECT * FROM `subject`");
                   $sn = $subject_s->num_rows;
                   for($i=0;$i<$sn;$i++){
                     $fds = $subject_s->fetch_assoc();
                     ?>
                        <option value="<?php echo $fds["id"] ?>"><?php echo $fds["subject_name"] ?></option>
                     <?php

                   }
                 ?>
                </select>
                </div>
                <div class="col-12">
                <span class="fw-bold fs-5">Student Name</span>
                <select class="form-select col-12" id="st">
                 <option value="0">Select Student</option>
                 <?php 
                   $student_s = Database::search("SELECT * FROM `student`");
                   $ssn = $student_s->num_rows;
                   for($i=0;$i<$ssn;$i++){
                     $fds = $student_s->fetch_assoc();
                     ?>
                        <option value="<?php echo $fds["student_id"] ?>"><?php echo $fds["fname"]."".$fds["lname"] ?> -- <?php echo $fds["email"] ?></option>
                     <?php

                   }
                 ?>
                </select>
                </div>
                <div class="col-8 offset-2 mt-3">
                  <button class="btn btn-warning col-12" onclick="addtostudentgrade();">Add</button>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      
        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
           <!-- //////start row -->
           <div class="row">
           <div class="col-lg-12 mt-3">
              <div class="card-style">
              <h4 class="text-black-50 fw-bold"><u>Students Invitations</u></h4>
                                   <!-- .................../////////table........... -->
             <div class="container wrapper" id="tabPag">
               <div class="row">
  <table class="tableinv table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
      <tr>
              <th class="col-md-2">Name</th>
              <th class="col-md-2">Email</th>
            
              <th class="col-md-2">Send / Not</th>
          </tr>
      </thead>
    
      <?php
if (isset($_GET["p"])) {
    $pageno = $_GET["p"];
} else {
    $pageno = 1;
}
$usersrs = Database::search("SELECT * FROM `student` WHERE `invitationSend`='1'");
$d = $usersrs->num_rows;
$row = $usersrs->fetch_assoc();
$result_per_page = 10;
$number_of_pages = ceil($d / $result_per_page);
$page_first_result = ((int)$pageno - 1) * $result_per_page;
$selectedrs = Database::search("SELECT * FROM `student` WHERE `invitationSend`='1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
$srn = $selectedrs->num_rows;
while ($srow = $selectedrs->fetch_assoc()) {
?>
  <tbody>
              <tr>
              <td><?php echo $srow["fname"]."".$srow["lname"]; ?></td>
              <td><?php echo $srow["email"]; ?></td>
            
              
              <td>
<button class="btn btn-success ms-1 ms-lg-5 mb-1" onclick="acedemicSendEmail(<?php echo $srow['student_id']; ?>);">Send</button>
              </td>
          </tr>
         
          </tbody>
      <?php
    }
    ?>
    
  </table>
  </div>
 <!-- pagination -->
 <div class="col-12 justify-content-center fs-5 fw-bold mt-2 text-center">
                                        <div class="pagination  justify-content-center">
                                        <?php
                                          if ($pageno <= 1) {
                                       
                                         }else{
                                          ?>
                                     <button class=" btn btn-secondary" onclick="paginationbut(<?php echo $pageno - 1; ?>);">&laquo;</button>
                                         <?php
                                           }
                                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                                if ($page == $pageno) {
                                                  ?>
                                                  <button class="ms-1 btn btn-dark active" onclick="paginationbut(<?php echo $page; ?>);"><?php echo $page; ?></button>
                                              <?php
                                                } else {
                                                  ?>
                                                  <button class="ms-1 btn btn-secondary" onclick="paginationbut(<?php echo $page; ?>);"><?php echo $page; ?></button>
                                          <?php
                                                }
                                            }
                                            
                                            
                                                        if ($pageno >= $number_of_pages) {
                                                          
                                                        } else {
                                                            ?>
                                                            <button class="ms-1 btn btn-secondary" onclick="paginationbut(<?php echo $pageno + 1; ?>);">&raquo;</button>
                                                            <?php
                                                        }
                                                        ?>
                                           
                                        </div>
                                    </div>
<!-- pagination -->
</div>
            
             <!-- ................///////////table end............... -->
                            </div>
                             </div>
               
            </div>
            <!-- //////end row -->
        </div>
        <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
       <div class="row">

         <div class="col-12">
         <h5 class="card-title fw-bold text-success">Students' Marks</h5>
         <div class="row">
         <?php
         $grade = Database::search("SELECT * FROM `grade`");
         $gn = $grade->num_rows;
         for($i=0;$i<$gn;$i++){
           $g = $grade->fetch_assoc();
         
           ?>
 <div class="col-6 col-lg-4"><button class="btn btn-success col-12 fw-bold mt-4" onclick='gradeExamload(<?php echo $g["g_id"]; ?>);' >Grade&nbsp;<?php echo $g["g_name"]; ?></button> </div>
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
        <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
          <h5 class="card-title">Contact Admin</h5>
         <div class="row">
           <div class="col-8 col-lg-10">
             <input type="text" placeholder="Type Your Message" class="col-12" style="height: 56px;" id="msgtxt"/>
           </div>
           <div class="col-4 col-lg-2">
           <button class="sendButton" onclick='sendmessage(<?php echo $idA["id"]; ?>);'>Send message</button>
           </div>
         </div>
         <div class="row">
           <div class="col-12">
             <div class="row px-4 py-5 overflow-scroll" id="chatrow" style="height: 900px;">
               <!-- //////////////////////////////// -->
               <?php
               $senderrs = Database::search("SELECT * FROM `acedemic_chat` WHERE `Academic_Officer_id`='" . $idA["id"] . "' OR `admin_id`='1' ORDER BY `date` DESC");
    // $receverrs =  Database::search("SELECT * FROM `chat` WHERE `from`='".$recever."' OR `to`='".$recever."'");

    $n = $senderrs->num_rows;

    if ($n == 0) {
?>

        <!-- empty message -->
        <div class="col-12 mb-3 text-center">
            <div class="msgbodyimg"></div>
            <p class="fs-4 mt-3 fw-bold text-black-50">No Messages To Show.</p>
        </div>
        <!-- empty message -->

        <?php
    } else {
        for ($x = 0; $x < $n; $x++) {

            $f = $senderrs->fetch_assoc();


            if ($f["Academic_Officer_id"] == $idA["id"]) {
                // echo "me : ";

                // echo "<br/>";
        ?>
                <!-- Reciever Message-->
              
                <div class="col-7 mb-2">
                <div class="media-body" >
                     
                          <?php
                          if(empty($f["adminmessage"])){ 
                          ?>
                             <div class=" rounded py-2 px-3 mb-2" style="border: solid 1px black;">
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script src="script3.js"></script>
    </body>
</html>