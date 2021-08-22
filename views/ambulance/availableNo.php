<?php
    $con=mysqli_connect("localhost","root","","emedicineguide2");
    // Check connection
    if(!$con){
        die("Connection failed: ".mysqli_connect_error);
    }
    else{
        $id = $_GET['id']; // get id through query string
        $result = mysqli_query($con,"UPDATE ambulance SET availability='No' where id='".$id."';") or die("Failed to Login".mysql_error());
        header("location:home.php"); 
    }
?>