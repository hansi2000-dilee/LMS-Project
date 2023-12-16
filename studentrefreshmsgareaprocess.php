<?php

session_start();

require "connection.php";



    $id = $_POST["i"];
  $senderrs = Database::search("SELECT * FROM `student_chat` WHERE `student_chat_id`='" . $id . "' OR `admin_id`='1' ORDER BY `date` DESC");
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


            if ($f["student_chat_id"] == $id) {
                // echo "me : ";
?>
              
                <div class="col-7 mb-2">
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
                                       <div class="col-2 col-lg-1" style="border-right: solid 1px black;"><img src="images/logo2.png" class="ms-2" style="height: 50px; width: auto;"/></div>
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
            } else {
                // echo "you :";
                // echo $f["content"];
            ?>


<?php
            }
        }
    }

?>