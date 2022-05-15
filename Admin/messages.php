    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'pcc');

    $query = "SELECT * FROM complains";
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

        <title>Messages</title>
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
                    <h1>Customer Message</h1>
                </div>
             <div class="panel-body">
                 <table class="table table-hover">
                     <thead>
                     <tr>
                         <th><strong>Sr. No</strong></th>
                         <th><strong>PTCL Number</strong></th>
                         <th><strong>Email</strong></th>
                         <th><strong>Message</strong></th>
                     </tr>
                     </thead>
                     <?php $num = 1;
                     while ($row = mysqli_fetch_assoc($result)) { ?>
                         <tbody>
                         <tr>
                             <td><?php echo $num; ?></td>
                             <td><?php echo $row["phone"] ?></td>
                             <td><?php echo $row["email"] ?></td>
                             <td><?php echo $row["message"] ?></td>

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
