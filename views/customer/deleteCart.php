<?php
    $con=mysqli_connect("localhost","root","","emedicineguide");
    // Check connection
    if(!$con){
        die("Connection failed: ".mysqli_connect_error);
    }
    else{
        $id = $_GET['id']; // get id through query string
        $result = mysqli_query($con,"DELETE FROM cart where id='".$id."';") or die("Failed to Login".mysql_error());
        header("location:viewCart.php"); 
    }
?>