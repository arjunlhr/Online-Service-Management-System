<?php
include('dbconnection.php'); // include dbsc connection file
// Checking empty fileds
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") ||
    ($_REQUEST['rPassword']=="")){
        $regmsg ="<div class='alert text-danger'> <small>All Fields are Required * </small> </div>";
    }    
    // checking email id aleready registered or not
    else { 
        $sql = "SELECT r_email FROM requester_db WHERE r_email ='".$_REQUEST['rEmail']."'";
          $result = $conn->query($sql);
        if ($result->num_rows>0){
             $regmsg =  '<div class="alert alert-danger"> Email Id Already Registered </div>';
        } else {
            // Assigning users value into database
            $rName = trim($_REQUEST['rName']);
            $rEmail =$_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];
            $sql = "INSERT INTO requester_db (r_name,r_email,r_password) VALUES ('$rName','$rEmail','$rPassword')";
            if ($conn->query($sql)==TRUE){
            $regmsg = '<div class="alert alert-success"> Account Created Successfully</div>';  
            } else {
                $regmsg = '<div class="alert alert-danger">Unable to Create Account</div>';
            }
        }                        
  }
}   
?>

<div class="container pt-5" id="registration">
     <hr>
     <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-6 offset-md-3">
            <form action="" method="POST" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="rName">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="rName" >
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="rEmail">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="rEmail" >
                    <small class="text-muted">We will never share you information</small>                  
                </div>
                <div class="form-group"> 
                    <i class="fas fa-key"></i>
                    <label for="rPassword">Create Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="rPassword" >
                </div>
                <button type="submit" class="btn btn-danger mt-4 btn-block shadow-lg font-weight-bold" name="rSignup">Sign up</button>
                <small class="text-muted">Agree our Terms and Conditions</small><br>
                <?php if(isset($regmsg)) {echo $regmsg;} ?>
            </form>      
        </div>
    </div> 
 </div>