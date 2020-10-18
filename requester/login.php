<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if (isset($_REQUEST['rEmail'])){
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
        $sql = "SELECT r_email, r_password FROM requester_db where r_email ='".$rEmail."' AND r_password ='".$rPassword."' limit 1";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script> location.href='userprofile.php'; </script>";
            exit;
        } else {
            $msg= '<div class="alert text-danger"><small>Incorrect Email or Password</small> </div>';
        }
    }
} else {
    echo "<script> location.href='userprofile.php'; </script>";
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Font awesome css-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Custom css -->
    <link rel="stylesheet" href="../css/mystyle.css">
    <title>Login</title>
</head>
<body>
    <div class="mt-5 mb-5 text-center text-danger" style="font-size:30px; font-weight:bold;">
        <i class="fas fa-stethoscope"></i>
    <span class="">Online Service Management Service</span>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 shadow-lg p-3">
                <form action="" method="POST">
                    <div class="form-group">
                          <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                          <input type="email" class="form-control" placeholder="email" name="rEmail">
                          <small class="form-text">we will never share your email with anyone else</small>  
                    </div>
                    <div class="form-group">
                          <i class="fas fa-key"></i><label for="email" class="font-weight-bold pl-2">Password</label>
                          <input type="password" class="form-control" placeholder="password" name="rPassword">
                          <?php if(isset($msg)) {echo $msg;} ?>
                          
                    </div>
                    <button class="btn btn-danger btn-block mt-3 shadow-sm">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="../index.php" class="btn btn-info shadow-lg font-weight-bold">Back to Home</a>
    </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>    
</body>
</html>