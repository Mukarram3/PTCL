<?php
session_start();
if(isset($_SESSION['num_ptcl'])) {
    $user = $_SESSION['num_ptcl'];
}
else
{
    echo "<script>alert('Session Not Started');</script>";
    header("Location : admin_myaccount.php");
}
$_SESSION['num_ptcl'];
?>

<?php
  $name = $cnic = $email = $number = $phone = $gender = $pass = $address = $package = $data_limit = '----------------';
  //echo $_SESSION['num_ptcl'];
if (isset($_SESSION['num_ptcl'])) {
  $conn = mysqli_connect('localhost','root','','pcc') or die('Error Connecting Databse');
  //$num = $_POST['num'];
  // $cnic = $_POST['cnic'];
  $query = "SELECT * FROM cust_info WHERE PTCL_ID = '".$_SESSION['num_ptcl']."'";
  //echo "Hello";
  $result = mysqli_query($conn,$query) or die('error getting data');

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
                 $package = $row['package'];
                 $data_limit = $row['data_limit'];

      }
    }

    if (isset($_POST['updatebtn'])) {
      $nameUp = $_POST['nameUpdate'];
      $cnicUp = $_POST['cnicUpdate'];
      $emailUp = $_POST['emailUpdate'];
      $numUp = $_POST['numberUpdate'];
      $gUp = $_POST['genderUpdate'];
      $passUp = $_POST['passUpdate'];
      $addUp = $_POST['addressUpdate'];
      $PtclnumUp = $_POST['ptcl_numUpdate'];
      $pUp = $_POST['packageUpdate'];
      $dataUp = $_POST['data_limitUpdate'];

    $updatequery = "Update cust_info set name = '$nameUp', cnic = '$cnicUp', email = '$emailUp', number = '$numUp', gender = '$gUp', password = '$passUp', address = '$addUp',  package = '$pUp', data_limit = '$dataUp'  WHERE PTCL_ID = '$ptcl_num'";
  $res = mysqli_query($conn,$updatequery) or die('error running query');

  if ($res) {
    header( "refresh:5;url=admin_myaccount.php" );
    //echo "<script>alert('You\'ll be redirected in about 5 secs.');</script>";
    echo '<div class=" alert alert-warning alert-dismissible" >Update Successfully! You\'ll be redirected in about 5 secs. If not, click <a href="admin_myaccount.php">here</a>.</div>';
  }
  else 
    echo "Update Unsuccessful";

    }

    if(isset($_POST['deletebtn']))
    {
      $qry = "delete from cust_info WHERE PTCL_ID = $ptcl_num";
      $run = mysqli_query($conn,$qry);
      if($run)
      {
        $name = $cnic = $email = $number = $phone = $pass = $ptcl_num = $gender = $address = $package = $data_limit = '----------------';
    header( "refresh:5;url=admin_myaccount.php" );
    //echo "<script>alert('You\'ll be redirected in about 5 secs.');</script>";
    echo '<div class=" alert alert-warning alert-dismissible" >Delete Successfully! You\'ll be redirected in about 5 secs. If not, click <a href="admin_myaccount.php">here</a>.</div>';
      }
      else 
        echo "Failed to Delete.";
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
body,h1 {font-family: "Raleway", sans-serif}
</style>
<body background="bg_black_dust.png" class="w3-display-middle " >
  <div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
      <div class="panel panel-primary">
        <div class="panel-heading text-center" style="background-color: #009688">
          <h1>Edit Details</h1>
        </div>
        <div class="panel-body">
          <form action="edit_myaccount.php" method="POST">
            <div class="w3-row-padding">
              <div class="form-group w3-half">
              <label>Name </label>
              <input type="text" value="<?php echo $name; ?>" class="form-control" name="nameUpdate">
            </div>
            <div class="form-group w3-half">
              <label>CNIC</label>
              <input type="text" value="<?php echo $cnic; ?>" class="form-control" name="cnicUpdate">
            </div>
            </div>
            <div class="w3-row-padding">
              <div class="form-group w3-half">
              <label>Email</label>
              <input type="text" value="<?php echo $email; ?>" class="form-control" name="emailUpdate">
            </div>
            <div class="form-group w3-half">
              <label>Phone</label>
              <input type="text" value="<?php echo $phone; ?>" class="form-control" name="numberUpdate">
            </div>
            </div>
            <div class="w3-row-padding">
              <div class="form-group w3-half">
              <label>Gender</label>
              <input type="text" value="<?php echo $gender; ?>" class="form-control" name="genderUpdate">
            </div>
            <div class="form-group w3-half">
              <label>Password</label>
              <input type="text" value="<?php echo $pass; ?>" class="form-control" name="passUpdate">
            </div>
            </div>
            <div class="w3-row-padding">
              <div class="form-group w3-half">
              <label>Address</label>
              <input type="text" value="<?php echo $address; ?>" class="form-control" name="addressUpdate">
            </div>
            <div class="form-group w3-half">
              <label>PTCL Number</label>
              <input type="text" value="<?php echo $ptcl_num; ?>" class="form-control" name="ptcl_numUpdate">
            </div>
            </div>
            <div class="w3-row-padding">
              <div class="form-group w3-half">
              <label>Package</label>
              <input type="text" value="<?php echo $package; ?>" class="form-control" name="packageUpdate">
            </div>
            <div class="form-group w3-half">
              <label>Data Limit</label>
              <input type="text" value="<?php echo $data_limit; ?>" class="form-control" name="data_limitUpdate">
            </div>
            </div>
            <div class="w3-row-padding">
              <input type="submit" name="updatebtn" value="Update" class="btn btn-primary w3-hover-black" style="background-color: #009688">
              <input type="submit" name="deletebtn" class="btn btn-primary w3-hover-black" style="background-color: #009688" value="Delete">
              <!-- <button type="submit" >Delete</button> -->
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <div class="text-right">
            <small>&copy; FSAB </small>
          </div>
          <div class="text-center">
            <p>
              <a href="logout.php" style="font-weight: bold; color: #009688" > Signout </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>