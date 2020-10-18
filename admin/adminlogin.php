<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
    if (isset($_REQUEST['aEmail'])){
        $aEmail = $_REQUEST['aEmail'];
        $aPassword = $_REQUEST['aPassword'];
        $sql = "SELECT aemail, apassword FROM adminlogin where aemail ='".$aEmail."' AND apassword ='".$aPassword."' limit 1";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $_SESSION['is_adminlogin'] = true;
            $_SESSION['aEmail'] = $aEmail;
            echo "<script> location.href='dashboard.php'; </script>";
            exit;
        } else {
            $msg= '<div class="alert text-danger"><small>Incorrect Email or Password</small> </div>';
        }
    }
} else {
    echo "<script> location.href='dashboard.php'; </script>";
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
    <span class="">Online Service Management Service</span><br>
    <small class="font-weight-bold text-dark"> <i class="fas fa-stethoscope"></i> Admin Login</span>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 shadow-lg p-3">
                <form action="" method="POST">
                    <div class="form-group">
                          <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                          <input type="email" class="form-control" placeholder="email" name="aEmail">
                          <small class="form-text">we will never share your email with anyone else</small>  
                    </div>
                    <div class="form-group">
                          <i class="fas fa-key"></i><label for="email" class="font-weight-bold pl-2">Password</label>
                          <input type="password" class="form-control" placeholder="password" name="aPassword">
                          <?php if(isset($msg)) {echo $msg;} ?>
                          
                    </div>
                    <button class="btn btn-danger btn-block mt-3 shadow-sm">Login</button>
                </form>
            </div>
        </div>
    </div>

<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>    
</body>
</html>