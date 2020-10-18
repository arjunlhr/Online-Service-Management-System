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
    <title> <?php echo TITLE ?> </title>
</head>
<body>
<!-- Start Navbar -->
<nav class="navbar navbar-dar fixed-top bg-danger p-0 shadow">
<a class="navbar-brand col-sm-2 col-md-3 mr-0" href="userprofile.php">OSMS</a>
</nav>
<!-- End navbar -->

<!-- Side Bar start -->
<div class="container-fluid" style="margin-top: 40px;"> <!-- Container start -->
    <div class="row">
        <nav class="col-md-3 bg-light sidebar py-5 d-print-none">
            <!-- navbar start -->
            <div class="sidebar-sticky nav-pills">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="userprofile.php"class="nav-link <?php if (PAGE=='userprofile'){echo 'active';}?>" ><i class="fas fa-user mr-2"></i>Profile</a></li>
                    <li class="nav-item"><a href="submitrequest.php" class="nav-link <?php if (PAGE=='submitrequest'){echo 'active';}?>"><i class="fab fa-accessible-icon mr-2"></i>Submit Request</a></li>
                    <li class="nav-item"><a href="servicestatus.php" class="nav-link <?php if (PAGE=='servicestatus'){echo 'active';}?> "><i class="fas fa-user mr-2"></i>Service Status</a></li>
                    <li class="nav-item"><a href="changepassword.php" class="nav-link <?php if (PAGE=='changepassword'){echo 'active';}?> "><i class="fas fa-key mr-2"></i>Change Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link "><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                </ul>
            </div>
            <!-- navbar end -->
        </nav>

