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
                    $result = mysqli_query($con,"SELECT * FROM medicine where ph_id = '".$ph_id."'");
                }

                echo "<table border='1'>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Dosage(in Mg)</th>
                    <th>Price per unit</th>
                    <th>Units available</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dosage']; ?></td>    
                    <td><?php echo $row['price']; ?></td>    
                    <td><?php echo $row['m_quantity']; ?></td>
                    <td><a href="updatePriceMedicines.php?id=<?php echo $row['id']; ?>">Update Price</a></td>
                    <td><a href="updateQuantityMedicines.php?id=<?php echo $row['id']; ?>">Update Quantity</a></td>
                    <td><a href="deleteMedicines.php?id=<?php echo $row['id']; ?>">Remove from inventory</a></td>
                </tr>
                <?php
                }
                ?>

            </div>
            
            
        </div>

    </section>
    
</body>
</html>