<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Registeration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="icon" href="images/logo1.png">
</head>

<body>
    <div class="infinity-container col-12">
        <div class="infinity-form-block col-lg-6 offset-lg-2">
            <div class="infinity-click-box text-center col-12">Click Here to Register</div>

            <!-- FORM BEGIN -->
            <div class="infinity-fold">
                <div class="infinity-form">
                    <!-- Form -->
                    
                    <div class="error_message col-8 offset-2 g-2 mb-4" id="error"></div>
                        <!-- Input Box -->
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                <div class="form-input col-6">
                            <input type="text" name="" placeholder="First Name" required id="fname">
                        </div>
                        <div class="form-input col-6">
                            <input type="text" name="" placeholder="Last Name" required id="lname">
                        </div>
                       </div>
                        </div>
                        </div>
                       
                        <div class="form-input">
                            <input type="email" name="" placeholder="Email Address" required id="email">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                <div class="col-6">
                                <select class="form-select col-12" aria-label="Default select example" id="utype" required>
                        <option value="0" selected>Select User Type</option>
                        <?php
                       
                         $ut = Database::search("SELECT * FROM `user_type`");
                         $ut_n = $ut->num_rows;
                         for($i=0;$i<$ut_n;$i++){
                             $u = $ut->fetch_assoc(); 
                             ?>
                         <option value="<?php echo $u["user_id"] ?>"><?php echo $u["user_type"] ?></option>
                             <?php
                         }
                        ?>
                        </select>
                        </div>
                        <div class="col-6">
                        <select class="form-select col-12" aria-label="Default select example" id="utitle" required>
                        <option value="0" selected>Select user Title</option>
                        <?php
                        
                         $ut = Database::search("SELECT * FROM `namepart`");
                         $ut_n = $ut->num_rows;
                         for($i=0;$i<$ut_n;$i++){
                             $u = $ut->fetch_assoc(); 
                             ?>
                         <option value="<?php echo $u["id"] ?>"><?php echo $u["name_part"] ?></option>
                             <?php
                         }
                        ?>
                         </select>
                        </div>
                                </div>
                            </div>
                        </div>
                      
                                             

                           
                        <!-- <div class="form-input">
                            <input type="password" name="" placeholder="Password" required>
                        </div> -->
                        <!-- Register Button -->
                        <button type="submit" class="btn btn-block" onclick="registeruser();">Register</button>

                        <div class="text-center text-white">Already have an account?
                            <a class="login-link" href="index.php">Login Now</a>
                        </div>
                    
                </div>
            </div>
            <!-- FORM END -->
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.infinity-click-box').click(function() {
                $('.infinity-fold').toggleClass('active')
            })
        })
    </script>
    <script src="register_login.js"></script>
</body>

</html>