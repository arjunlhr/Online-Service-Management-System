<?php
define('TITLE','WORK');
define('PAGE','work');
include('admininclude/header.php');
include('../dbconnection.php');
if(session_id()==""){
    session_start();
}
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-md-9 mt-5"> 
<?php
    $sql = "SELECT * from assignwork";
    $result = $conn->query($sql);
    if ($result->num_rows> 0 ){    
echo    '<table class="table table-bordered">';
echo    '<thead>';
echo    '<tr>';
echo        '<th scope="col">Id</th>';
echo        '<th scope="col">Info</th>';
echo        '<th scope="col">Name</th>';
echo        '<th scope="col">Address 1</th>';
echo        '<th scope="col">Address 2</th>';
echo        '<th scope="col">City</th>';
echo        '<th scope="col">Mobile</th>';
echo        '<th scope="col">Technician</th>';
echo        '<th scope="col">Assign Date</th>';
echo        '<th scope="col">Action</th>';
echo    '</tr>';
echo    '</thead>';
    echo '<tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
                echo '<td>' .$row["assignrequestid"]. '</td>';
                echo '<td>' .$row["assigninfo"]. '</td>';
                echo '<td>' .$row["assignname"]. '</td>';
                echo '<td>' .$row["assignadd1"]. '</td>';
                echo '<td>' .$row["assignadd2"]. '</td>';
                echo '<td>' .$row["assigncity"]. '</td>';
                echo '<td>' .$row["assignmobile"]. '</td>';
                echo '<td>' .$row["assigntechnician"]. '</td>';
                echo '<td>' .$row["assigndate"]. '</td>';
                echo '<td>' ;
              echo '<form action="viewassignwork.php" method="POST" class="d-inline">';
            echo    '<input type="hidden" name="id" value='.$row["assignrequestid"].'>
                <button class="btn btn-warning" name="view" value="View" type="Submit"> <i class="far fa-eye"></i> </button>';
            echo    '</form>';
            echo '<form action="" method="POST" class="d-inline">';
            echo    '<input type="hidden" name="id" value='.$row["assignrequestid"].'>
                <button class="btn btn-danger" name="delete" value="delete" type="Submit"><i class="far fa-trash-alt"></i></button>';
            echo    '</form>';
        }  
    echo '</tbody>';
    echo    '</table>'; 
} else {
    echo '0 result';
} 
if (isset($_REQUEST['delete'])){
$sql = "DELETE from assignwork where assignrequestid= {$_REQUEST['id']}";
if ($conn->query($sql)==TRUE){
    echo '<meta http-equiv="refresh" content = "0;URL=?deleted"/>';
} else {
    echo "Unable to delete data";
}
}

?>
</div>
<!-- End 2nd Column -->

<?php
include('admininclude/footer.php');
?>