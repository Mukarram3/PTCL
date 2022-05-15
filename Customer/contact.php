<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'pcc');


if (!isset($_SESSION["id"])){
    header("location:  cust_signin.php");
}
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

        <title>Contacts Us - PCC</title>
    </head>
    <body background="bg_black_dust.png">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <ul class="nav navbar-nav">
                    <li><a href="cust_myaccount.php">Profile</a></li>
                    <li><a href="package.php">Packages</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>Contact Us</h1>
            </div>
            <div class="panel-body">

                <form action="contact.php" method="POST">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>PTCL Number</label>
                                <input type="text" class="form-control" name="ptcl_num" placeholder="e.g. 0483795000"
                                       required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea class="form-control" name="msg" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" name="submit" value="myaccount" onclick="redirect()" class="btn btn-primary w3-hover-black" style="background-color: #008a00">Redirect</button>

                    </button> -->
                    <input type="submit" name="submit" value="Send"
                           class="btn btn-primary w3-hover-black w3-teal">

                </form>
            </div>
        </div>
    </body>
    </html>
    <script src="css/bootstrap.min.js"></script>
<?php

if (isset($_POST["submit"])) {

    $phone = $_POST["ptcl_num"];
    $email = $_POST["email"];
    $message = nl2br($_POST["msg"]);

    $query = "INSERT INTO `complains`(`phone`, `email`, `message`) VALUES ($phone,'$email','$message')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
Send Successfully.</div>';
    } else {
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
You Have Entered Incorrect Info.</div>';

    }
}

?>