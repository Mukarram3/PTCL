<?php
session_start();

if (!isset($_SESSION["id"])){
    header("location:  cust_signin.php");
}
?>

<?php
$name = $cnic = $email = $number = $phone = $gender = $address = $package = $data_limit = '----------------';
if (isset($_SESSION['ptcl_num'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'pcc');
    //$num = $_POST['num'];
    // $cnic = $_POST['cnic'];
    $query = "SELECT * FROM cust_info WHERE PTCL_ID = '" . $_SESSION['ptcl_num'] . "'";
    //echo "Hello";
    $result = mysqli_query($conn, $query) or die('error getting data');

    while ($row = mysqli_fetch_assoc($result)) {
        // store data in an array
        //echo "While loop Enter";
        $ptcl_num = $row['PTCL_ID'];
        $name = $row['name'];
        $cnic = $row['cnic'];
        $email = $row['email'];
        $phone = $row['number'];
        $gender = $row['gender'];
        $pass = $row['password'];
        $address = $row['address'];
        //for Gender

        if ($gender = 'm') {
            $gender = 'Male';
        } elseif ($gender = 'f') {
            $gender = 'Female';
        } elseif ($gender = 'o') {
            $gender = 'Other';
        }

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Details - PCC</title>
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

    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>My Profile</h1>
            </div>
            <div class="panel-body">
                <form action="cust_myaccount.php" method="POST">
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Name: </h3>
                            <label> <?php echo $name; ?></label>
                        </div>
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">CNIC: </h3>
                            <label> <?php echo $cnic; ?></label>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Email: </h3>
                            <label> <?php echo $email; ?></label>
                        </div>
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Phone: </h3>
                            <label> <?php echo $phone; ?></label>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Gender: </h3>
                            <label> <?php echo $gender; ?></label>
                        </div>
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Password: </h3>
                            <label> <?php echo $pass; ?></label>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <h3 style="font-weight: bold; color: #009688">Address: </h3>
                            <label> <?php echo $address; ?></label>
                        </div>
                    </div>
            </div>
            <!-- <div class="w3-row-padding">
              <input type="button" name="updatebtn" value="Update" class="btn btn-primary w3-hover-black" style="background-color: #009688">
              <button type="button" name="deletebtn" class="btn btn-primary w3-hover-black" style="background-color: #009688" value="Register">Delete</button>
            </div> -->
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
</body>
</html>
