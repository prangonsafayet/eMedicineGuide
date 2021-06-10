<?php
    $con=mysqli_connect("localhost","root","","emedicineguide");
    // Check connection
    if(!$con){
        die("Connection failed: ".mysqli_connect_error);
    }
    else{
        $id = $_GET['id']; // get id through query string

        $result = mysqli_query($con,"SELECT * FROM cart where id = '".$id."'");
        while($row = mysqli_fetch_array($result)){
            $med_id=$row['med_id'];
            $result2 = mysqli_query($con,"SELECT * FROM medicine where id = '".$med_id."'");
            $row2 = mysqli_fetch_array($result2);
            $quantity=$row2["m_quantity"];

            $ordered_quantity=$row["quantity"];
            $quantity=$quantity+$ordered_quantity;

            $status=$row["status"];


            if($status=="Sent out for delivery"){
                $result = mysqli_query($con,"UPDATE cart SET status='Cancelled' where id='".$id."';") or die("Failed to Login".mysql_error());
                $result = mysqli_query($con,"UPDATE medicine SET m_quantity='".$quantity."' where id='".$med_id."';") or die("Failed to Login".mysql_error());
                header("location:showProcessedOrders.php");
            }
            else{
                $message = "Can not cancel the order";
                echo "<script type='text/javascript'>alert('$message');</script>";
                // header("location:showProcessedOrders.php");
            }
        }

         
    }
?>