<?php
    $db_host="localhost";
    $db_user= "arjun";
    $db_password="#arjun12345";
    $db_name="osms_db";
    $db_port="3306";
// Crete connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);
// Checking connection
if ($conn->connect_error){
    die("Connection failed");
} 
//else {
 //   echo "Connect";
//}
?>