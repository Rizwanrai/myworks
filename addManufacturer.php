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
          $manutxt =validation($_POST['manfname']);
          $manudesc =validation($_POST['manfdesc']);
          $manucat =validation($_POST['manfstat']);
    // write query
    $query = "INSERT INTO manufacturer SET  manufname=:manufname, manufdesc=:manufdesc,manufstat=:manufstat";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    
    $stmt->bindParam(":manufname", $manutxt);
    $stmt->bindParam(":manufdesc", $manudesc);
    $stmt->bindParam(":manufstat", $manucat);
    
    
 
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
            <h3><b>Add Product</b></h3>  
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
                    <h4>MANUFACTURER DETAILS</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-sm-6">Name:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="manfname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Description:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="manfdesc">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">Is Active :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" name="manfstat" value="yes">
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
