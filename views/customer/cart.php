<?php
    session_start();
    $email = $_SESSION["uemail"];
    $firstName = $_SESSION["firstName"];
    $region = $_SESSION["region"];
    $m_id = $_GET['id'];  
    $address = $_SESSION["address"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />


</head>
<body>
    <section id="showUsers">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./home.php">Welcome <?="{$firstName}"?></a>
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

        <div class="row">
        <?php

                    $con=mysqli_connect("localhost","root","","emedicineguide");
                    // Check connection
                    if(!$con){
                        die("Connection failed: ".mysqli_connect_error);
                    }
                    else{
                        $result = mysqli_query($con,"SELECT * FROM medicine where id = '".$m_id."'");
                    }

                    echo "<table border='1'>
                    <tr>
                        <th>name</th>
                        <th>Dosage(in Mg)</th>
                        <th>Price per unit</th>
                        <th>Units available</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['dosage']; ?></td>    
                        <td><?php echo $row['price']; ?></td>    
                        <td><?php echo $row['m_quantity']; ?></td>
                    </tr>
                    <?php
                        $med_id = $row['id'];
                        $name = $row['name'];
                        $dosage = $row['dosage'];
                        $price = $row['price'];
                        $ph_id = $row['ph_id'];
                    }



                    ?>
        </div>
        <div class="row justify-content-center">
        <form class="needs-validation mt-5 mb-5" action="" method="post"  enctype='multipart/form-data'>
                        <div class="col-md-12 mb-5">
                            <label for="validationCustom01" class="form-label">Input the amount</label>
                            <input type="number" class="form-control" id="validationCustom01" name="amount" required>
                            <label for="validationCustom02" class="form-label mt-2">Upload the prescription</label>
                            <input type="file" name="uploadPrescription" id="validationCustom02" value="" required/>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button type="submit" class="btn login mb-5 col-4 justify-center" style="font-weight: bold;color: #000000; background:#c2c2ce;">Add to cart</button>
                    </form>

                    <?php

                        if ( $_SERVER["REQUEST_METHOD"] == "POST"){
                            $amount = $_POST["amount"];
                            $totalPrice = $amount * $price;
                            $filename = $_FILES["uploadPrescription"]["name"];
                            $filename=rand().$filename;
                            $target_dir = "../../upload/";
                            $target_file = $target_dir . basename($_FILES["uploadPrescription"]["name"]);  
                            // Select file type
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            // Valid file extensions
                            $extensions_arr = array("jpg","jpeg","png","gif");
                            // echo $totalPrice;




                            // Check extension
                            if( in_array($imageFileType,$extensions_arr) ){
                                // Upload file
                                if(move_uploaded_file($_FILES['uploadPrescription']['tmp_name'],$target_dir.$filename)){
                                // Insert record
                                if(!$con){
                                    die("Connection failed: ".mysqli_connect_error);
                                }
                                else{
                                    $sql="insert into cart(med_id, product_name,product_dosage,price_per_unit,quantity,totalPrice,status,customer_email,ph_id, prescription, id) values('".$med_id."', '".$name."', '".$dosage."', '".$price."', '".$amount."', '".$totalPrice."', 'pending', '".$email."', '".$ph_id."', '".$filename."',  LAST_INSERT_ID())";
                                    $result= mysqli_query($con,$sql)or die(mysqli_error($con));
                                    if($result){
                                       
                                        $message = "Added to cart!";
                                         echo "<script type='text/javascript'>alert('$message');</script>";
                                        //  header("Location:../login.php");
                                        //header("Location:index.php");
                                    }
                                    else
                                    {
                                       
                                        $message = "Error while adding to cart!";
                                         echo "<script type='text/javascript'>alert('$message');</script>";
                                    }
                                }
                                }

                            }



                        }
                            
                        ?>
        </div>

            
                    




                  
        </div>

    </section>
    
</body>
</html>