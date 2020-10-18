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
<div class="col-md-8 mt-5 text-center">
<p class="bg-dark text-white p-2">List of Requester</p>
<?php
    $sql = "SELECT * from requester_db";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     echo '<table class="table">';
     echo '<thead>';
     echo '<tr>';
        echo '<th>Requester Id</th>';
        echo '<th>Name</th>';
        echo '<th>Email</th>';
        echo '<th>Action</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row["r_login_id"].'</td>';
                echo '<td>'.$row["r_name"].'</td>';
                echo '<td>'.$row["r_email"].'</td>';
                echo '<td>';
                echo '<form action="editrequester.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="id" value='.$row["r_login_id"].'><button type="submit" class="btn btn-info" mr-3 name="edit" value"Edit"><i class="fas fa-pen mr-1"></i></button>';    
                echo '</form>';
                echo '<form action="" method="POST" class="d-inline">';
                echo '<input type="hidden" name="id" value='.$row["r_login_id"].'><button type="submit" class="btn btn-warning ml-3"  name="delete" value"delete"><i class="fas fa-trash-alt "></i></button>';
                echo '</form>';    
                '</td>';
            echo '</tr>';
        }
     echo '<tbody>';
     echo '</table>';
    }  else {
        echo "0 results";
    }

?>    
</div>
<?php
    if (isset($_REQUEST['delete'])){
    $sql = "DELETE from requester_db where r_login_id = {$_REQUEST['id']}";
    if($conn->query($sql)==true){
        echo '<meta http-equiv="refresh" content ="0,URL=?deleted"/>';
    } else {
        echo "Unable to Delete";
    }
}
?>
</div>
<div class="float-right ">
<a href="insertrequestr.php" class="btn btn-danger"><i class="fas fa-plus"></i></a>
</div>
</div> <!-- Container end -->
<!-- Side Bar end -->
<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>        
</body>
</html>
