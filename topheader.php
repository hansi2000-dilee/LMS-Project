<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, fixed, after scrolling page, navbar, menu CSS examples" />
    <meta name="description" content="Bootstrap 5 fixed navbar on scroll page examples, Bootstrap 5" />

    <title></title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
     <link rel="icon" href="images/logo1.png">
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            window.addEventListener('scroll', function() {

                if (window.scrollY > 200) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
        // DOMContentLoaded  end
    </script>

    <style type="text/css">
        .fixed-top {
            top: -40px;
            transform: translateY(40px);
            transition: transform .3s;
        }
    </style>
</head>

<body>

    <div class="top1nav col-12">
        <div class="container">
           <div class="row">
               <div class="col-12 col-lg-7">
               <div class="widget text-body">
               <i class="uil uil-clock"></i> &nbsp;Opening Hours:  7.00 am - 10.00 pm
            </div>
               </div>
               <div class="col-7 offset-4 offset-lg-0 col-lg-4 text-body">
              
               <span class="login-site"><a href="#" class="toplinks ms-5 me-4"><i class="uil uil-facebook"></i></a></span>
               |
               <span class="login-site"><a href="#" class="toplinks ms-5 me-4"><i class="uil uil-instagram-alt"></i></a></span>
               |
               <span class="login-site"><a href="#" class="toplinks ms-5 me-4"><i class="uil uil-twitter"></i></a></span>
               </div>
           </div>
        </div>
    </div>

    <!-- ============= COMPONENT ============== -->
    <nav id="navbar_top" class="navbar shadow bottom navbar-expand-lg navbar-dark  border-dark">
        <div class="container">
        <img src="images/logo1.png" class="logo" alt="">
            <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="main_nav">


                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-dark fw-bold fs-6 " href="index.php"> Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-bold fs-6 ms-5" href="#"> Events</a></li>
                  
                    <li class="nav-item"><a class="nav-link text-dark fw-bold fs-6 ms-5" href="#"> Contact Us </a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-bold fs-6 ms-5" href="#">About Us </a></li>
                   <li class="nav-item"><a class="nav-link text-dark fw-bold fs-6 ms-5" href="#">convacation</a></li>
                </ul>

            </div>
            <!-- navbar-collapse.// -->
        </div>
        <!-- container-fluid.// -->
    </nav>
    <!-- ============= COMPONENT END// ============== -->



    
    <!-- container //  -->

</body>

</html>