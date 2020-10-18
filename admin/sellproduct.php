<?php
define('TITLE','SELL PRODUCT');
define('PAGE','assets');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
if(isset($_REQUEST['submit'])){
    if( ($_REQUEST['customername'] =="") ||($_REQUEST['customeradd']=="") || ($_REQUEST['pname']=="") ||
     ($_REQUEST['pavailable']=="") || ($_REQUEST['quantity']=="") || ($_REQUEST['psellingprice']=="") || ($_REQUEST['ptotal']=="") || ($_REQUEST['pdoc']=="")){
         $msg = '<div class="alert alert-danger mt-2" role="alert">Fill All Field * </div>';
    } else {
         $pid = $_REQUEST['pid'];
         $pava = $_REQUEST['pavailable'] -  $_REQUEST['quantity'];

         $cname = $_REQUEST['customername'];
         $cadd = $_REQUEST['customeradd'];
         $pname = $_REQUEST['pname'];
         $pquantity = $_REQUEST['quantity'];
         $psellingprice = $_REQUEST['psellingprice'];
         $ptotal = $_REQUEST['ptotal'];
         $pdoc = $_REQUEST['pdoc'];
         $sql ="INSERT INTO customber (custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$cname', '$cadd','$pname','$pquantity','$psellingprice','$ptotal', '$pdoc')";
         if ($conn->query($sql)==TRUE){
            $genid = mysqli_insert_id($conn);
            session_start(); 
            $_SESSION['myid'] = $genid;
            echo "<script>location.href='productsellsuccess.php'</script>";    
         } 
         $sqlupdate = "UPDATE product set pavailable ='$pava' where pid='$pid'";
         $conn->query($sqlupdate);
    }      
 }
?>

<div class="col-md-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Customer Bill</h3> 
  <?php
    if(isset($_REQUEST["sell"])){
        $sql = "SELECT * from product where pid = {$_REQUEST['pid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();        
    }
  ?> 

<form action="" method="POST">
    <div class="form-group">
        <label for="pid">Product Id</label>
        <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) {echo $row['pid'];}?>" readonly>
    </div>
    <div class="form-group">
        <label for="customername">Customer Name</label>
        <input type="text" class="form-control" id="customername" name="customername" >
    </div>
    <div class="form-group">
        <label for="customeradd">Customer Address</label>
        <input type="text" class="form-control" id="customeradd" name="customeradd" >
    </div>
    <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) {echo $row['pname'];}?>" readonly>
    </div>
    <div class="form-group">
        <label for="pavailable">Available</label>
        <input type="text" class="form-control" id="pavailable" name="pavailable" value="<?php if (isset($row['pavailable'])) {echo $row['pavailable'];}?>" readonly>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" >
    </div>
    <div class="form-group">
        <label for="psellingprice">Price Each</label>
        <input type="text" class="form-control" id="psellingprice" name="psellingprice" value="<?php if (isset($row['psellingcost'])) {echo $row['psellingcost'];}?>">
    </div>
    <div class="form-group">
        <label for="ptotal">Total Price</label>
        <input type="text" class="form-control" id="ptotal" name="ptotal">
    </div>
    <div class="form-group">
        <label for="pdoc">date</label>
        <input type="date" class="form-control" id="pdoc" name="pdoc">
    </div>
    <div class="text-center">
        <button class="btn btn-danger" id="submit" name="submit">Submit</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>
      </div>

    <?php if(isset($msg)){echo $msg;} ?>
    </form>

</div>
<?php
include('admininclude/footer.php');
?>