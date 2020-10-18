<?php
define('TITLE','TECHNICIAN');
define('PAGE','technician');
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
  <h3 class="text-center">Update technician Details</h3> 
  <?php
    if(isset($_REQUEST["edit"])){
        $sql = "SELECT * from technician where empid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();        
    }
    if(isset($_REQUEST['update'])){
        if(($_REQUEST['r_id'] =="") ||($_REQUEST['r_name']=="") || ($_REQUEST['r_email']=="") || ($_REQUEST['r_city']=="") || ($_REQUEST['r_mobile']=="") ){
             $msg = '<div class="alert alert-danger mt-2" role="alert">Fill All Field * </div>';
        } else {
             $rid = $_REQUEST['r_id'];
             $rname = $_REQUEST['r_name'];
             $remail = $_REQUEST['r_email'];
             $rcity = $_REQUEST['r_city'];
             $rmobile = $_REQUEST['r_mobile'];
             $sql = "UPDATE technician set empid = '$rid', empname = '$rname', empmail ='$remail', empcity='$rcity', empmobile='$rmobile' WHERE empid = '$rid' ";
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
          <label for="r_id">Requester Id</label>
          <input type="text" class="form-control" name="r_id" id="r_id" value="<?php if (isset($row['empid'])) {echo $row['empid'];}?>" readonly>
      </div>
      <div class="form-group">
          <label for="r_name">Name</label>
          <input type="text" class="form-control" name="r_name" id="r_name" value="<?php if (isset($row['empname'])) {echo $row['empname'];}?>" >
      </div>
      <div class="form-group">
          <label for="r_email">Email</label>
          <input type="email" class="form-control" name="r_email" id="r_email" value="<?php if (isset($row['empmail'])) {echo $row['empmail'];}?>" >
      </div>
      <div class="form-group">
          <label for="r_city">City</label>
          <input type="text" class="form-control" name="r_city" id="r_city" value="<?php if (isset($row['empcity'])) {echo $row['empcity'];}?>" >
      </div>
      <div class="form-group">
          <label for="r_email">Mobile</label>
          <input type="text" class="form-control" name="r_mobile" id="r_email" value="<?php if (isset($row['empmobile'])) {echo $row['empmobile'];}?>" >
      </div>
      <div class="text-center">
        <button class="btn btn-danger" id="update" name="update">Update</button>
        <a href="technician.php" class="btn btn-secondary">Close</a>
      </div>
      <?php if (isset($msg)) {echo $msg;}?>
  </form>
</div>

<?php
include('admininclude/footer.php');
?>