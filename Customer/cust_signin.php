<?php
session_start();

if (isset($_SESSION["id"])){
    header("location:  cust_myaccount.php");
}

$_SESSION ['message'] = '';
$_SESSION['ptcl_num'] = '';
$errName = '';
$errPass = '';
$ptcl_num = $pass = '';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Signin - PTCL Customer Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="w3.css">
        <link rel="stylesheet" type="text/css" href="Raleway.css">
        <!-- <script type="text/javascript">
          function redirect(){
              window.location.href = 'myaccount.php';
          }

      </script> -->
    </head>
    <style>
        body, h1 {
            font-family: "Raleway", sans-serif
        }
    </style>
    <body background="bg_black_dust.png" class="w3-display-middle">
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center w3-teal">
                    <h1>User Signin</h1>
                </div>
                <div class="panel-body">
                    <form action="cust_signin.php" method="POST">
                        <div class="form-group">
                            <label>PTCL Number</label>
                            <input type="text" class="form-control" name="ptcl_num" placeholder="e.g. 0483795000"
                                   required="true">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="true">
                        </div>
                        <!-- <button type="button" name="submit" value="myaccount" onclick="redirect()" class="btn btn-primary w3-hover-black" style="background-color: #008a00">Redirect</button>

                        </button> -->
                        <input type="submit" name="loginbtn" value="Login"
                               class="btn btn-primary w3-hover-black w3-teal">
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="text-right">
                        <small>&copy; FSAB</small>
                    </div>
                    <div class="text-center">
                        <p>
                            Don't Have an account? <a href="cust_signup.php" class="w3-text-teal"> Signup </a> Now
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'pcc');
//Main error ye hai k hum ny if k bad brackets start ni ki
if (isset($_POST['loginbtn'])) {
    $ptcl_num = $_POST['ptcl_num'];
    $pass = $_POST['password'];

    $sql = "select * from cust_info where PTCL_ID = '" . $ptcl_num . "' AND password = '" . $pass . "' limit 1 ";
    $result = mysqli_query($conn, $sql);

//echo $run;
    if (mysqli_num_rows($result) == 1) {
        //echo " You Have Successfully Logged in";
        $_SESSION['ptcl_num'] = $ptcl_num;
        $message = 'success';
        $_SESSION['message'] = $message;

        if ($_SESSION['message'] = 'success') {
            header('Location: cust_myaccount.php');
            $_SESSION["id"] = $ptcl_num;
        }
        //run();
        //echo "<br>Session Variables set<br>";
        //echo $_SESSION["ptcl_num"];
        //echo "<br>";
        //echo $_SESSION['message'];
        //header('Location : myaccount.php');
    } else {
        echo '<div class=" alert alert-warning alert-dismissible" >You Have Entered Incorrect Info.</div>';
        $_SESSION['message'] = 'unsuccess';
        //echo $_SESSION['message'];
        exit();
    }
}
?>