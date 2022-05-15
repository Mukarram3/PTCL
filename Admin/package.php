<?php
$conn = mysqli_connect('localhost', 'root', '', 'pcc');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="raleway.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

    <title>Create Package</title>
</head>
<body background="bg_black_dust.png">
<div class="container-fluid">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li><a href="messages.php">Messages</a></li>
                <li><a href="package.php">Packages</a></li>
                <li><a href="admin_myaccount.php">Find Customer</a></li>
            </ul>
        </div>
    </nav>

</div>


<div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>Create Package</h1>
            </div>
            <div class="panel-body">
                <form action="package.php" method="POST">
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label> Package Name</label>
                            <input type="text" class="form-control" name="pkjName" required>
                        </div>
                        <div class="form-group w3-half">
                            <label>Package Price</label>
                            <input type="number" class="form-control" name="pkjPrice" required>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label> Package Data</label>
                            <input type="text" class="form-control" name="pkjData" required>
                        </div>
                        <div class="form-group w3-half">
                            <label>Package Speed</label>
                            <input type="text" class="form-control" name="speed" required>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <input type="submit" class="btn btn-info" name="submit" value="Create Package">
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<?php

if (isset($_POST["submit"])){

    $name = $_POST["pkjName"];
    $price = $_POST["pkjPrice"];
    $data = $_POST["pkjData"];
    $speed = $_POST["speed"];
    $query = "INSERT INTO packages(name , price, data, speed) VALUES ('$name', $price, '$data', '$speed')";
    $result = mysqli_query($conn, $query);
    if ($result){
        header("location: viewPackage.php");

    }else{
        echo "Package Failed";
    }
}


?>