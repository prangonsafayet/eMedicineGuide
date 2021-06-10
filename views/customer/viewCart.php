<?php
    session_start();
    $email = $_SESSION["uemail"];
    $firstName = $_SESSION["firstName"];
    $address = $_SESSION["address"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
    <section id="customer_home">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">Welcome <?="{$firstName}"?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewCart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container">
        <div class="row pt-5">
        <?php


            $con=mysqli_connect("localhost","root","","emedicineguide");
            // Check connection
            if(!$con){
                die("Connection failed: ".mysqli_connect_error);
            }
            else{
                $result = mysqli_query($con,"SELECT * FROM cart where customer_email = '".$email."'");
            }
            


            while($row = mysqli_fetch_array($result))
            {
                $ph_id=$row['ph_id'];
                $result2 = mysqli_query($con,"SELECT * FROM pharmacy where id = '".$ph_id."'");
                $row2 = mysqli_fetch_array($result2);
            ?>
            <div class="col-6 mt-5">
                <div class="cards bg-light">
                    <div class="card-body">
                        <h5>Name: <?php echo $row['product_name']; ?></h5>
                        <p>Dosage: <?php echo $row['product_dosage']; ?></p>
                        <p>Price Per Unit: <?php echo $row['price_per_unit']; ?></p>
                        <p>Units Ordered: <?php echo $row['quantity']; ?></p>
                        <h6>Total Price: <?php echo $row['totalPrice']; ?></h6>
                        <h6>Pharmacy Name: <?php echo $row2['name']; ?></h6>
                        <h6>Pharmacy Contact No.: <?php echo $row2['phone']; ?></h6>
                        <p>Status: <strong><?php echo $row['status']; ?></strong></p>
                        <p>Delivery Address: <?php echo $address; ?></p>
                        <td><a href="deleteCart.php?id=<?php echo $row['id']; ?>">Remove from Cart</a></td>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
            
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>