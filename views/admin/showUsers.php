<?php
    session_start();
    $email = $_SESSION["uemail"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
    <section id="showUsers">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./home.php">Welcome <?="{$email}"?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row p-5 justify-content-center">
                    <h1 class="text-center">Select User Type</h1>
                    <div class="col-4 mt-5">
                        <div class="card text-center">
                            <div class="card-body">
                            <h5>All customers</h5>
                            <p>Edit customer details or delete customers</p>
                            <a class="nav-link" href="showCustomers.php">Show Customers</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-5">
                        <div class="card text-center">
                            <div class="card-body">
                            <h5>All Pharmacies</h5>
                            <p>Edit customer details or delete Pharmacies</p>
                            <a class="nav-link" href="showPharmacies.php">Show Pharmacies</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-5">
                        <div class="card text-center">
                            <div class="card-body">
                            <h5>All Delivery Guys</h5>
                            <p>Edit Delivery guy's details or delete</p>
                            <a class="nav-link" href="showDeliveryGuy.php">Show Delivery Guys</a>
                            </div>
                        </div>
                    </div>
                        
                    

            </div>
            
            
        </div>

    </section>
    
</body>
</html>