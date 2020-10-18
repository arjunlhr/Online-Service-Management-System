<?php
define('TITLE','REQUEST');
define('PAGE','request');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
?>
<!-- Start  2nd column -->
<div class="col-md-4">
<?php
    $sql = "SELECT * FROM submitrequest";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
           echo  '<div class="card mt-4 font-weight-bold">';
           echo     '<div class="card-header bg-success  text-center">';
            echo        'Request Id : '. $row['submitrequestid'];  
             echo   '</div>';
             echo   '<div class="card-body text-left">';
              echo   '<h6 class="card-title font-weight-bold">Request Info: '.$row['submitrequestinfo'];
              echo   '</h6>';      
              echo   '<p class="">Request Date: '.$row['submitrequestdate'];
              echo   '</p>';  
              echo '<div class="float-right">';
              echo '<form action="" method="post">';
              echo '<input type="hidden" name="id" value='.$row["submitrequestid"].'>';
              echo '<input type="submit" class="btn btn-danger" value="View" name="view">';
              echo '<input type="submit" class="btn btn-dark ml-3" value="Close" name="close">';
             echo '</form>';
              echo '</div>';    
               echo '</div>';
           echo '</div>';
        }
    } 
?>
</div>
<!-- End 2nd  column  -->


<?php
include('assignform.php');
include('admininclude/footer.php');
?>



