<?php
require "connection.php";
$page = $_POST["p"];
?>

<table class="tableinv table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
      <tr>
              <th class="col-md-2">Name</th>
              <th class="col-md-2">Email</th>
              <th class="col-md-2">Username</th>
              <th class="col-md-2">password</th>
              <th class="col-md-2">Verification Code</th>
              <th class="col-md-2">Send / Not</th>
          </tr>
      </thead>
    
      <?php
if (isset($_POST["p"])) {
    $pageno = $_POST["p"];
} else {
    $pageno = 1;
}
$usersrs = Database::search("SELECT * FROM `student`");
$d = $usersrs->num_rows;
$row = $usersrs->fetch_assoc();
$result_per_page = 10;
$number_of_pages = ceil($d / $result_per_page);
$page_first_result = ((int)$pageno - 1) * $result_per_page;
$selectedrs = Database::search("SELECT * FROM `student` LIMIT " . $result_per_page . " OFFSET " . $page . "");
$srn = $selectedrs->num_rows;
while ($srow = $selectedrs->fetch_assoc()) {
?>
  <tbody>
              <tr>
              <td><?php echo $srow["fname"]."".$srow["lname"]; ?></td>
              <td><?php echo $srow["email"]; ?></td>
              <td><?php echo $srow["username"]; ?></td>
              <td><?php echo $srow["password"]; ?></td>
              <td><?php echo $srow["verification_code"]; ?></td>
              <td>
<button class="btn btn-success ms-1 ms-lg-5 mb-1">Send</button>
              </td>
          </tr>
         
          </tbody>
      <?php
    }
    ?>
    
  </table>
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
