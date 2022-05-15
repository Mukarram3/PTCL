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
    $phone = $_GET["id"];
    $query = "SELECT * FROM cust_info WHERE PTCL_ID = '" . $phone . "'";
    //echo "Hello";
    $result = mysqli_query($conn, $query) or die('error getting data');

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // store data in an array
        //echo "While loop Enter";
        $_SESSION["ptclNum"]= $row['PTCL_ID'];
        $ptcl_num = $row['PTCL_ID'];
        $name = $row['name'];
        $cnic = $row['cnic'];
        $email = $row['email'];
        $phone = $row['number'];
        $gender = $row['gender'];
        $pass = $row['password'];
        $address = $row['address'];

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
            <div class="container-fluid">

                <ul class="nav navbar-nav">
                    <li><a href="cust_myaccount.php">Profile</a></li>
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
                    <h1>Edit Details</h1>
                </div>
                <div class="panel-body">
                    <form action="update.php" method="POST">
                        <div class="w3-row-padding">
                            <div class="form-group w3-half">
                                <label>Name </label>
                                <input type="text" value="<?php if (isset($name)) {
                                    echo $name;
                                } ?>" class="form-control" name="nameUpdate">
                            </div>
                            <div class="form-group w3-half">
                                <label>CNIC</label>
                                <input type="text" value="<?php if (isset($cnic)) {
                                    echo $cnic;
                                } ?>" class="form-control" name="cnicUpdate">
                            </div>
                        </div>
                        <div class="w3-row-padding">
                            <div class="form-group w3-half">
                                <label>Email</label>
                                <input type="text" value="<?php if (isset($email)) {
                                    echo $email;
                                } ?>" class="form-control" name="emailUpdate">
                            </div>
                            <div class="form-group w3-half">
                                <label>Password</label>
                                <input type="text" value="<?php if (isset($pass)) {
                                    echo $pass;
                                } ?>" class="form-control" name="passUpdate">

                            </div>
                        </div>
                        <div class="w3-row-padding">
                            <div class="form-group w3-half">
                                <label>Address</label>
                                <input type="text" value="<?php if (isset($address)) {
                                    echo $address;
                                } ?>" class="form-control" name="addressUpdate">
                            </div>


                            <div class="form-group w3-half">
                                <label>Phone</label>
                                <input type="text" value="<?php if (isset($phone)) {
                                    echo $phone;
                                } ?>" class="form-control" name="numberUpdate">
                            </div>
                        </div>
                        <div class="w3-row-padding">
                            <div class="form-group w3-half">

                                <label>Gender</label>
                                <br>
                                <?php
                                if ($gender == 'm') { ?>
                                    <input type="radio" value="m" name="gender" checked>Male
                                    <input type="radio" value="f" name="gender">Female
                                    <input type="radio" value="o" name="gender">Others
                                    <?php
                                } else if ($gender == 'f') { ?>
                                    <input type="radio" value="m" name="gender">Male
                                    <input type="radio" value="f" name="gender" checked>Female
                                    <input type="radio" value="o" name="gender">Others
                                <?php } else { ?>
                                    <input type="radio" value="m" name="gender">Male
                                    <input type="radio" value="f" name="gender">Female
                                    <input type="radio" value="o" name="gender" checked>Others

                                    <?php
                                }
                                ?>
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
    $nameUp = $_POST['nameUpdate'];
    $cnicUp = $_POST['cnicUpdate'];
    $emailUp = $_POST['emailUpdate'];
    $numUp = $_POST['numberUpdate'];
    $gUp = $_POST['genderUpdate'];
    $passUp = $_POST['passUpdate'];
    $addUp = $_POST['addressUpdate'];

    $updatequery = "Update cust_info set name = '$nameUp', cnic = '$cnicUp', email = '$emailUp', number = '$numUp', gender = '$gUp', password = '$passUp', address = '$addUp'  WHERE PTCL_ID = '$phone'";
    $res = mysqli_query($conn, $updatequery) or die('error running query');

    if ($res) {
        header("Location: find.php");
    } else {
        echo "Update Unsuccessful";
    }
}


?>