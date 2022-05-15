<?php
$conn = mysqli_connect('localhost', 'root', '', 'pcc');

$query = "SELECT * FROM `packages`";
$result = mysqli_query($conn, $query);
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

    <title>Packages</title>
</head>
<body background="bg_black_dust.png">
<div class="container-fluid">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li><a href="messages.php">Messages</a></li>
                <li><a href="package.php">Packages</a></li>
                <li><a href="admin_myaccount.php">Find Customer</a></li>
            </ul>
        </div>
    </nav>

</div>
<div class="container ">
    <div class="row col-md-9 col-md-offset-2 ">
        <div class="panel panel-primary">
            <div class="panel-heading text-center" style="background-color: #009688">
                <h1>Package Details</h1>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><strong>Sr. No</strong></th>
                        <th><strong>Package Name</strong></th>
                        <th><strong>Package Price</strong></th>
                        <th><strong>Package Data</strong></th>
                        <th><strong>Package Speed</strong></th>
                        <th colspan="2"><strong>Action</strong></th>

                    </tr>
                    </thead>
                    <?php $num = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["data"] ?></td>
                            <td><?php echo $row["speed"] ?></td>
                            <td>
                                <a href="packageEdit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                <a href="packageDelete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>

                            </td>

                        </tr>
                        </tbody>

                        <?php
                        $num++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
