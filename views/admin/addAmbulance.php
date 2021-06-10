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
    <section id="add_ambulance">
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
                <h1>Add Ambulance</h1>
            </div>
            <form class="row g-3 needs-validation mt-5" novalidate method="post">
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Phone no.</label>
                    <input type="text" class="form-control" id="validationCustom03" name="aPhone" required>
                    <div class="invalid-feedback">
                        Please provide a valid phone number.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Region</label>
                    <select class="form-select" id="validationCustom04" required name="aRegion">
                        <option selected disabled value="">Choose...</option>
                        <option value="Duisburg">Duisburg</option>
                        <option value="Essen">Essen</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid region.
                    </div>
                </div>
                <div class="col-md-3">
                    <p>Is the Ambulance available?</p>
                    <input type="checkbox" class="" id="validationCustom03" name="aAvailable" value="Yes">
                    Yes
                    <input type="checkbox" class="" id="validationCustom03" name="aAvailable1" value="No">
                    No
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        <?php
            // error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                function addAmbulance(&$Avail){
                    $aPhone=$_POST["aPhone"];
                    $aRegion=$_POST["aRegion"];
                    $aAvailable=$Avail;
                    $conn=mysqli_connect("localhost","root","","emedicineguide");
                    if(!$conn){
                        die("Connection failed: ".mysqli_connect_error);
                     }
                     else
		              {
                        $sql="insert into ambulance(phone,region,availability,id) values('".$aPhone."', '".$aRegion."', '".$aAvailable."', LAST_INSERT_ID())";
                        $result= mysqli_query($conn,$sql)or die(mysqli_error($conn));
                        if($result){
                            $message = "Successfully added pharmacy!";
                             echo "<script type='text/javascript'>alert('$message');</script>";
                             header("location:home.php");
                        }
                        else
                        {
                            $message = "Registration Unsuccessful!";
                             echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                      }
                }
                
                if(isset($_POST['aAvailable']) && $_POST['aAvailable'] == 'Yes'){
                    $aAvail="Yes";
                    addAmbulance($aAvail);
                }
                if(isset($_POST['aAvailable1']) && $_POST['aAvailable1'] == 'No'){
                    $aAvail="No";
                    addAmbulance($aAvail);
                }
                else{
                    $message = "Please select availabilty!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }

                
	           
            }
            ?> 
        </div>

    </section>
    
</body>
</html>