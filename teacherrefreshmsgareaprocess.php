<?php

session_start();

require "connection.php";



    $id = $_POST["i"];
  $senderrs = Database::search("SELECT * FROM `teacher_chat` WHERE `teacher_chat_id`='" . $id . "' OR `admin_id`='1' ORDER BY `date` DESC");
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


            if ($f["teacher_chat_id"] == $id) {
                // echo "me : ";
?>
              
                <div class="col-7 mb-2">
                <div class="media-body" >
                     
                          <?php
                          if(empty($f["adminmessage"])){ 
                          ?>
                             <div class=" rounded py-2 px-3 mb-2" style="border: solid 1px black;">
                          <p class="text-small mb-0 text-body">Please Wait</p>
                          </div>
                          <?php
                          }else{
                            ?>
                               <div class="bg-success rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white"><?php echo $f["adminmessage"]; ?></p>
                          </div>
                          <?php
                          }
                          ?>
                            
                        
                      
                    </div>
                </div>

                <div class="col-7 media ml-auto">
                    <div class="media-body">
                        <div class=" rounded py-2 px-3 mb-2" style="border: solid 1px black;">
                            <p class="text-small mb-0 text-body"><?php echo $f["message"]; ?></p>
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