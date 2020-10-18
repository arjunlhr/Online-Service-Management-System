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
<div class="col-sm-9 mt-5 text-center table-sm table-responsive">
<p class="bg-dark text-white p-2">List of Product</p>
<?php
    $sql = "SELECT * from product";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     echo '<table class="table">';
     echo '<thead>';
     echo '<tr>';
        echo '<th>Product Id</th>';
        echo '<th>Name</th>';
        echo '<th>Date of Purchase</th>';
        echo '<th>Available</th>';
        echo '<th>Total</th>';
        echo '<th>Original Price Each</th>';
        echo '<th>Selling Price Each</th>';
        echo '<th>Action';
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row["pid"].'</td>';
                echo '<td>'.$row["pname"].'</td>';
                echo '<td>'.$row["pdateofpurchase"].'</td>';
                echo '<td>'.$row["pavailable"].'</td>';
                echo '<td>'.$row["ptotal"].'</td>';
                echo '<td>'.$row["poriginalcost"].'</td>';
                echo '<td>'.$row["psellingcost"].'</td>';
                echo '<td>';
                echo '<form action="editassets.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="pid" value='.$row["pid"].'><button type="submit" class="btn btn-info" mr-3 name="edit" value"Edit"><i class="fas fa-pen mr-1 fa-sm" ></i></button>';    
                echo '</form>';
                echo '<form action="" method="POST" class="d-inline">';
                echo '<input type="hidden" name="pid" value='.$row["pid"].'><button type="submit" class="btn btn-warning ml-3"  name="delete" value"delete"><i class="fas fa-trash-alt fa-sm"></i></button>';
                echo '</form>';
                echo '</form>';
                echo '<form action="sellproduct.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="pid" value='.$row["pid"].'><button type="submit" class="btn btn-secondary ml-3" name="sell" value"sell"><i class="fas fa-handshake fa-sm"></i></button>';
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
    $sql = "DELETE from product where pid = {$_REQUEST['pid']}";
    if($conn->query($sql)==true){
        echo '<meta http-equiv="refresh" content ="0,URL=?deleted"/>';
    } else {
        echo "Unable to Delete";
    }
}
?>
</div>
<div class="float-right ">
<a href="insertassets.php" class="btn btn-danger"><i class="fas fa-plus"></i></a>
</div>
</div> <!-- Container end -->
<!-- Side Bar end -->
<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>        
</body>
</html>
