
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'pcc') or die('Error Connecting Databse');


if (isset($_POST['updatebtn'])) {

$phone =  $_SESSION["ptclNum"];
    $nameUp = $_POST['nameUpdate'];
    $cnicUp = $_POST['cnicUpdate'];
    $emailUp = $_POST['emailUpdate'];
    $numUp = $_POST['numberUpdate'];
    $gUp = $_POST['gender'];
    $passUp = $_POST['passUpdate'];
    $addUp = $_POST['addressUpdate'];

    $updatequery = "Update cust_info set name = '$nameUp', cnic = '$cnicUp', email = '$emailUp', number = '$numUp', gender = '$gUp', password = '$passUp', address = '$addUp'  WHERE PTCL_ID = '$phone'";
    $res = mysqli_query($conn, $updatequery) or die('error running query');

    if ($res) {
        header("Location: admin_myaccount.php");
    } else {
        echo "Update Unsuccessful";
    }
}


?>