<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>E-Medicine Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
    <section id="header-area"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./views/customer/signup.php">Customer SignUp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./views/login.php">Login</a>
                </li>
                </ul>
            </div>
        </nav>
	</section>
    <section id="carousel">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/19.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                                <h3 style="color:#fff">Medicine Guide</h3>
                                <p style="color: #fff;">For your health care!!</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="images/21.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                                <h3 style="color:#fff">Browse Medicine</h3>
                                <p style="color: #fff;">Find Your Medicine and Get Home Delivery !!</p>
                    </div>  
            </div>
            <div class="carousel-item">
            <img src="images/23.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                                <h3 style="color:#fff">Call Ambulence</h3>
                                <p style="color: #fff;">Call Ambulence of Any Hospital !!</p>
                    </div> 
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </section>

    <section id="promos">
        <div class="container-fluid">
            <div class="row" style="background:#eee">
                <div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;"> 
                        <img src="images/31.png" alt="" />
                        <h3>Same Day Delivery</h3>
                        <p>We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                    </div>
                    <div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;"> 
                        <img src="images/32.png" alt="" />
                        <h3>Same Day Delivery</h3>
                        <p>We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                    </div>
                    <div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;">  
                        <img src="images/33.png" alt="" />
                        <h3>Same Day Delivery</h3>
                        <p>We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                </div>
            </div>
            <div class="row">
                    <div class="col-xl-6 col-12 text-center" style="margin-top:60px;padding-bottom:30px;"> 
                        <img src="images/15.jpg" alt="" />
                    </div>
                    <div class="col-xl-6 col-12 text-center" style="margin-top:130px;padding-bottom:30px;"> 
                        <h3>Same Day Delivery</h3>
                        <p style="font-size: 16px;">We deliver your medicine on the same day you order. Customer satisfaction is our main goal! We deliver your medicine on the same day you order. Customer satisfaction is our main goal!We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                    </div>
                    <div class="col-xl-6 text-center" style="padding-bottom:30px;"> 
                            <img src="images/18.jpg" alt="" />
                    </div>
                    <div class="col-xl-6 col-12 text-center" style="margin-top:130px;padding-bottom:30px;"> 
                        <h3>Same Day Delivery</h3>
                        <p style="font-size: 16px;">We deliver your medicine on the same day you order. Customer satisfaction is our main goal! We deliver your medicine on the same day you order. Customer satisfaction is our main goal!We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                    </div>
                    <div class="col-xl-6 col-12 text-center" style="margin-top:60px;padding-bottom:30px;"> 
                        <img src="images/15a.jpg" alt="" />
                    </div>
                    <div class="col-xl-6 col-12 text-center" style="margin-top:130px;padding-bottom:30px;"> 
                        <h3>Same Day Delivery</h3>
                        <p style="font-size: 16px;">We deliver your medicine on the same day you order. Customer satisfaction is our main goal! We deliver your medicine on the same day you order. Customer satisfaction is our main goal!We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
                    </div>
            </div>
            <div class="row text-center mt-5" style="background:#eee">
                <div class="col-12 mt-5">
                    <img src="images/32.png" alt="" />
                    <h3>Sign Up today</h3> <br>
                        <a href="./views/customer/signup.php" style="background:#7DD2DB; color: white; padding: 10px">As Customer</a>
                    <br>
                    <br>
                    <p style="font-weight: bold; font-size: 15px;">Sign Up to get access all the medicine and order !!</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid" style="background: #1a1a1ae6;">
            <div class="row">
            <div class="col-md-12 text-center" style="margin-top:30px;padding-bottom:20px;"> 
                <p style="font-weight: bold; font-size: 15px;color: white;">Designed by HSRW@MICStudents</p>
            </div>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</body>
</html>