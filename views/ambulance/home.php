<?php
    session_start();
    $email = $_SESSION["uemail"];
    $am_id = $_SESSION["am_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
	<link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
	<title>Ambulance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all" />
</head>
<body>
    <section id="customer_home">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">Welcome <?="{$email}"?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container cu_func">
            <div class="row text-center mt-5 mb-5">
                <h2>Ambulance Panel</h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="cards text-center bg-light">
                        <div class="card-body">
                            <h5>Change Availability</h5>
                            <?php
                                $con=mysqli_connect("localhost","root","","emedicineguide2");
                                // Check connection
                                if(!$con){
                                    die("Connection failed: ".mysqli_connect_error);
                                }
                                else{
                                    $result = mysqli_query($con,"SELECT * FROM ambulance where id = '".$am_id."'");
                                    $row = mysqli_fetch_array($result);
                                }
                            ?>
                            <p>Current Availability: <?php echo $row['availability']; ?></p>
                            <p>Change Availability to: </p>
                            <a href="availableYes.php?id=<?php echo $row['id']; ?>">Yes</a>
                            <a href="availableNo.php?id=<?php echo $row['id']; ?>" style="color:red">No</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>