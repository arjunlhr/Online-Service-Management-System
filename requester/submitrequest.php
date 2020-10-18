<?php
define('TITLE', 'Submit Request');
define('PAGE', 'submitrequest');
include('includefiles/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];   
} else {
    echo "<script> location.href='login.php'</script>";
}

if (isset($_REQUEST['rSubmit'])){
    if(($_REQUEST['rRequestinfo']=="") || ($_REQUEST['rDescription']=="") || 
    ($_REQUEST['rName']=="") ||  ($_REQUEST['rAddress1']=="") || ($_REQUEST['rAddress2']=="") || 
    ($_REQUEST['rCity']=="") || ($_REQUEST['rState']=="") || 
    ($_REQUEST['rZip']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rMobile']=="") ||
     ($_REQUEST['rDate']=="")) {
        $msg = "<div class='text-danger col-sm-6 ml-5 mt-2'> Fill All Fields * </div>";
    } else {
      $rRequestinfo = $_REQUEST['rRequestinfo'];
      $rDescription = $_REQUEST['rDescription'];
      $rName = $_REQUEST['rName'];
      $rAddress1 = $_REQUEST['rAddress1'];
      $rAddress2 = $_REQUEST['rAddress2'];
      $rCity = $_REQUEST['rCity'];
      $rState = $_REQUEST['rState'];
      $rZip = $_REQUEST['rZip'];
      $rEmail = $_REQUEST['rEmail'];
      $rMobile = $_REQUEST['rMobile'];
      $rDate = $_REQUEST['rDate'];

      $sql = "INSERT INTO submitrequest (submitrequestinfo, 
      submitrequestdesc, submitrequestname, submitrequestadd1,	
      submitrequestadd2, submitrequestcity,	submitrequeststate,	
      submitrequestzip, submitrequestemail,	submitrequestmobile, 
      submitrequestdate) VALUES ('$rRequestinfo', '$rDescription',
      '$rName','$rAddress1', '$rAddress2', '$rCity', '$rState', '$rZip', 
      '$rEmail', '$rMobile', '$rDate')";
      if ($conn->query($sql)){
        $genid = mysqli_insert_id($conn);
        $msg = "<div class=' alert alert-success col-sm-6 ml-5 mt-2'> Data Inserted Successfully </div>";
        $_SESSION['myid'] = $genid;
        echo "<script> location.href='submitrequestsucces.php'</script>";
        } else {
        $msg = "<div class='text-danger col-sm-6 ml-5 mt-2'> Unable to Inserted Data </div>"; 
      } 
    }
}
?>
<div class="col-sm-8 col-md-9 mt-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="inputreqinfo">Request info</label>
            <input type="text" class="form-control" id="inputreqinfo" name="rRequestinfo" placeholder="Request info">
        </div>
        <div class="form-group">
            <label for="inputdesc">Description</label>
            <input type="text" class="form-control" id="inputdesc" name="rDescription" placeholder="Write description">
        </div>
        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="text" class="form-control" id="inputname" name="rName" placeholder="Name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputaddress1">Address Line 1</label>
                <input type="text" class="form-control" id="inputaddress1" name="rAddress1" placeholder="House No./Street No">
            </div>
            <div class="form-group col-md-6">
                <label for="inputaddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputaddress2" name="rAddress2" placeholder="Area/Colony/Street">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputcity">City</label>
                <input type="text" class="form-control" id="inputcity" name="rCity" >
            </div>
            <div class="form-group col-md-4">
                <label for="inputstate">State</label>
                <input type="text" class="form-control" id="inputstate" name="rState" >
            </div>
            <div class="form-group col-md-4">
                <label for="inputzip">Zip</label>
                <input type="text" class="form-control" id="inputzip" name="rZip" onkeypress="isInputNumber(event)" >
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="inputemail" name="rEmail" placeholder="email">
            </div>
            <div class="form-group col-md-3">
                <label for="inputmobile">Mobile</label>
                <input type="text" class="form-control" id="inputmobile" name="rMobile" onkeypress="isInputNumber(event)" >
            </div>
             <div class="form-group col-md-4">
                <label for="inputdate">Date</label>
                <input type="date" class="form-control" id="inputdate" name="rDate">
            </div>
        </div>
        <button type="submit" class="btn btn-danger shadow-sm" name="rSubmit">Submit</button>
        <button type="submit" class="btn btn-info shadow-sm ml-5">Reset</button>
        
    </form>
        <?php if(isset($msg)) {echo $msg ;} ?>
</div>
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
<?php 
include('includefiles/footer.php');
?>