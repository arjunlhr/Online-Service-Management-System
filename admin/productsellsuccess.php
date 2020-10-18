<?php
define('TITLE','Success Product');
define('PAGE','assets');
include('admininclude/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
$sql = "SELECT * from customber where custid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
 echo   "<div class='ml-5 mt-5'>
    <h2 class='text-center'>Customer Bill</h2>
    <table class='table'>
    <tbody>
    <tr>
        <th>Customer Id</th>
        <td>".$row['custid']."</td>
    </tr>
    <tr>
        <th>Customer Name</th>
        <td>".$row['custname']."</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>".$row['cpquantity']."</td>
    </tr>
    <tr>
        <th>Price Each</th>
        <td>".$row['cpeach']."</td>
    </tr>
    <tr>
        <th>Total Price</th>
        <td>".$row['cptotal']."</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>".$row['cpdate']."</td>
    </tr>
    <tr>
        <td><form class='d-print-none'><input type='submit' class='btn btn-danger' value='print' onclick='window.print()'></form></td>
        <td><a href='assets.php' class='btn btn-secondary d-print-none' >Close</a></td>
    </tr>

    </tbody>
    </table>
    </div>";
}
?>



<?php
include('admininclude/footer.php');
?>