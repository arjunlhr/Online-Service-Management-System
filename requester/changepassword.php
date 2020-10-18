<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepassword');
include('includefiles/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];   
} else {
    echo "<script> location.href='login.php'</script>";
}

$rEmail = $_SESSION['rEmail']; 
 if (isset($_REQUEST['rUpdate'])){
     $rPassword = $_REQUEST['rPassword'];
     if ($_REQUEST['rPassword']==""){
         $erromsg = '<div class="alert text-danger"> Password cant empty * </div>';
     } else {
         $sql = "UPDATE requester_db SET r_password = '$rPassword' WHERE r_email = '$rEmail'";
         if ($conn->query($sql)==true){
             $erromsg= '<div class="alert text-success"> Password Successfully Changed</div>';
         } else {
             $erromsg = '<div class="alert text-danger"> Unable to Update password </div>';
         }
    }  
}  
?>
<div class="col-sm-8 col-md-7 mt-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputpassword">Password</label>
            <input type="password" class="form-control" id="inputpassword" 
            placeholder="New Password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" 
        name="rUpdate">Update</button>
       <button type="reset" class="btn btn-dark mr-2 mt-4">Reset</button>
       <?php if(isset($erromsg)) {echo $erromsg;} ?>
    </form>
</div>

<?php
include('includefiles/footer.php');
?>