<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>E-Medicine Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
<section id="header-area"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../../index.php"><img src="../../images/logo.png" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Customer SignUp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">Login</a>
                </li>
                </ul>
            </div>
        </nav>
	</section>
    <div class="container">
        <div class="row text-center mb-5 mt-5">
            <h1>Customer Signup</h1>
        </div>
    <form class="row g-3 needs-validation mt-5" novalidate method="post">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" name="cFirstName" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" name="cLastName" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomerEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="validationCustomerEmail" name="cEmail" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomerEmail" class="form-label">Password</label>
            <input type="password" class="form-control" id="validationCustomerEmail" name="cPassword" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Street Name, House no.</label>
            <input type="text" class="form-control" id="validationCustom03" name="cAddress" required>
            <div class="invalid-feedback">
            Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Region</label>
            <select class="form-select" id="validationCustom04" required name="cRegion">
            <option selected disabled value="">Choose...</option>
            <option value="Duisburg">Duisburg</option>
            <option value="Essen">Essen</option>
            </select>
            <div class="invalid-feedback">
            Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required name="cZip">
            <div class="invalid-feedback">
            Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
        </form>
    </div>


    <?php
        error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $cuFirstName=$_POST["cFirstName"];
                $cuLastName=$_POST["cLastName"];
                $cuEmail=$_POST["cEmail"];
	            $cuPassword=$_POST["cPassword"];
                $cuAddress=$_POST["cAddress"];
                $cuRegion=$_POST["cRegion"];
                $cuZip=$_POST["cZip"];
	            
	            $conn=mysqli_connect("localhost","root","","emedicineguide");
	               if(!$conn){
		              die("Connection failed: ".mysqli_connect_error);
	               }
	               else
		              //echo "Connected successfully <br>";
                      $result = mysqli_query($conn,"SELECT * FROM customer_signup where email='".$cuEmail."';") or die("No Email exists".mysql_error());
                      $row = mysqli_fetch_array($result);
                      if($row["email"]==$cuEmail){
                        $message = "Registration Unsuccessful! Email Already Exists!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        
                      }
                      else{
                        $sql="insert into customer_signup(email,password,firstName,lastName,address,postcode,region,id) values('".$cuEmail."', '".$cuPassword."', '".$cuFirstName."', '".$cuLastName."', '".$cuAddress."', '".$cuZip."', '".$cuRegion."', LAST_INSERT_ID())";
                        $result= mysqli_query($conn,$sql)or die(mysqli_error($conn));
                                if($result){
                                   
                                    $message = "Successfully registered!";
                                     echo "<script type='text/javascript'>alert('$message');</script>";
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
        
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()
        </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>