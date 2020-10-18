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
<a class="navbar-brand col-sm-2 col-md-3 mr-0" href="dashboard.php">OSMS</a>
</nav>
<!-- End navbar -->

<!-- Side Bar start -->
<div class="container-fluid" style="margin-top: 40px;"> <!-- Container start -->
    <div class="row">
        <nav class="col-md-3 col-sm-2 bg-light sidebar py-5 d-print-none">
            <!-- navbar start -->
            <div class="sidebar-sticky nav-pills">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="dashboard.php"class="nav-link <?php if (PAGE=='dashboard'){echo 'active';}?>" ><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="work.php" class="nav-link <?php if (PAGE=='work'){echo 'active';}?>"><i class="fab fa-accessible-icon mr-2"></i>Work Order</a></li>
                    <li class="nav-item"><a href="request.php" class="nav-link <?php if (PAGE=='request'){echo 'active';}?> "><i class="fas fa-user mr-2"></i>Request</a></li>
                    <li class="nav-item"><a href="assets.php" class="nav-link <?php if (PAGE=='assets'){echo 'active';}?> "><i class="fas fa-key mr-2"></i>Assets</a></li>
                    <li class="nav-item"><a href="technician.php" class="nav-link <?php if (PAGE=='technician'){echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Technician</a></li>
                    <li class="nav-item"><a href="requester.php" class="nav-link <?php if (PAGE=='requester'){echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Requester</a></li>
                    <li class="nav-item"><a href="sellreport.php" class="nav-link <?php if (PAGE=='sellreport'){echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Sell Report</a></li>
                    <li class="nav-item"><a href="workreport.php" class="nav-link <?php if (PAGE=='workreport'){echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Work Report</a></li>
                    <li class="nav-item"><a href="changepassword.php" class="nav-link <?php if (PAGE=='changepassword'){echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Change Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link" ><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                </ul>
            </div>
            <!-- navbar end -->
        </nav>

