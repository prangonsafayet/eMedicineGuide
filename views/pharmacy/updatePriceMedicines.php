<?php
    session_start();
    $email = $_SESSION["uemail"];
    $name = $_SESSION["name"];
    $ph_id = $_SESSION["ph_id"];
    $id = $_GET['id'];
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
                <form class="row g-3 needs-validation mt-5" action="" method="post" >
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">New Price</label>
                        <input type="number" class="form-control" id="validationCustom01" name="mPrice" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <button type="submit" class="btn login" style="font-weight: bold;color: #000000; background:#c2c2ce;">Update Price</button>
                </form>

            </div>
            
            
        </div>

    </section>
    
</body>
</html>




<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST"){
    $mPrice = $_POST["mPrice"];

    $con=mysqli_connect("localhost","root","","emedicineguide");

    if(!$con){
        die("Connection failed: ".mysqli_connect_error);
    }
    else{
        
        // get id through query string
        $result = mysqli_query($con,"UPDATE medicine SET price ='".$mPrice."' where id='".$id."';") or die("Failed to Login".mysql_error());
        header("location:showMedicines.php"); 
    }

}
    
?>