<?php
    session_start();
    $email = $_SESSION["uemail"];
    $pAddress=$_SESSION["address"];
    $pName=$_SESSION["name"];
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
    <section id="edit_pharmacy">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Welcome <?="{$email}"?></a>
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
            <div class="row text-center mb-5 mt-5">
                <h1 class="text-center">Edit Pharmacy</h1>
            </div>
            <form class="row g-3 needs-validation mt-5" novalidate method="post">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="pName">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="pAddress">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            <?php
            error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_GET['id'];
                if(empty($pName)){
                    $pName=$_SESSION["name"];
                }
                if(!empty($pName)){
                    $pName=$_POST["pName"];
                }
                if(empty($pAddress)){
                    $pAddress=$_SESSION["address"];
                }
                if(!empty($pAddress)){
                    $pAddress=$_POST["pAddress"];
                }
                echo $pName;
                echo $pAddress;
	            
	            $conn=mysqli_connect("localhost","root","","emedicineguide");
	               if(!$conn){
		              die("Connection failed: ".mysqli_connect_error);
	               }
	               else
                   
		              //echo "Connected successfully <br>";
                      $result = mysqli_query($conn,"UPDATE pharmacy SET name='".$pName."' and address='".$pAddress."' where id='".$id."';") or die("No Email exists".mysql_error());
                      header("location:showPharmacies.php"); 
	           
            }
            ?>
        </div>

    </section>
    
</body>
</html>