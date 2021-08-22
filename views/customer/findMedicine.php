<?php
    session_start();
    $email = $_SESSION["uemail"];
    $firstName = $_SESSION["firstName"];
    $region = $_SESSION["region"];
    $address = $_SESSION["address"];
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
            <div class="row p-5">
            <form action="" method="post">
            <label>Search for Medicines</label>
                <input type="text" name="search">
                <input type="submit" name="submit" value="Search">
            </form>


            <?php
                error_reporting(0);
                $con=mysqli_connect("localhost","root","","emedicineguide2");
                $search_value=$_POST["search"];
                if (isset($_POST['submit'])){
                    if(!$con){
                        die("Connection failed: ".mysqli_connect_error);
                    }
                    else{
                        // Check connection
                        if(!$con){
                            die("Connection failed: ".mysqli_connect_error);
                        }
                        else{
                            $result = mysqli_query($con,"SELECT * FROM pharmacy where region = '".$region."'");
                        }

                        echo "<table border='1'>
                        <tr>
                            <th>Name</th>
                            <th>Dosage</th>
                            <th>Price</th>
                            <th>Available Units</th>
                            <th>Provider</th>
                            
                        </tr>";

                        while($row = mysqli_fetch_array($result))
                        {
                            $ph_id=$row["id"];
                            $result2 = mysqli_query($con,"SELECT * FROM medicine where ph_id = '".$ph_id."' AND name like '%$search_value%'");
                            while($row2 = mysqli_fetch_array($result2)){
                                ?>
                                <tr>
                                    <td><?php echo $row2['name']; ?></td>
                                    <td><?php echo $row2['dosage']; ?></td>    
                                    <td><?php echo $row2['price']; ?></td>    
                                    <td><?php echo $row2['m_quantity']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><a href="buyFromPharmacy.php?id=<?php echo $row['id']; ?>">Buy from them</a></td>
                                </tr>
                                <?php
                            }
                        
                        
                        }
                    }
                }
                else{
                    
                    // Check connection
                    if(!$con){
                        die("Connection failed: ".mysqli_connect_error);
                    }
                    else{
                        $result = mysqli_query($con,"SELECT * FROM pharmacy where region = '".$region."'");
                    }

                    echo "<table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Dosage</th>
                        <th>Price</th>
                        <th>Available Units</th>
                        <th>Provider</th>
                        
                    </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        $ph_id=$row["id"];
                        $result2 = mysqli_query($con,"SELECT * FROM medicine where ph_id = '".$ph_id."'");
                        while($row2 = mysqli_fetch_array($result2)){
                            ?>
                            <tr>
                                <td><?php echo $row2['name']; ?></td>
                                <td><?php echo $row2['dosage']; ?></td>    
                                <td><?php echo $row2['price']; ?></td>    
                                <td><?php echo $row2['m_quantity']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><a href="buyFromPharmacy.php?id=<?php echo $row['id']; ?>">Buy from them</a></td>
                            </tr>
                            <?php
                        }
                    
                    
                    }
                    
                }
                ?>
                

            </div>
            
            
        </div>

    </section>
    
</body>
</html>