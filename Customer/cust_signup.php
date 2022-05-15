<?php
session_start();
$_SESSION['cust_msg'] = '';
$_SESSION['ptcl_num'] = '';
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'pcc');
//Main error ye hai k hum ny if k bad brackets start ni ki
if (isset($_POST['submitnbtn'])) {
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['adress'];
    $pass = $_POST['pass'];
    /*$package = $_POST['package'];
    $data_limit = $_POST['data_limit'];*/

    $qru = "insert into cust_info (name,cnic,email,number,gender,address,password) values ('$name','$cnic','$email','$number','$gender','$address','$pass')";
    $run = mysqli_query($conn, $qru);


    if ($run) {
        //echo "Registeration Successfully";
        //mysqli_close($conn);
        //echo "<br>";
        //$conn1 = mysqli_connect('localhost','root','','pcc');
        $sql = "SELECT PTCL_ID FROM cust_info WHERE cnic= '" . $cnic . "' Limit 1";
        $result = mysqli_query($conn, $sql);
        // declare an array
        // $data = [];
        if ($result) {
            // loop
            while ($row = mysqli_fetch_array($result)) {
                // store data in an array
                $y_ptcl = $row['PTCL_ID'];
                $_SESSION['ptcl_num'] = $y_ptcl;
                $msg = 'success';
                $_SESSION['cust_msg'] = $msg;
                //echo $_SESSION["cust_msg"];


                //echo "<br>Session Variables set<br>";
                //echo $_SESSION["ptcl_num"];
                // echo "Your PTCL Number is: <br>0";
                // echo $y_ptcl;

            }
            // mysqli_free_result($result);
        }
        header("Location: reg_success.php");
        // header( "refresh:5;url=reg_success.php" );
        // echo 'You\'ll be redirected in about 5 secs. If not, click <a href="reg_success.php">here</a>.';
        // header('Location: reg_success.php');
    } else {
        echo '<div class=" alert alert-warning alert-dismissible" >Failed to Register.</div>';
        $_SESSION["cust_msg"] = 'failed';
    }
}
//mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration - PTCL Customer Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="Raleway.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/jquery.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
</head>
<style>
    body, h1 {
        font-family: "Raleway", sans-serif
    }
</style>
<body background="bg_black_dust.png" class="w3-display-middle">
<div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center w3-teal">
                <h1>User Registration</h1>
            </div>
            <div class="panel-body">
                <form action="cust_signup.php" method="POST">
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required
                                   placeholder="e.g. Faizan Ali">
                        </div>
                        <div class="form-group w3-half">
                            <label>Enter CNIC</label>
                            <input type="text" class="form-control" name="cnic" required
                                   placeholder="e.g. 3840312345678">
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label>Enter Email</label>
                            <input type="email" class="form-control" name="email" required
                                   placeholder="Faizan@gmail.com">
                        </div>
                        <div class="form-group w3-half">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label>Phone</label>
                            <input type="number" min="03000000000" max="03499999999" class="form-control" name="phone"
                                   required
                                   placeholder="e.g 03001234567">
                        </div>
                        <div class="form-group w3-half">
                            <label>Adress</label>
                            <input type="text" class="form-control" name="adress" required
                                   placeholder="Enter Adress">
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                            <label>Gender</label>
                            <div>
                                <label for="male" class="radio-inline"><input type="radio" id="male" name="gender"
                                                                              value="m" required="true">Male</label>
                                <label for="female" class="radio-inline"><input type="radio" id="female" name="gender"
                                                                                value="f" required="true">Female</label>
                                <label for="other" class="radio-inline"><input type="radio" id="other" name="gender"
                                                                               value="o" required="true">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <input type="submit" name="submitnbtn" value="Register"
                               class="btn btn-primary w3-hover-black w3-teal">
                    </div>
                    <!--
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                        <label>Enter Address</label>
                        <input type="text" class="form-control" name="address" required="true" placeholder="Hyderabad Town, SGD">
                    </div>
                    <div class="form-group w3-half">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="true" placeholder="******">
                    </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="form-group w3-half">
                        <label>Select Package</label>
                        <div>
                            <label for="1mbps" class="radio-inline"><input type="radio" id="1mbps" name="package" value="1mbps" required="true">1 Mbps</label>
                            <label for="2mbps" class="radio-inline"><input type="radio" id="2mbps" name="package" value="2mbps" required="true">2 Mbps</label>
                            <label for="4mbps" class="radio-inline"><input type="radio" id="4mbps" name="package" value="4mbps" required="true">4 Mbps</label>
                            <label for="8mbps" class="radio-inline"><input type="radio" id="8mbps" name="package" value="8mbps" required="true">8 Mbps</label>
                        </div>
                    </div>-->
            </div><!--
						<div class="w3-row-padding">
							<div class="form-group w3-half">
							<label>Data Limit</label>
							<div>
								<label for="10gb " class="radio-inline"><input type="radio" id="10gb" name="data_limit" value="10gb" required="true">10 GB</label>
								<label for="40gb " class="radio-inline"><input type="radio" id="40gb" name="data_limit" value="40gb" required="true">40 GB</label>
								<label for="100gb " class="radio-inline"><input type="radio" id="100gb" name="data_limit" value="100gb" required="true">100 GB</label>
								<label for="unlimited" class="radio-inline"><input type="radio" id="unlimited" name="data_limit" value="unlimited" required="true">Unlimited</label>
							</div>
						</div>
						</div>-->


            </form>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <small>&copy; FSAB</small>
            </div>
            <div class="text-center">
                <p>
                    Already Have an account? <a href="cust_signin.php" class="w3-text-teal"> Signin </a> Now
                </p>
            </div>

        </div>
    </div>
</div>
</div>
</body>
</html>


