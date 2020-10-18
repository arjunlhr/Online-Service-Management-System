<?php
define('TITLE','REQUESTER');
define('PAGE','requester');
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
        if(($_REQUEST['r_name']=="") || ($_REQUEST['r_email']=="") || ($_REQUEST['r_password']=="") ){
            $msg = '<div class="alert alert-danger"> Fill All Fields * </div>';
        } else {
            $name = $_REQUEST['r_name'];
            $email = $_REQUEST['r_email'];
            $password = $_REQUEST['r_password'];
    
            $sql = "INSERT INTO requester_db (r_name,r_email,r_password) VALUES ('$name','$email','$password')";
            if($conn->query($sql)==TRUE){
                $msg = '<div class="alert alert-success"> User"s Account Created Successfully</div>';
            } else {
                $msg = 'unable to create user acoount';  
            }
        }
    }
?>
<div class="col-md-6 jumbotron ml-3 mt-5">
<h3 class="text-center bg-dark text-white mb-5">Add New Requester</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="r_name">Name</label>
        <input type="text" class="form-control" id="r_name" name="r_name">
    </div>
    <div class="form-group">
        <label for="r_email">Email</label>
        <input type="email" class="form-control" id="r_email" name="r_email">
    </div>
    <div class="form-group">
        <label for="r_passsword">Password</label>
        <input type="password" class="form-control" id="r_password" name="r_password">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
        <a href="requester.php" class="btn btn-secondary">Close</a>        
    </div>
    <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>
