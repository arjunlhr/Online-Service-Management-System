<?php
define('TITLE','ASSIGN');
define('PAGE','work');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
?>
<!-- Start 2nd column -->
<div class="col-md-7 mt-5 mx-5">
 <h3 class="text-center">Assigned Work Details</h3>
<?php
    if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM assignwork where assignrequestid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request Id </td>
                <td> <?php if(isset($row['assignrequestid'])) {echo 
                $row['assignrequestid'];} ?> </td>
            </tr>
            <tr>
                <td>Request Info </td>
                <td> <?php if(isset($row['assigninfo'])) {echo 
                $row['assigninfo'];} ?> </td>
            </tr>
            <tr>
                <td>Request Description </td>
                <td> <?php if(isset($row['assigndesc'])) {echo 
                $row['assigndesc'];} ?> </td>
            </tr>
            <tr>
                <td>Request Name </td>
                <td> <?php if(isset($row['assignname'])) {echo 
                $row['assignname'];} ?> </td>
            </tr>
            <tr>
                <td>Request Address </td>
                <td> <?php if(isset($row['assignadd1'])) {echo 
                $row['assignadd1'];} ?> </td>
            </tr>
            <tr>
                <td>Request Address2 </td>
                <td> <?php if(isset($row['assignadd2'])) {echo 
                $row['assignadd2'];} ?> </td>
            </tr>
            <tr>
                <td>Request Email </td>
                <td> <?php if(isset($row['assignemail'])) {echo 
                $row['assignemail'];} ?> </td>
            </tr>
            <tr>
                <td>Request Mobile </td>
                <td> <?php if(isset($row['assignmobile'])) {echo 
                $row['assignmobile'];} ?> </td>
            </tr>
            <tr>
                <td>Request Date </td>
                <td> <?php if(isset($row['assigndate'])) {echo 
                $row['assigndate'];} ?> </td>
            </tr>
            <tr>
                <td>Technician</td>
                <td> <?php if(isset($row['assigntechnician'])) {echo 
                $row['assigntechnician'];} ?> </td>
            </tr>
            <tr>
                <td> Customer Sign </td>
                <td></td>
            </tr>
            <tr>
                <td> Technician Sign </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
    <form action="" class="d-print-none d-inline mr-3">
    <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
    </form>
    <form action="work.php" class="d-print-none d-inline">
    <input type="submit" class="btn btn-secondary" value="Close">
    </form>  
    </div>
<?php } ?>

</div>
<!-- End 2nd Colum -->

<?php
include('admininclude/footer.php');
?>