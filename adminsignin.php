<!DOCTYPE html>
<html>
    <head>
        <title>Admin SignIn</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="images/logo1.png"/>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
   
    </head>
    <body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid justify-content-center backcover" style="margin-top: 20px;">
    <div class="row align-content-center">

    <div class="col-12">
        <div class="row">
            <div class="col-12 logo"></div>
            <div class="col-12">
                <p class="text-center text-dark title1 fs-1 fw-bold ms-5">Hi , Welcome To <span class="title1 text-danger"> AIBS</span> Admins!</p>
            </div>
        </div>
    </div>

    <div class="col-12 p-5">
        <div class="row">
            <div class="col-6 d-none d-lg-block background" style="height: 250px;"></div>
            <div class="col-12 col-lg-6 d-block border border-2 border-danger">
                <div class="row g-3">
                    <div class="col-12">
                        <p class="title2">SignIn To Your Account</p>
                    </div>
                    <div class=" col-12">
                        <lable class="form-label">Email :</lable>
                        <input type="email" class="form-control" id="e">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary col-12" onclick="adminverification();">Send Verification Code</button>

                    </div>
       
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="verificationmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin verification </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <lable class="form-lable">ENTER the Verification code you got by an email</lable>
        <input type="text" class="form-control" id="v"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
      </div>
    </div>
  </div>
</div>


  

  </div>
  </div>
  <?php
require "footer.php";
  ?>
<script src="script.js"></script>
<script src="bootstrap.js"></script>
<script src="bootstrap.bundle.js"></script>
    </body>
</html>