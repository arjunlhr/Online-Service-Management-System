<?php
define('TITLE', 'Service Status');
define('PAGE', 'servicestatus');
include('includefiles/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];   
} else {
    echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd column -->
<div class="col-md-6 mt-5">
<form action="" method="POST" class="form-inline d-print-none">
    <div class="form-group mr-3 " >
        <label for="checkid" class="mr-2">Enter Request Id </label>
        <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
</form>
<?php
if(isset($_REQUEST['checkid'])){
    if($_REQUEST['checkid']==""){
        $msg = '<div class="alert alert-danger mt-3">Fill All Fields</div>';
    } else {
        $sql = "SELECT * from assignwork where assignrequestid = {$_REQUEST['checkid']}";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        if(($row['assignrequestid']==$_REQUEST['checkid'])){ ?>    
    <h3 class="text-danger text-center mt-5">Assinged Work Details</h3>
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
    <form action="" class="d-print-none">
    <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
    <input type="submit" class="btn btn-secondary" value="Close">
    </form>
    </div>
    <?php } else {
       echo '<div class="alert-warning mt-3">Your Request Still Pending</div>';
    } 
     
    }
}
?>
    <?php  if(isset($msg)){echo $msg;} ?>
</div> <!-- End 2nd Column -->
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>


<?php
include('includefiles/footer.php');
?>