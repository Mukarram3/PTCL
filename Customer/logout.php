<?php  
session_start();  
session_destroy();  
header("Location: cust_signin.php");
?>  