<?php 
define('TITLE', 'Profile');
define('PAGE', 'userprofile');
include('includefiles/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];   
} else {
    echo "<script location .href='login.php'></script>";
}
$sql = "SELECT r_name,r_email from requester_db where r_email = '$rEmail'";
$result = $conn->query($sql);
if ($result->num_rows==1){
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
}
if (isset($_REQUEST['rUpdate'])){
    $rName = $_REQUEST['rName'];
    if ($_REQUEST['rName']==""){
        $erromsg = '<div class="alert text-danger"> Fill All Empty Field * </div>';
    } else {
        $sql = "UPDATE requester_db SET r_name = '$rName' WHERE r_email = '$rEmail'";
        if ($conn->query($sql)){
            $erromsg= '<div class="alert text-success"> Name Update Successfully </div>';
        } else {
            $erromsg = '<div class="alert text-danger"> Unable to Update name </div>';
        }
    }    
}
?>
        <div class="col-sm-6 mt-5">  <!-- Start profile area 2nd column -->
            <form action="" method="POST" class="mx-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly >
                </div>
                <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
                </div>
                <button type="submit" class="btn btn-danger" name="rUpdate">Update</button>
                <?php if(isset($erromsg)) {echo $erromsg;} ?>
         </form>

        </div>  <!-- End profile aread 2n column -->
    </div>
</div> <!-- Container end -->
<!-- Side Bar end -->
<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>        
</body>
</html>