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
          $servecode =validation($_POST['servcode']);
          $servetext =validation($_POST['servtext']);
          $servdesc =validation($_POST['servdesc']);
          $servcat =validation($_POST['servcat']);
          $servqoute =validation($_POST['serveqoute']);
          $servstat =validation($_POST['servstat']);
    // write query
    $query = "INSERT INTO services SET  servicescode=:servicescode,servicetext=:servicetext, servicesdesc=:servicesdesc,servicescat=:servicescat,servicesqoutdesc=:servicesqoutdesc,servicesstat=:servicesstat";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    
    $stmt->bindParam(":servicescode", $servecode);
    $stmt->bindParam(":servicetext", $servetext);
    $stmt->bindParam(":servicesdesc", $servdesc);
    $stmt->bindParam(":servicescat", $servcat);
    $stmt->bindParam(":servicesqoutdesc", $servqoute);
    $stmt->bindParam(":servicesstat", $servstat);
    
    
 
    // execute the query
    if($stmt->execute()){
        
        
        $success= "New Service Record created."; 
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
            <h3><b>Add Service</b></h3>  
        </div>  
      </div> 
     </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
<!--                <p>Please Complete the form Below</p>-->
                <p style="color:red">* marked fields are mendatory</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="advforms">
                    <h4>SERVICE DETAILS</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Code:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="servcode">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Title:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="servtext">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Description:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" required name="servdesc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Category:*</div>
                            <div class="col-sm-6">
                                <select class="ftxt" style="color:black" required name="servcat">
                                <option value="2">ANNUAL FIRE INSPECTION</option>
	                            <option value="1">MONTHLY FIRE INSPECTION</option>
   
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Quote Description:*</div>
                            <div class="col-sm-6">
                            <textarea style="width:100%;height:80px;color:black" name="serveqoute" required></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">Is Active :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" name="servstat" value="yes">
                            </div>
                        </div>
                        
                        
                    
                    
            </div>
                    <input type="hidden" name="posted" value="true">
                <input type="submit" class="btn"  value="SAVE" style="margin:10px auto;background-color:#008234;color:white">
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
