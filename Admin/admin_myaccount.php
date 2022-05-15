<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Get Details - PCC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="raleway.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <!-- <script type="text/javascript">
        function redirect(){
          window.location.href = 'edit_myaccount.php';
        }

      </script> -->
</head>
<style>
    body, h1 {
        font-family: "Raleway", sans-serif
    }
</style>
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
                <h1>Customer Details</h1>
                <small>Enter PTCL Number below and then press submit to get customer details.</small>
            </div>
            <div class="panel-body">
                <form action="find.php" method="POST">
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <input type="hidden" name="submitted" value="true">
                            <label>Enter PTCL Number:
                                <input class="form-control w3-input" type="text" name="num" required>
                            </label>
                            <input class="btn btn-primary w3-hover-black" style="background-color: #009688"
                                   type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <small>&copy; FSAB</small>
                </div>
                <div class="text-center">
                    <p>
                        <a href="logout.php" style="font-weight: bold; color: #009688"> Signout </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
