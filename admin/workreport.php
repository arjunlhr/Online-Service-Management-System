<?php
define('TITLE','WORK REPORT');
define('PAGE','workreport');
include('admininclude/header.php');
include('../dbconnection.php');
?>

<!-- Start 2nd  Column -->
<div class="col-md-9 mt-5">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <span class="mt-2">To</span>
            
            <div class="form-group col-md-3">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>

    <?php
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];

        $sql = "SELECT * FROM assignwork where assigndate BETWEEN '$startdate' AND '$enddate' ";
        $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<p class="bg-dark text-white p-2 mt-4 text-center">Details</p>';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
               echo '<th>Req Id</th>';
               echo '<th>Request Info</th>';
               echo '<th>Name</th>';
               echo '<th>Address</th>';
               echo '<th>City</th>';
               echo '<th>Mobile</th>';
               echo '<th>Technician</th>';
               echo '<th>Assign Date</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
               while($row=$result->fetch_assoc()){
                   echo '<tr>';
                       echo '<td>'.$row["assignrequestid"].'</td>';
                       echo '<td>'.$row["assigninfo"].'</td>';
                       echo '<td>'.$row["assignname"].'</td>';
                       echo '<td>'.$row["assignadd1"].'</td>';
                       echo '<td>'.$row["assigncity"].'</td>';
                       echo '<td>'.$row["assignmobile"].'</td>';
                       echo '<td>'.$row["assigntechnician"].'</td>';
                       echo '<td>'.$row["assigndate"].'</td>';                          
                   echo '</tr>';
            } 
             echo '<tr>';
                echo '<td>';
                 echo '<input type="submit" class="btn mt-3 btn-danger d-print-none" value="Print" onClick="window.print()">';
                echo '</td>';
             echo '</tr>';

        } else {
            echo "0 Result";
        }
     }  
    ?>      

<?php
include('admininclude/footer.php');
?>