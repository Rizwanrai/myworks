<?php include_once 'phpprocess/dbconfig.php';?>
<?php 
function validation($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    if(isset($_POST['posted'])){
       
        
        try{
          $c1 =validation($_POST['advcc']);
          $c2 =validation($_POST['compname']);
          $c3 =validation($_POST['cemail']);
          $c4 =validation($_POST['cstat']);
          $c5 =validation($_POST['bdisc']);
          $c6 =validation($_POST['iscred']);
          $c7 =validation($_POST['caddr1']);
          $c8 =validation($_POST['caddr2']);
          $c9 =validation($_POST['ccity']);
          $c10 =validation($_POST['cprov']);
          $c11 =validation($_POST['czip']);
          $c12 =validation($_POST['contname']);
          $c13 =validation($_POST['cpnum']);
          $c14 =validation($_POST['csnum']);
          $c15 =validation($_POST['cfnum']);
          $c16 =validation($_POST['samad']);
          $c17 =validation($_POST['smail']);
          
    // write query
    $query = "INSERT INTO client SET  adc=:adc,cmpnyname=:cmpnyname, email=:email,isactive=:isactive,bulkdiscount=:bulkdiscount,iscredit=:iscredit,add1=:add1,add2=:add2,city=:city,province=:province,zipcode=:zipcode,contactname=:contactname,pphone=:pphone,sphone=:sphone,faxno=:faxno,adrslocstate=:adrslocstate,mailstate=:mailstate";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    
    $stmt->bindParam(":adc", $c1);
    $stmt->bindParam(":cmpnyname", $c2);
    $stmt->bindParam(":email", $c3);
    $stmt->bindParam(":isactive", $c4);
    $stmt->bindParam(":bulkdiscount", $c5);
    $stmt->bindParam(":iscredit", $c6);
    $stmt->bindParam(":add1", $c7);
    $stmt->bindParam(":add2", $c8);
    $stmt->bindParam(":city", $c9);
    $stmt->bindParam(":province", $c10);
    $stmt->bindParam(":zipcode", $c11);
    $stmt->bindParam(":contactname", $c12);
    $stmt->bindParam(":pphone",$c13 );
    $stmt->bindParam(":sphone", $c14);
    $stmt->bindParam(":faxno",$c15 );
    $stmt->bindParam(":adrslocstate", $c16);
    $stmt->bindParam(":mailstate", $c17);
    
    
    
    
    
 
    // execute the query
    if($stmt->execute()){
        
        
        $success= "New Client Record created."; 
    }else{
        $failure= "Unable to create New Employee Record.";
    }
}
 
// handle error
catch(PDOException $exception){
    $dbfailure= "Error: " . $exception->getMessage();
}
    }
?>
<?php require_once('headerlogin.php');?>
<div class="container" style="margin-top:60px">
<!--
    
-->
</div>
<div class="container ">
    <div class="row">
      <div class="col-sm-12">
        <div class="memarea">
            <h3><b>Add Client</b></h3>  
        </div>  
      </div> 
     </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
<!--                -->
                <h3>Register Client Now</h3>
                <p>Please Complete the form Below</p>
                <p style="color:red">* marked fields are mendatory</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="addClient.php" enctype="multipart/form-data">
                <div class="advforms">
                    <h4>COMPANY INFORMATION</h4>
                    <div class="row">
                            <div class="col-sm-6">With Advance Control Company:*</div>
                            <div class="col-sm-6">
                                <select class="ftxt" style="color:black" name="advcc" required>
                                <option value="1">AFC</option>
	                            <option value="2">York</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Company Name:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="compname">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">Email:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="cemail">
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-sm-6">Is Active :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" value="yes" name="cstat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Bulk Discount:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="bdisc">
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-sm-6">Is Credit:</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" value="yes" name="iscred">
                            </div>
                        </div>
                        
            </div>
                    <div style="margin-top:10px"></div>
                    <div class="advforms">
                    <h4>ADDRESS DETAILS</h4>
                        <div class="row">
                            <div class="col-sm-6">Address 1:</div>
                            <div class="col-sm-6">
                            <textarea style="width:100%;height:80px;color:black" name="caddr1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Address 2:</div>
                            <div class="col-sm-6">
                            <textarea style="width:100%;height:80px;color:black" name="caddr2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">City:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="ccity">
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-6">Province:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="cprov">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">ZipCode:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="czip">
                            </div>
                        </div>
                        
            </div>
                    <div style="margin-top:10px"></div>
                    <div class="advforms">
                    <h4>CONTACT DETAILS</h4>
                        <div class="row">
                            <div class="col-sm-6">Contact Name:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="contname">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">Primary Phone:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="cpnum">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Secondary Phone:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="csnum">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Fax No:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="cfnum">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Add Same Address as Location:</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" value="yes" name="samad">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">If Same Location -> Send Quote / Work Order mail to client:</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" value="yes" name="smail">
                            </div>
                        </div>
            </div><input type="hidden" name="posted" value="true">
                <input type="submit" class="btn"  value="REGISTER NOW" style="margin:10px auto;background-color:#008234;color:white">
                    </form>
            </div>
            <div class="col-sm-6">
            <p><?php if(isset($_POST['posted'])){echo $success;}?></p>
            </div>
            
        </div>
    </div>



    <div class="container">
<?php include_once('footer.php')?>
</div>
