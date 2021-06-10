<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>E-Medicine Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
</head>
<body>
<section id="forgot_password">
    <div class="container">
        <div class="row">
        <form class="col-md-4 col-sm-offset-4 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin: 2%;background-color: rgba(80, 173, 150, 0.3);border: 1px #e3e8ef;border-radius: 5%; opacity:0.8;filter: alpha(opacity=60);text-align: center;margin: auto; margin-top:20%;padding-top: 2%;padding-bottom: 2%;box-shadow: 5px 10px #989ba0;">
			  <div class="form-group center" >
				<label for="uname" style="font-weight: bold;color: #000000;">Please enter Email:</label>
				<input type="text" class="form-control" id="email" name="uemail" style="width:50%;margin-left: 24%;" required>
			  </div>
			  <div class="form-group">
				<label for="pwd" style="font-weight: bold;color: #000000;">New Password:</label>
				<input type="password" class="form-control" id="pwd" name="upass" style="width:50%;margin-left: 24%" required>
			  </div>
			  
			  
			  <button type="submit" class="btn login" style="font-weight: bold;color: #000000; background:#c2c2ce;">Reset Password</button>
			  <br>
			  <br>
			</form>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $_SESSION["uemail"]= $_POST["uemail"];
                    $_SESSION["upass"]= $_POST["upass"];
                    $email = $_POST["uemail"];
                    $password = $_POST["upass"];
                    $con=mysqli_connect("localhost","root","");
                    if(! $con)
                        {
                            die('Connection Failed'.mysql_error());
                        }
                    else{
                        // Select the database to use
                        mysqli_select_db($con,'emedicineguide');
                        $result = mysqli_query($con,"SELECT * FROM customer_signup where email='".$email."';") or die("Failed to Login".mysql_error());
                        $row = mysqli_fetch_array($result);
                        if($row["email"]==$email)
                        {
                            $result = mysqli_query($con,"UPDATE customer_signup SET password='".$password."' where email='".$email."';") or die("Failed to Login".mysql_error());
                            header("Location:passwordUpdated.php");
                            
                        }
                        else{
                            $result = mysqli_query($con,"SELECT * FROM pharmacy where email='".$email."';") or die("Failed to Login".mysql_error());
                            $row = mysqli_fetch_array($result);
                            if($row["email"]==$email){
                                $result = mysqli_query($con,"UPDATE pharmacy SET password='".$password."' where email='".$email."';") or die("Failed to Login".mysql_error());
                                header("Location:passwordUpdated.php");
                            }
                            else{
                                $message = "User can not be found";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            
                            
                        }
                    }
                }
            ?>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>