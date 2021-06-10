<?php
    session_start();
    $email = $_SESSION["uemail"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
    <section id="admin_home">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Welcome <?="{$email}"?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container admin_func">
            <div class="row text-center mt-5 mb-5">
                <h2>Admin Panel</h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="cards text-center bg-light">
                        <div class="card-body">
                            <h5>All Users</h5>
                            <p>Delete customers or pharmacies</p>
                            <a href="showUsers.php">Users</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="cards text-center bg-light">
                    <div class="card-body">
                        <h5>Add Pharmacies</h5>
                        <p>Add new pharmacies</p>
                        <a href="addPharmacy.php">Add Pharmacy</a>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="cards text-center bg-light">
                    <div class="card-body">
                        <h5>Add Ambulance</h5>
                        <p>Add new Ambulances</p>
                        <a href="addAmbulance.php">Add Ambulance</a>
                    </div>
                    </div>
                </div>
            
            
                <!-- <div class="img col-md-4">
                    <a href="#">
                        <img src="../../images/1.jpg" style="margin-bottom: 15px;" alt="" />
                    </a>
                </div> -->
				<!-- <div class="img col-md-4">
                    <a href="showUsers.php">
                        <img src="../../images/2.jpg" style="margin-bottom: 15px;" alt="" />
                    </a>
                </div> -->
				<!-- <div class="img col-md-4">
                    <a href="#">
                        <img src="../../images/3.jpg" style="margin-bottom: 15px;" alt="" />
                    </a>
                </div> -->
				<!-- <div class="img col-md-4">
                    <a href="addPharmacy.php">
                        <img src="../../images/4.jpg" alt="" />
                    </a>
                </div> -->
				<!-- <div class="img col-md-4">
                    <a href="addAmbulance.php">
                        <img src="../../images/5.jpg" alt="" />
                    </a>
                </div> -->
				<!-- <div class="img col-md-4">
                    <a href="#">
                        <img src="../../images/6.jpg" alt="" />
                    </a>
                </div> -->
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="cards text-center bg-light">
                        <div class="card-body">
                            <h5>All Ambulances</h5>
                            <p>Delete Ambulances from list</p>
                            <a href="showAmbulances.php">Ambulances</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>