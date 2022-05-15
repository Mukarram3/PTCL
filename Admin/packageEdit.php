<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'pcc') or die('Error Connecting Databse');
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 1/12/2020
 * Time: 10:51 PM
 */
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM packages WHERE id = '" . $id . "'";

    $result = mysqli_query($conn, $query) or die('error getting data');

    while ($row = mysqli_fetch_assoc($result)) {
        // store data in an array
        //echo "While loop Enter";
        $pID = $row['id'];
        $pname = $row['name'];
        $pPrice = $row['price'];
        $pdata = $row['data'];
        $pspeed = $row['speed'];

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Details - PCC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="raleway.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<style>
    body, h1 {
        font-family: "Raleway", sans-serif
    }
</style>
<body background="bg_black_dust.png" class="w3-display-middle ">
<div class="container-fluid">

    <nav class="navbar navbar-default">


        <ul class="nav navbar-nav">
            <li><a href="messages.php">Messages</a></li>
            <li><a href="package.php">Packages</a></li>
            <li><a href="admin_myaccount.php">Find Customer</a></li>
        </ul>
    </nav>

</div>

<div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>Edit Details</h1>
            </div>
            <div class="panel-body">
                <form action="packageEdit.php" method="POST">
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label> Package Name </label>
                            <input type="text" value="<?php if (isset($pname)) {
                                echo $pname;
                            } ?>" class="form-control" name="nameUpdate">
                        </div>
                        <div class="form-group w3-half">
                            <label>Package Price</label>
                            <input type="number" value="<?php if (isset($pPrice)) {
                                echo $pPrice;
                            } ?>" class="form-control" name="priceUpdate">
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label>Package Data</label>
                            <input type="text" value="<?php if (isset($pdata)) {
                                echo $pdata;
                            } ?>" class="form-control" name="dataUpdate">
                        </div>
                        <div class="form-group w3-half">
                            <label>Package Speed</label>
                            <input type="text" value="<?php if (isset($pspeed)) {
                                echo $pspeed;
                            } ?>" class="form-control" name="speedUpdate">

                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <input type="submit" name="updatebtn" value="Update"
                               class="btn btn-primary w3-hover-black"
                               style="background-color: #009688">
                        <!-- <button type="submit" >Delete</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
if (isset($_POST['updatebtn'])) {
    $nUp = $_POST['nameUpdate'];
    $pUp = $_POST['priceUpdate'];
    $dUp = $_POST['dataUpdate'];
    $sUp = $_POST['speedUpdate'];

    $updatequery = "Update packages set name = '$nUp', price = '$pUp', data = '$dUp', speed = '$sUp'  WHERE id = '$pID'";
    $res = mysqli_query($conn, $updatequery) or die('error running query');

    if ($res) {
        header("Location: viewPackage.php");
    } else {
        echo "Update Unsuccessful";
    }
}


?>