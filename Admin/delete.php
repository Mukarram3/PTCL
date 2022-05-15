<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'pcc') or die('Error Connecting Databse');

if (isset($_GET["id"])) {

$delete = $_GET["id"];
    $qry = "delete from cust_info WHERE PTCL_ID = $delete";
    $run = mysqli_query($conn,$qry);
    if($run)
    {

        header( "location: admin_myaccount.php" );
        //echo "<script>alert('You\'ll be redirected in about 5 secs.');</script>";
        }
    else{
        echo "Failed to Delete.";
}
}

?>
