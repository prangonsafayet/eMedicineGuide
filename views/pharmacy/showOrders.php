<?php
    session_start();
    $email = $_SESSION["uemail"];
    $name = $_SESSION["name"];
    $ph_id = $_SESSION["ph_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Pharmacy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />

</head>
<body>
    <section id="showUsers">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./home.php">Welcome <?="{$name}"?></a>
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
            <div class="row p-5">



            <?php


                $con=mysqli_connect("localhost","root","","emedicineguide");
                // Check connection
                if(!$con){
                    die("Connection failed: ".mysqli_connect_error);
                }
                else{
                    $result = mysqli_query($con,"SELECT * FROM cart where ph_id = '".$ph_id."' AND status='pending'");
                    $i=0;
                }


                while($row = mysqli_fetch_array($result))
                {
                    $i++;
                    $cus_email=$row['customer_email'];
                    $med_id=$row['med_id'];
                    $result2 = mysqli_query($con,"SELECT * FROM customer_signup where email = '".$cus_email."'");
                    $row2 = mysqli_fetch_array($result2);
                    $result3 = mysqli_query($con,"SELECT * FROM medicine where ph_id = '".$ph_id."' AND id='".$med_id."'");
                    $row3 = mysqli_fetch_array($result3);
                    $imgUrl="../../upload/".$row['prescription'];
                ?>
                        <div class="col-12 order_div">
                        <div>
                            <h3>Order# <?php echo $i; ?></h3>
                            <h5>Name: <?php echo $row['product_name']; ?></h5>
                            <!-- <input type="hidden" name="ph_id"> -->
                            <p>Dosage: <?php echo $row['product_dosage']; ?></p>
                            <p>Price Per Unit: <?php echo $row['price_per_unit']; ?></p>
                            <p>Units Ordered: <?php echo $row['quantity']; ?></p>
                            <p>Units in Inventory: <?php echo $row3['m_quantity']; ?></p>
                            <h6>Total Price: <?php echo $row['totalPrice']; ?></h6>
                            <p>Status: <strong><?php echo $row['status']; ?></strong></p>
                            <p>Delivery To: <?php echo $row2['firstName']." ".$row2['lastName']; ?></p>
                            <p>Delivery Address: <?php echo $row2['address']; ?></p>
                            <p>Prescription image:</p>
                            <img src=<?php echo $imgUrl?> alt="">
                            <div class="mt-3">
                                <a href="approveOrder.php?id=<?php echo $row['id']; ?>">Approve Order</a>
                                <a href="declineOrder.php?id=<?php echo $row['id']; ?>" style="margin-left:5px; color:red;">Decline Order</a>
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