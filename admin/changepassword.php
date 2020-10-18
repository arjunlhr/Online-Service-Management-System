<?php
define('TITLE','CHANGE PASSWORD');
define('PAGE','changepassword');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
$aEmail = $_SESSION['aEmail']; 
 if (isset($_REQUEST['aUpdate'])){

     if ($_REQUEST['aPassword']==""){
         $erromsg = '<div class="alert text-danger"> Password cant empty * </div>';
     } else {
         $aPassword = $_REQUEST['aPassword'];
         $sql = "UPDATE adminlogin SET apassword = '$aPassword' WHERE aemail = '$aEmail'";
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
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputpassword">Password</label>
            <input type="password" class="form-control" id="inputpassword" 
            placeholder="New Password" name="aPassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" 
        name="aUpdate">Update </button>
       <button type="reset" class="btn btn-dark mr-2 mt-4">Reset</button>
       <?php if(isset($erromsg)) {echo $erromsg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>