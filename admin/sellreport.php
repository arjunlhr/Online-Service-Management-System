<?php
define('TITLE','SELL REPORT');
define('PAGE','sellreport');
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

        $sql = "SELECT * FROM customber where cpdate BETWEEN '$startdate' AND '$enddate' ";
        $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<p class="bg-dark text-white p-2 mt-4 text-center">Details</p>';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
               echo '<th>Customer Id</th>';
               echo '<th>Customer Name</th>';
               echo '<th>Address</th>';
               echo '<th>Product</th>';
               echo '<th>Quantity</th>';
               echo '<th>Price Each</th>';
               echo '<th>Total</th>';
               echo '<th>Date</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
               while($row=$result->fetch_assoc()){
                   echo '<tr>';
                       echo '<td>'.$row["custid"].'</td>';
                       echo '<td>'.$row["custname"].'</td>';
                       echo '<td>'.$row["custadd"].'</td>';
                       echo '<td>'.$row["cpname"].'</td>';
                       echo '<td>'.$row["cpquantity"].'</td>';
                       echo '<td>'.$row["cpeach"].'</td>';
                       echo '<td>'.$row["cptotal"].'</td>';
                       echo '<td>'.$row["cpdate"].'</td>';                          
                   echo '</tr>';
                   echo '<tr>';
                   echo '<td>';
                   echo'     <input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
                   echo '</tr>';
                   echo '</td>';
            }
        }  else {
            echo "0 Result";
        }
     }
    ?>      

</div>

<?php
include('admininclude/footer.php');
?>