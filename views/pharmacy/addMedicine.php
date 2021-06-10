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
    <section id="add_pharmacy">
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
            <div class="row text-center mb-5 mt-5">
                <h1>Add Medicine</h1>
            </div>
            <form class="row g-3 needs-validation mt-5" novalidate method="post">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="mName" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Dosage in Mg</label>
                    <input type="number" class="form-control" id="validationCustom02" name="mDosage" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Price in Euros</label>
                    <input type="number" class="form-control" id="validationCustom03" name="mPrice" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Available Units</label>
                    <input type="number" class="form-control" id="validationCustom04" name="mQuantity" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
 
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add medicine</button>
                </div>
            </form>
            <?php
            error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $mName=$_POST["mName"];
                $mDosage=$_POST["mDosage"];
                $mPrice=$_POST["mPrice"];
	            $mQuantity=$_POST["mQuantity"];
	            $mQuantityChecker = 0;

	            $conn=mysqli_connect("localhost","root","","emedicineguide");
	               if(!$conn){
		              die("Connection failed: ".mysqli_connect_error);
	               }
	               else{
                      $result = mysqli_query($conn,"SELECT * FROM medicine where ph_id='".$ph_id."' and name='".$mName."' and dosage='".$mDosage."';") or die("No Email exists".mysql_error());
                      $row = mysqli_fetch_array($result);


                      if($row["ph_id"]=$ph_id && $row["name"]==$mName && $row["dosage"]==$mDosage){
                        $message = "Medicine already exists in inventory! For adding more units please edit!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                      }
                      
                      else{
                        $sql="insert into medicine(name,dosage,price,m_quantity,ph_id,id) values('".$mName."', '".$mDosage."', '".$mPrice."', '".$mQuantity."', '".$ph_id."', LAST_INSERT_ID())";
                        $result= mysqli_query($conn,$sql)or die(mysqli_error($conn));
                        if($result){
                                   
                            $message = "Successfully added medicine!";
                             echo "<script type='text/javascript'>alert('$message');</script>";
                             header("location:home.php");
                        }
                        else
                        {
                           
                            $message = "Adding medicine was Unsuccessful!";
                             echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                }
	           
            }
        
            ?>
        </div>

    </section>
    
</body>
</html>