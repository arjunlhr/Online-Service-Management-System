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
<div class="col-md-9 mt-5 text-center">
<p class="bg-dark text-white p-2">List of Technician</p>
<?php
    $sql = "SELECT * from technician";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     echo '<table class="table">';
     echo '<thead>';
     echo '<tr>';
        echo '<th>Emp Id</th>';
        echo '<th>Name</th>';
        echo '<th>City</th>';
        echo '<th>Mobile</th>';
        echo '<th>Email</th>';
        echo '<th>Action</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row["empid"].'</td>';
                echo '<td>'.$row["empname"].'</td>';
                echo '<td>'.$row["empcity"].'</td>';
                echo '<td>'.$row["empmobile"].'</td>';
                echo '<td>'.$row["empmail"].'</td>';
                echo '<td>';
                echo '<form action="edittechnician.php" method="POST" class="d-inline">';
                echo '<input type="hidden" name="id" value='.$row["empid"].'><button type="submit" class="btn btn-info" mr-3 name="edit" value"Edit"><i class="fas fa-pen mr-1"></i></button>';    
                echo '</form>';
                echo '<form action="" method="POST" class="d-inline">';
                echo '<input type="hidden" name="id" value='.$row["empid"].'><button type="submit" class="btn btn-warning ml-3"  name="delete" value"delete"><i class="fas fa-trash-alt "></i></button>';
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
    $sql = "DELETE from technician where empid = {$_REQUEST['id']}";
    if($conn->query($sql)==true){
        echo '<meta http-equiv="refresh" content ="0,URL=?deleted"/>';
    } else {
        echo "Unable to Delete";
    }
}
?>
</div>
<div class="float-right ">
<a href="inserttechnician.php" class="btn btn-danger"><i class="fas fa-plus"></i></a>
</div>
</div> <!-- Container end -->
<!-- Side Bar end -->
<script src="../js/jquery.min.js"></script>
<script src="../js/poppe.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>        
</body>
</html>
