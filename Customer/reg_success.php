<?php
session_start();
?>

<!DOCTYPE html>
<html>
<title>Registration Successful</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="w3.css">
<link rel="stylesheet" type="text/css" href="raleway.css">

<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('bg_black_dust.png');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img class="img" src="hello_ptcl.png" alt="PTCL_Logo" height="40%" width="60%">
  </div>
  
  <div class="w3-display-middle">
    <div class="w3-panel w3-pale-yellow w3-round" >
      <p class="w3-text-brown"> Before Refreshing Page, Make Sure You Have Copied Your Number.</p>
    </div>

    <h1 class="w3-xxxlarge w3-animate-top">Registration Successful</h1>
    
    <div>
    	<label class="w3-xlarge">Your PTCL Number is: <br></label>
    <label class="w3-large">
    	<?php if ($_SESSION["cust_msg"] = 'success') {
            	echo "0" .$_SESSION["ptcl_num"]."";
            } else {
            	echo "No PTCL Number Assigned";
            }
            ?>
    </label>
    </div>
    <hr class="w3-border-white" style="margin:auto;width:100%">
    
    <p><a href="cust_signin.php" target="_blank" class="w3-button w3-border w3-white w3-ripple w3-border-white w3-block w3-padding-large w3-large w3-margin-top w3-hover-teal">Signin</a></p>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
    <small>&copy; FSAB </small> 
  </div>
</div>

</body>
</html>