<?php
if(session_id()==""){
    session_start();
}
if ($_SESSION['is_adminlogin']){
    $aEmail = $_SESSION['aEmail'];   
} else {
    echo "<script> location.href='adminlogin.php'</script>";
}
if (isset($_REQUEST['view'])){
    $sql = "SELECT * from submitrequest where submitrequestid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
if (isset($_REQUEST['close'])){
    $sql = "DELETE FROM submitrequest where submitrequestid = {$_REQUEST['id']} ";
    if ($conn->query($sql)==TRUE){ 
        echo '<meta http-equiv="refresh" content="0; URL=? closed"/>';
    } else {
        echo "Unable to Delete";
    }
}

if (isset($_REQUEST['assign'])){
    if(($_REQUEST['rRequestinfo']=="") || ($_REQUEST['rDescription']=="") || 
    ($_REQUEST['rName']=="") ||  ($_REQUEST['rAddress1']=="") || ($_REQUEST['rAddress2']=="") || 
    ($_REQUEST['rCity']=="") || ($_REQUEST['rState']=="") || 
    ($_REQUEST['rZip']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rMobile']=="") ||
     ($_REQUEST['rDate']=="") || ($_REQUEST['rTechnician']=="") || ($_REQUEST['rRequestid']=="")) {
        $msg = "<small class='text-danger col-sm-6 ml-5 mt-5'> Fill All Fields * </small>";
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
      $rTechnician = $_REQUEST['rTechnician'];
      $rDate = $_REQUEST['rDate'];
      $rRequestid = $_REQUEST['rRequestid'];      

      $sql = "INSERT INTO assignwork (assigninfo, assigndesc, assignname, assignadd1, 
      assignadd2, assigncity, assignstate, assignzip, assignemail,
      assignmobile, assigntechnician, assigndate, assignrequestid) VALUES ('$rRequestinfo', '$rDescription',
      '$rName','$rAddress1', '$rAddress2', '$rCity', '$rState', '$rZip', 
      '$rEmail', '$rMobile', '$rTechnician', '$rDate', '$rRequestid')";
      if ($conn->query($sql)==true){
           $msg = "<small class=' alert alert-success col-sm-4 '> Data Assign Successfully </small>";
        } else {
        $msg = "<small class='text-danger col-sm-6 ml-5 mt-2'> Unable to Inserted Data </small>"; 
      } 
    }
}


?>
<!-- start 3rd column -->
<div class="col-md-5 mt-4 jumbotron">
    <form action="" method="POST">
            <h4 class="text-danger text-center">Assign Work Details</h4>
            <div class="form-group">
                <label for="inputreqinfo">Request Id</label>
                <input type="text" class="form-control" id="inputreqinfo" name="rRequestid" value="<?php if (isset($row['submitrequestid'])) echo $row['submitrequestid'];?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputreqinfo">Request info</label>
                <input type="text" class="form-control" id="inputreqinfo" name="rRequestinfo" value="<?php if (isset($row['submitrequestinfo'])) echo $row['submitrequestinfo'];?>">
            </div>
            <div class="form-group">
                <label for="inputdesc">Description</label>
                <input type="text" class="form-control" id="inputdesc" name="rDescription" value="<?php if (isset($row['submitrequestdesc'])) echo $row['submitrequestdesc'];?>">
            </div>
            <div class="form-group">
                <label for="inputname">Name</label>
                <input type="text" class="form-control" id="inputname" name="rName" value="<?php if (isset($row['submitrequestname'])) echo $row['submitrequestname'];?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputaddress1">Address Line 1</label>
                    <input type="text" class="form-control" id="inputaddress1" name="rAddress1" value="<?php if (isset($row['submitrequestadd1'])) echo $row['submitrequestadd1'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputaddress2">Address Line 2</label>
                    <input type="text" class="form-control" id="inputaddress2" name="rAddress2" value="<?php if (isset($row['submitrequestadd2'])) echo $row['submitrequestadd2'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputcity">City</label>
                    <input type="text" class="form-control" id="inputcity" name="rCity" value="<?php if (isset($row['submitrequestcity'])) echo $row['submitrequestcity'];?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="inputstate">State</label>
                    <input type="text" class="form-control" id="inputstate" name="rState" value="<?php if (isset($row['submitrequeststate'])) echo $row['submitrequeststate'];?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="inputzip">Zip</label>
                    <input type="text" class="form-control" id="inputzip" name="rZip" value="<?php if (isset($row['submitrequestzip'])) echo $row['submitrequestzip'];?>" onkeypress="isInputNumber(event)">
                </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputemail">Email</label>
                    <input type="email" class="form-control" id="inputemail" name="rEmail" value="<?php if (isset($row['submitrequestemail'])) echo $row['submitrequestemail'];?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputmobile">Mobile</label>
                    <input type="text" class="form-control" id="inputmobile" name="rMobile" value="<?php if (isset($row['submitrequestmobile'])) echo $row['submitrequestmobile'];?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputetechnician">Technician</label>
                    <input type="text" class="form-control" id="inputtechnician" name="rTechnician" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputdate">Date</label>
                    <input type="date" class="form-control" id="inputdate" name="rDate" >
                </div>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-danger mr-3" name="assign">Assign</button>
                <button type="reset" class="btn btn-secondary" >Reset</button>             
            </div>    
        </form>   
        <?php if(isset($msg)) {echo $msg ;} ?>         
</div>
<!-- End 3rd Column -->
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>