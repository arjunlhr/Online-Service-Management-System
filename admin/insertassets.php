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

<?php
    if (isset($_REQUEST['submit'])){
        if(($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['pavailable']=="") || ($_REQUEST['ptotal']=="") || ($_REQUEST['poriginalprice']=="")|| ($_REQUEST['psellingprice']=="") ){
            $msg = '<div class="alert alert-danger"> Fill All Fields * </div>';
        } else {
            $pname = $_REQUEST['pname'];
            $pdop = $_REQUEST['pdop'];
            $pavailable = $_REQUEST['pavailable'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalprice = $_REQUEST['poriginalprice'];
            $psellingprice = $_REQUEST['psellingprice'];

            $sql = "INSERT INTO product (pname, pdateofpurchase, pavailable, ptotal, poriginalcost, psellingcost) VALUES ('$pname','$pdop','$pavailable','$ptotal','$poriginalprice','$psellingprice')";
            if($conn->query($sql)==TRUE){
                $msg = '<div class="alert alert-success"> Product Add Successfully </div>';
            } else {
                $msg = '<div class="alert alert-danger"> Unable to Add Product </div>';
            }
        }
    }
?>
<div class="col-md-6 jumbotron ml-3 mt-5">
<h3 class="text-center bg-dark text-white mb-5">Add Product</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="form-group">
        <label for="pdop">Date of Purchase</label>
        <input type="date" class="form-control" id="pdop" name="pdop">
    </div>
    <div class="form-group">
        <label for="pavailable">Available</label>
        <input type="text" class="form-control" id="pavailable" name="pavailable">
    </div>
    <div class="form-group">
        <label for="ptotal">Total</label>
        <input type="text" class="form-control" id="ptotal" name="ptotal">
    </div>
    <div class="form-group">
        <label for="poriginalprice">Original Price</label>
        <input type="text" class="form-control" id="poriginalprice" name="poriginalprice">
    </div>
    <div class="form-group">
        <label for="psellingprice">Selling Price</label>
        <input type="text" class="form-control" id="psellingprice" name="psellingprice">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>        
    </div>
    <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>


