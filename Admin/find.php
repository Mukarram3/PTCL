<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 1/12/2020
 * Time: 10:41 PM
 */
$conn = mysqli_connect('localhost', 'root', '', 'pcc');

if (isset($_POST['submitted'])) {

    $num = $_POST['num'];
    // $cnic = $_POST['cnic'];
    $query = "SELECT * FROM cust_info WHERE PTCL_ID = '$num'";
    //echo "Hello";
    $result = mysqli_query($conn, $query) or die('error getting data');

    if ($result) {
        //echo "If Entered";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
            $_SESSION['num_ptcl'] = $ptcl_num;
            // echo "<script>alert('".$_SESSION['num_ptcl']."');</script>";


            //for Gender

            if ($gender = 'm') {
                $gender = 'Male';
            } elseif ($gender = 'f') {
                $gender = 'Female';
            } elseif ($gender = 'o') {
                $gender = 'Other';
            }
        }
        //echo "If Exit";


    }
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

    <title>Document</title>
</head>
<body background="bg_black_dust.png">

<div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>Customer Details</h1>

            </div>
            <div class="panel-body">

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
                    <div class="form-group w3-half">
                        <h3 style="font-weight: bold; color: #009688">PTCL Number: </h3>
                        <label> <?php echo $ptcl_num; ?></label>
                    </div>
                </div>


            </div>
            <div class="panel-footer">
                <div class="text-right">
                    <small>&copy; FSAB</small>
                </div>
                <div class="text-center">
                    <p>
                        <a href="edit.php?id=<?php  echo  $num; ?>" style="font-weight: bold; color: #009688"> Edit </a>
                    </p>
                    <p>
                        <a href="delete.php?id=<?php  echo  $num; ?>" style="font-weight: bold; color: #009688"> Delete </a>
                    </p>
                </div>
            </div>
        </div>
    </div>


</body>
</html>