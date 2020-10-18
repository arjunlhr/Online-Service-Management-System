<?php
define('TITLE', 'Success');
define('PAGE', 'submitrequest');
include('includefiles/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];   
} else {
    echo "<script> location.href='login.php'</script>";
}

$sql =  "SELECT * FROM submitrequest where submitrequestid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if ($result->num_rows==1){
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
        <table class='table'>
            <tbody>
                <tr>
                      <th> Request Id </th>
                       <td> ". $row['submitrequestid']." </td>
                </tr>
                <tr>
                <th> Request info </th>
                 <td> ". $row['submitrequestinfo']." </td>
          </tr>

                <tr>
                    <th> Request Name </th>
                    <td> ". $row['submitrequestname']." </td>
                </tr>
              
                <tr>
                    <th> Request Email </th>
                    <td> ". $row['submitrequestemail']." </td>
                </tr>
                <tr>
                <th> Mobile </th>
                <td> ". $row['submitrequestmobile']." </td>
            </tr>
            <tr>
                <th> Request Description </th>
                <td> ". $row['submitrequestdesc']." </td>
            </tr>
            <tr>
                <td> <form class='d-print-none d-inline'><input class='btn btn-danger'
                    type='submit' value='Print' onClick='window.print()'></form>
                    <a href='submitrequest.php' class='btn btn-secondary d-print-none'>Close</a>

                </td>
               
            </tr>
            </tr>
          </tbody>
        </table>
        </div>";
} else {
    echo "Failed";
}
?>

<?php 
include('includefiles/footer.php');
?>