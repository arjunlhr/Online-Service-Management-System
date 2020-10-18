<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Font awesome css-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--Custom css -->
    <link rel="stylesheet" href="css/mystyle.css">

    <title>OSMS</title>
</head>
<body>
<!--start navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">

<a href="index.php" class="navbar-brand">OSMS</a>
<small class="navbar-text">Customer Happiness is our Aim</small>

<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="myMenu">
    <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Service</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#contactus" class="nav-link">Contact</a></li>
    </ul> 
</div>
</nav> <!--end navigation tag-->
<!--Jumbotrol start -->
<header class="jumbotron back-image mt-5" style="background-image: url(images/customer.jpg);">
    <div class="mt-3 myclass">
        <h1 class="text-warning">WELCOME TO OSMS</h1>
        <P class="custom-text">Customer Happiness is our Aim</P>
        <a href="requester/login.php" class="btn btn-success">Login</a>
        <a href="#registration" class="btn btn-danger">Sign Up</a>
    </div> 
</header> <!--Jumbotrol End -->
<!--Start intorducion secton -->
<div class="container">
    <div class="jumbotron">
        <h3 class="text-center ">OSMS Services </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore placeat voluptas odio repudiandae, error dolores sed quam consectetur exercitationem quis reiciendis quae molestiae sequi facilis nesciunt? Quo aliquam architecto eveniet error, incidunt fugiat laborum. Dolore atque molestias repellendus enim aut! Harum dolore dignissimos unde ab sunt libero possimus vel voluptatem corrupti ex officia accusantium, repudiandae asperiores odit eligendi error totam dolorem atque reiciendis inventore perferendis architecto eum deleniti sit? Placeat, doloremque? Tempore explicabo porro libero, ipsum nihil cum in reprehenderit a officia sit quia voluptates iste? Nisi doloribus, dolore laboriosam explicabo laudantium, aspernatur eius libero totam corrupti quia rem quo.</p>
    </div>
</div> <!--End intorducion secton -->
<!-- start Our service section Container -->
<div class="container text-center">
    <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-md-4">
            <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>   
            <h4 class="mt-2">Electronic Appliances</h4>
            </div>
            <div class="col-md-4">
            <a href="#"><i class="fas fa-sliders-h fa-8x  "></i></a>   
              <h4 class="mt-2">Maintanance</h4>
            </div>
            <div class="col-md-4">
            <a href="#"><i class="fas fa-cogs fa-8x text-info "></i></a>   
            <h4 class="mt-2">Fault Repair</h4>
            </div>
         </div>
</div> <!-- end Our service section Container -->
<!-- Start create account section -->
<?php include('signupform.php') ?>
<!-- End create account section -->
<!-- Start Happy Customer section -->
<div class="jumbotron bg-danger"> 
    <div class="container">
        <h4 class="text-center text-white mb-5" >Happy Customers</h4>    
         <div class="row">
             <div class="col-lg-3 col-sm-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body text-center">
                        <img src="images/main.jpg" class="img-fluid " style="width: 75px; height:75px; border-radius: 100px">
                        <h4 class="card-title">Arjun Lahare</h4>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, natus perferendis.</p>
                     </div>
                 </div>
             </div>  <!-- end 1st column -->
             <div class="col-lg-3 col-sm-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body text-center">
                        <img src="images/man1.jpg" class="img-fluid " style="width: 75px; height:75px; border-radius: 100px">
                        <h4 class="card-title">Pradad Lahare</h4>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, natus perferendis.</p>
                     </div>
                 </div>
             </div> <!-- End 2nd column -->
             <div class="col-lg-3 col-sm-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body text-center">
                        <img src="images/man2.jpg" class="img-fluid " style="width: 75px; height:75px; border-radius: 100px">
                        <h4 class="card-title">Shubham Lachure</h4>
                        <p class="card-text"> t consectetur adipisicing elit. Mollitia, natus perferendis.</p>
                     </div>
                 </div>
             </div> <!--end 3rd column  -->
             <div class="col-lg-3 col-sm-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body text-center">
                        <img src="images/man3.jpg" class="img-fluid " style="width: 75px; height:75px; border-radius: 100px">
                        <h4 class="card-title">Kedar Paropkari</h4>
                        <p class="card-text"> met consectetur adipisicing elit. Mollitia, natus perferendis.</p>
                     </div>
                 </div>
             </div>  <!-- end 4th column -->
         </div>    
    </div>  
</div> <!--End happy customer section  -->
<!-- Start contact us section -->
<div class="container">
    <h4 class="text-center">Contact us</h4>
    <div class="row">
        <div class="col-md-8 shadow-lg p-3 mb-4"> 
<!-- start 1st column -->
      <?php include('contactus.php')?>  
<!-- end 1st column -->
        <div class="col-md-4 text-center"> 
            <!-- start 2nd colum-->
            <strong>Headqurter</strong><br>
            Dhimbergalli, Begumpura <br>
            Aurangabad 431001 <br>
            Mob No. 9923601376 <br>
            <a href="#" target="_blank">www.osms.com</a><br><br>
            <strong>Branch</strong><br>
            Parvatinagar, Guruganeshnagar <br>
            Behind Sai mandi, Aurangabad 431004 <br>
            Mob No. 9923601376 <br>
            <a href="#" target="_blank">www.osms.com</a><br><br>
        </div> <!-- end 2nd colum-->
    </div>  <!-- row end-->
</div> <!-- Container end-->
<!-- Footer start -->
<footer class="container-fluid bg-dark text-white mt-5">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6">
                <span class="pr-2">Follow Us</span>
                <a href="#" target="_blank" class="pr-2 fi-color"><li class="fab fa-facebook-f"></li></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><li class="fab fa-twitter"></li></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><li class="fab fa-youtube"></li></a>
            </div>
            <div class="col-md-6">
                <small class="ml-5">Designed by Arjun Lahare &copy; 2020</small>
                <small class="ml-3"><a href="admin/adminlogin.php">Admin Login</a></small>
            </div>
        </div>
    </div>
</footer> 
<!-- Footer end -->
<script src="js/jquery.min.js"></script>
<script src="js/poppe.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>