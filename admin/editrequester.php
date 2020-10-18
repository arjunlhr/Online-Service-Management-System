<?php
define('TITLE','REQUESTERS');
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

<div class="col-md-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update requester Details</h3> 
  <?php
    if(isset($_REQUEST["edit"])){
        $sql = "SELECT * from requester_db where r_login_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();        
    }
    if(isset($_REQUEST['update'])){
        if(($_REQUEST['r_login_id'] =="") ||($_REQUEST['r_name']=="") || ($_REQUEST['r_email']=="")){
             $msg = '<div class="alert alert-danger mt-2" role="alert">Fill All Field * </div>';
        } else {
             $rid = $_REQUEST['r_login_id'];
             $rname = $_REQUEST['r_name'];
             $remail = $_REQUEST['r_email'];
             $sql = "UPDATE requester_db set r_login_id = '$rid', r_name = '$rname', r_email ='$remail' WHERE r_login_id = '$rid' ";
             if ($conn->query($sql)==true){
                 $msg = '<div class="alert alert-success mt-3">Update Successfully</div>';
             } else {
                 $msg = '<div class="alert alert-danger mt-3">Unable to Update</div>';                    
             }
        }     
     }
  ?> 
  <form action="" method="POST">
      <div class="form-group">
          <label for="r_login_id">Requester Id</label>
          <input type="text" class="form-control" name="r_login_id" id="r_login_id" value="<?php if (isset($row['r_login_id'])) {echo $row['r_login_id'];}?>" readonly>
      </div>
      <div class="form-group">
          <label for="r_name">Name</label>
          <input type="text" class="form-control" name="r_name" id="r_name" value="<?php if (isset($row['r_name'])) {echo $row['r_name'];}?>" >
      </div>
      <div class="form-group">
          <label for="r_email">Email</label>
          <input type="email" class="form-control" name="r_email" id="r_email" value="<?php if (isset($row['r_email'])) {echo $row['r_email'];}?>" >
      </div>
      <div class="text-center">
        <button class="btn btn-danger" id="update" name="update">Update</button>
        <a href="requester.php" class="btn btn-secondary">Close</a>
      </div>
      <?php if (isset($msg)) {echo $msg;}?>
  </form>
</div>

<?php
include('admininclude/footer.php');
?>