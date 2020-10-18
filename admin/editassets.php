<?php
define('TITLE','ASSETS');
define('PAGE','assets');
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
  <h3 class="text-center">Update Product Details</h3> 
  <?php
    if(isset($_REQUEST["edit"])){
        $sql = "SELECT * from product where pid = {$_REQUEST['pid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();        
    }
    if(isset($_REQUEST['update'])){
        if( ($_REQUEST['pid'] =="") || ($_REQUEST['pname'] =="") ||($_REQUEST['pdop']=="") || ($_REQUEST['pavailable']=="") ||
         ($_REQUEST['ptotal']=="") || ($_REQUEST['poriginalprice']=="") || ($_REQUEST['psellingprice']=="")){
             $msg = '<div class="alert alert-danger mt-2" role="alert">Fill All Field * </div>';
        } else {
             $pid = $_REQUEST['pid'];
             $pname = $_REQUEST['pname'];
             $pdop = $_REQUEST['pdop'];
             $pavailable = $_REQUEST['pavailable'];
             $ptotal = $_REQUEST['ptotal'];
             $poriginalprice = $_REQUEST['poriginalprice'];
             $psellingprice = $_REQUEST['psellingprice'];
             $sql = "UPDATE product set pid = '$pid', pname = '$pname', pdateofpurchase ='$pdop', pavailable='$pavailable', ptotal='$ptotal', poriginalcost='$poriginalprice', psellingcost='$psellingprice' WHERE pid = '$pid' ";
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
        <label for="pid">Product Id</label>
        <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) {echo $row['pid'];}?>" readonly>
    </div>
    <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) {echo $row['pname'];}?>">
    </div>
    <div class="form-group">
        <label for="pdop">Date of Purchase</label>
        <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if (isset($row['pdateofpurchase'])) {echo $row['pdateofpurchase'];}?>">
    </div>
    <div class="form-group">
        <label for="pavailable">Available</label>
        <input type="text" class="form-control" id="pavailable" name="pavailable" value="<?php if (isset($row['pavailable'])) {echo $row['pavailable'];}?>">
    </div>
    <div class="form-group">
        <label for="ptotal">Total</label>
        <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if (isset($row['ptotal'])) {echo $row['ptotal'];}?>">
    </div>
    <div class="form-group">
        <label for="poriginalprice">Original Price</label>
        <input type="text" class="form-control" id="poriginalprice" name="poriginalprice" value="<?php if (isset($row['poriginalcost'])) {echo $row['poriginalcost'];}?>">
    </div>
    <div class="form-group">
        <label for="psellingprice">Selling Price</label>
        <input type="text" class="form-control" id="psellingprice" name="psellingprice" value="<?php if (isset($row['psellingcost'])) {echo $row['psellingcost'];}?>">
    </div>
    <div class="text-center">
        <button class="btn btn-danger" id="update" name="update">Update</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>
      </div>
    <?php if(isset($msg)){echo $msg;} ?>
    </form>

</div>
<?php
include('admininclude/footer.php');
?>