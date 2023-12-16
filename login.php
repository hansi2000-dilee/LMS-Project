<!DOCTYPE html>
<html>
    <head>
        <title>Login </title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/logo2.png">
        <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.min.css">
        <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
       
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        
     <?php
     require "topheader.php";
     ?>
     <div class="row">
         <div class="col-12">
             <div class="row">
                 <div class="col-12 col-lg-6">
                  <!-- ............carousel............... -->
                  <div id="carouselExampleSlidesOnly" class="carousel slide ms-1 ms-lg-4 mt-5 mb-3" data-bs-ride="carousel" style="height: 550px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/s1.png" class="d-block w-100" alt="..." style="height: 550px;">
    </div>
    <div class="carousel-item">
      <img src="images/s2.png" class="d-block w-100" alt="..." style="height: 550px;">
    </div>
    <div class="carousel-item">
      <img src="images/s3.png" class="d-block w-100" alt="..." style="height: 550px;">
    </div>
  </div>
</div>
                  <!-- ...............carousel................... -->
                 </div>
                 <div class="col-10 col-lg-5 mt-4 justify-content-center  log">
                 <div class="sendemail justify-content-center text-bold ms-5 ms-lg-3">
    <span class="semail justify-content-center  text-bold fs-5 ">If you are login  for the first time , then your <b> username</b> and 
    <b>password</b><b class="text-black-50">&nbsp;&nbsp;has been emailed.</b></span>
    </div>
                 <div class="container ms-5 ms-lg-1 mt-2 mt-lg-4">
        <div class="item-container ">
            <h2 class="log-in">Log in</h2>
        </div>
        <div class="justify-content-center text-center text-danger" id="errL">
 
</div>
     
       
        <!-- <form> -->
            <div class="form-input">
                <label for="text" class="label">Username</label>
                <input type="text" class="col-12" id="uname">
            </div>
            <div class="form-input">
                <label for="password" class="label">Password</label>
                <input type="password" class="col-12" id="upas">
            </div>
            <!-- <div class="form-input">
                <label for="text" class="label">verification code</label>
                <input type="text" class="col-12" id="uveri">
            </div> -->
            <div class="form-input">
                <label for="text" class="label">Select your correct user type</label>
               <select class="form-select col-12" id="ut" style="height: 43px;">
               <option value="0">Your user Type</option>
               <option value="1">Teacher</option>
               <option value="2">Acedemic Officer</option>
               <option value="3">Student</option>
               
               </select>
            </div>
           
            <div>
                <button type="submit" onclick="login();" id="btnlog">Log in</button>
            </div>
        <!-- </form> -->
       
    </div>


<!-- Modal -->
<div class="modal fade" id="loginemailid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold text-success" id="exampleModalLongTitle">Verify your account</h5>
      
      
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-12 text-center text-danger justify-content-center mb-2 fw-bold" id="error"></div>
          <div class="col-12">

                <h6 class="text-success mt-2" >The verification code will be sent to your email</h6>
              <input type="Text" placeholder="Your Verification Code *" class="form-control col-12 modtex" id="v" required/>
              </div>
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="refreshrequest();">Close</button>
        <button type="button" class="btn btn-success" onclick="verification(); " id="b3">Verify</button>
      </div>
    </div>
  </div>
</div> 
   
                 </div>
                 <!-- ................ -->
             </div>
         </div>
     </div>
   
  <?php
   require "footer.php";
  ?>
    <script src="register_login.js"></script>
    <script src="bootstrap.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </body>
</html>