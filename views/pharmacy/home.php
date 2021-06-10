<?php
    session_start();
    $email = $_SESSION["uemail"];
    $name = $_SESSION["name"];
    $ph_id = $_SESSION["ph_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Pharmacy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Welcome <?="{$name}"?></a>
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
        <div class="container pharmacy_func">
            <div class="row text-center mt-5 mb-5">
                <h2>Pharmacy Panel</h2>
                <div class="col">
                    <div class="card">
                        <div class="col">
                            <div class="cards text-center bg-light">
                                <div class="card-body">
                                    <h5>Add Medicine</h5>
                                    <p>Add Medicine to inventory</p>
                                    <a href="addMedicine.php">Add Medicine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="col">
                            <div class="cards text-center bg-light">
                                <div class="card-body">
                                    <h5>Show Medicine</h5>
                                    <p>Show whole medicine inventory</p>
                                    <a href="showMedicines.php">Show Inventory</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="col">
                            <div class="cards text-center bg-light">
                                <div class="card-body">
                                    <h5>Show Queued Orders</h5>
                                    <p>Show Queued Orders from customers</p>
                                    <a href="showOrders.php">Show Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="col">
                            <div class="cards text-center bg-light">
                                <div class="card-body">
                                    <h5>Show Processed Orders</h5>
                                    <p>Show Processed Orders</p>
                                    <a href="showProcessedOrders.php">Show Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>