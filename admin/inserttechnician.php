<?php
define('TITLE','TECHNICIAN');
define('PAGE','inserttechnician');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
?>

<?php
    if (isset($_REQUEST['submit'])){
        if(($_REQUEST['empname']=="") || ($_REQUEST['empcity']=="") || ($_REQUEST['empmobile']=="") || ($_REQUEST['empemail']=="")){
            $msg = '<div class="alert alert-danger"> Fill All Fields * </div>';
        } else {
            $name = $_REQUEST['empname'];
            $city = $_REQUEST['empcity'];
            $mobile = $_REQUEST['empmobile'];
            $email = $_REQUEST['empemail'];

            $sql = "INSERT INTO technician (empname,empcity,empmobile,empmail) VALUES ('$name','$city','$mobile','$email')";
            if($conn->query($sql)==TRUE){
                $msg = '<div class="alert alert-success"> technician add Successfully </div>';
            } else {
                $msg = '<div class="alert alert-danger"> Unable to Add Technician </div>';
            }
        }
    }
?>
<div class="col-md-6 jumbotron ml-3 mt-5">
<h3 class="text-center bg-dark text-white mb-5">Add New Technician</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="empname">Name</label>
        <input type="text" class="form-control" id="empname" name="empname">
    </div>
    <div class="form-group">
        <label for="empcity">City</label>
        <input type="text" class="form-control" id="city" name="empcity">
    </div>
    <div class="form-group">
        <label for="empmobile">Mobile</label>
        <input type="text" class="form-control" id="r_password" name="empmobile">
    </div>
    <div class="form-group">
        <label for="empmail">Email</label>
        <input type="text" class="form-control" id="r_password" name="empemail">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
        <a href="technician.php" class="btn btn-secondary">Close</a>        
    </div>
    <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>


