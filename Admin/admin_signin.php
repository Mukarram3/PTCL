<?php
session_start();
$_SESSION ['admin_msg']='';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Signin - PCC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="w3.css">
	<link rel="stylesheet" type="text/css" href="Raleway.css">
	<!-- <script type="text/javascript">
  	function redirect(){
  		window.location.href = 'myaccount.php';
  	}

  </script> -->
  <script type="text/javascript">
function validate(form) {
  var re = /^[a-z,A-Z,0-9]+$/i;

  if (!re.test(form.username.value && form.password.value)) {
    alert('Please enter only letters from a to z');
    return false;
  }
}
</script>
</head>
<style>
	body,h1 {font-family: "Raleway", sans-serif}
</style>
<body background="bg_black_dust.png" class="w3-display-middle">
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading text-center" style="background-color: #009688">
					<h1>Admin Signin</h1>
				</div>
				<div class="panel-body">
					<form action="admin_signin.php" method="POST" onsubmit="return validate(this);">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" placeholder="admin" required="true">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" required="true">
						</div>
						<!-- <button type="button" name="submit" value="myaccount" onclick="redirect()" class="btn btn-primary w3-hover-black" style="background-color: #008a00">Redirect</button>
							
						</button> -->
						<input type="submit" name="admin_loginbtn" value="Login" class="btn btn-primary w3-hover-black" style="background-color: #009688">
					</form>
				</div>
				<div class="panel-footer">
					<div class="text-right">
						<small>&copy; FSAB </small>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','','pcc');
//Main error ye hai k hum ny if k bad brackets start ni ki
if(isset($_POST['admin_loginbtn']))
{
$username = $_POST['username'];
$pass = $_POST['password'];


$sql = "select * from admin_info where username = '".$username."' AND password = '".$pass."' limit 1 ";
$result = mysqli_query($conn,$sql);

//echo $run;
if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        $admin_msg = 'success';
        $_SESSION['admin_msg'] = $admin_msg;

        if ($_SESSION['admin_msg'] = 'success') {
  		header('Location: admin_myaccount.php');
  		}

    }
    else{
        echo '<div class=" alert alert-warning alert-dismissible" >You Have Entered Incorrect Info.</div>';
        $_SESSION['admin_msg'] = 'unsuccess';
    }
}
?>