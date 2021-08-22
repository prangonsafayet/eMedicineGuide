<?php
    session_start();
    $email = $_SESSION["uemail"];
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
    <section id="add_pharmacy">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./home.php">Welcome <?="{$email}"?></a>
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
                <h1>Add Pharmacy</h1>
            </div>
            <form class="row g-3 needs-validation mt-5" novalidate method="post">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="pName" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationPharmacyEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="validationPharmacyEmail" name="pEmail" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationPharmacyPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="validationPharmacyPassword" name="pPassword" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Street Name, House no.</label>
                    <input type="text" class="form-control" id="validationCustom03" name="pAddress" required>
                    <div class="invalid-feedback">
                        Please provide a valid address.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Region</label>
                    <select class="form-select" id="validationCustom04" required name="pRegion">
                        <option selected disabled value="">Choose...</option>
                        <option value="Duisburg">Duisburg</option>
                        <option value="Essen">Essen</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid region.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Phone no.</label>
                    <input type="text" class="form-control" id="validationCustom03" name="pPhone" required>
                    <div class="invalid-feedback">
                        Please provide a phone no.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            <?php
            error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $pName=$_POST["pName"];
                $pEmail=$_POST["pEmail"];
                $pPassword=$_POST["pPassword"];
	            $pAddress=$_POST["pAddress"];
                $pRegion=$_POST["pRegion"];
                $pPhone=$_POST["pPhone"];
	            
	            $conn=mysqli_connect("localhost","root","","emedicineguide2");
	               if(!$conn){
		              die("Connection failed: ".mysqli_connect_error);
	               }
	               else
		              //echo "Connected successfully <br>";
                      $result = mysqli_query($conn,"SELECT * FROM pharmacy where email='".$pEmail."';") or die("No Email exists".mysql_error());
                      $row = mysqli_fetch_array($result);
                      if($row["email"]==$pEmail){
                        $message = "Registration Unsuccessful! Email Already Exists!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        
                      }
                      else{
                        $sql="insert into pharmacy(email,password,name,address,region,phone,id) values('".$pEmail."', '".$pPassword."', '".$pName."', '".$pAddress."', '".$pRegion."', '".$pPhone."', LAST_INSERT_ID())";
                        $result= mysqli_query($conn,$sql)or die(mysqli_error($conn));
                                if($result){
                                   
                                    $message = "Successfully added pharmacy!";
                                     echo "<script type='text/javascript'>alert('$message');</script>";
                                     header("location:home.php");
                                    //  header("Location:../login.php");
                                    //header("Location:index.php");
                                }
                                else
                                {
                                   
                                    $message = "Registration Unsuccessful!";
                                     echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                      }
	           
            }
            ?>
        </div>

    </section>
    
</body>
</html>