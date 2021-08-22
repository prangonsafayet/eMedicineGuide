<?php
    session_start();
    $email = $_SESSION["uemail"];
    $region = $_SESSION["region"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Delivery Guy</title>
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
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row p-5">
            <?php

                    $status="Sent out for delivery";
                    $con=mysqli_connect("localhost","root","","emedicineguide2");
                    // Check connection
                    if(!$con){
                        die("Connection failed: ".mysqli_connect_error);
                    }
                    else{
                        $result = mysqli_query($con,"SELECT * FROM cart where customer_region = '".$region."' AND (status='Sent out for delivery' OR status='Delivery guy accepted' OR status='Previous delivery cancelled! Looking for another one!' OR status='Delivered')");
                    }



                    while($row = mysqli_fetch_array($result))
                    {
                        $ph_id=$row['ph_id'];
                        $customer_email=$row['customer_email'];
                        $result2 = mysqli_query($con,"SELECT * FROM pharmacy where id = '".$ph_id."'");
                        $row2 = mysqli_fetch_array($result2);
                        $result3 = mysqli_query($con,"SELECT * FROM customer_signup where email = '".$customer_email."'");
                        $row3 = mysqli_fetch_array($result3);
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
                                <h6>Ordered on: <?php echo $row['date']; ?></h6>
                                <p>Status: <strong><?php echo $row['status']; ?></strong></p>
                                <p>Delivery Address: <?php echo $row3['address']; ?></p>
                                <td><a href="acceptOrder.php?id=<?php echo $row['id']; ?>">Accept Order</a></td>
                                <td><a href="declineOrder.php?id=<?php echo $row['id']; ?>" style="color:red">Decline Order</a></td>
                                <td><a href="delivered.php?id=<?php echo $row['id']; ?>" style="color:green">Delivered!</a></td>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

            </div>
            
            
        </div>

    </section>
    
</body>
</html>