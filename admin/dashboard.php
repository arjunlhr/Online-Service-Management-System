<?php
define('TITLE','DASHBOARD');
define('PAGE','dashboard');
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

$sqlrequest = "SELECT max(submitrequestid) from submitrequest";
$result = $conn->query($sqlrequest);
$row = mysqli_fetch_row($result);
$submitrequest =  $row[0]; 

$sqlrequest = "SELECT max(assignrequestid) from assignwork";
$result = $conn->query($sqlrequest);
$row = mysqli_fetch_row($result);
$assignwork =  $row[0]; 


$sqlrequest = "SELECT max(empid) from technician";
$result = $conn->query($sqlrequest);
$row = mysqli_fetch_row($result);
$technician =  $row[0]; 

?>
        <div  class="col-sm-8 col-md-9">         <!-- Start 2nd column dashboard -->
            <div class="row text-center mx-3">
                <div class="col-md-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Request Received </div>
                        <div class="card-body">
                            <div class="card-title text-center"><?php echo $submitrequest; ?></div>
                            <a href="request.php" class="btn text-white border">view</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Assigned Work</div>
                        <div class="card-body">
                            <div class="card-title text-center"><?php echo $assignwork; ?></div>
                            <a href="work.php" class="btn text-white border">view</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">No. of Technician </div>
                        <div class="card-body">
                            <div class="card-title text-center"><?php echo $technician; ?></div>
                            <a href="technician.php" class="btn text-white border">view</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3 mt-5 text-center">
                <p class="bg-dark text-white">List of Requesters</p>
            </div> 
            <?php
                $sql = "SELECT * FROM submitrequest";
                $result=$conn->query($sql);
                if ($result->num_rows > 0){
                    echo 
                    '<table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">Requester</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>';
                            while($row = $result->fetch_assoc()){
                                 echo '<tr>';
                                 echo    '<td>' .$row["submitrequestid"]. '</td>';
                                 echo    '<td>' .$row["submitrequestname"]. '</td>';
                                 echo    '<td>' .$row["submitrequestemail"]. '</td>';
                                echo '</tr>';
                            }  
                        echo '</tbody>     
                    </table>';
                } else {
                    echo '0 Results';
                }
            ?>              
        </div>          <!--End 2nd column dashboard -->
<?php
include('admininclude/footer.php'); 
?>

