<?php include_once 'phpprocess/dbconfig.php';?>
<?php 
    if(isset($_POST['posted'])){
       
        
        try{
     
    
     
    // write query
    $query = "INSERT INTO products SET prodcode=:prodcode, prodcat=:prodcat, prodname=:prodname,proddesc=:proddesc,prodstat=:prodstat";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    $stmt->bindParam(":prodcode", $_POST['prodcode']);
    $stmt->bindParam(":prodcat", $_POST['prodcat']);
    $stmt->bindParam(":prodname", $_POST['prodname']);
    $stmt->bindParam(":proddesc", $_POST['proddesc']);
    $stmt->bindParam(":prodstat", $_POST['prodstatus']);
    
 
    // execute the query
    if($stmt->execute()){
        
        
        $success= "New Product Record created."; 
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
                    <h4>PRODUCT DETAILS</h4>
                    <form method="post" action="addproduct.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Code:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="prodcode" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Category:*</div>
                            <div class="col-sm-6">
                                <select class="ftxt" style="color:black" name="prodcat" required>
                                <option value="9">[16/32 Channel ] 16/32 Channel </option>
                                <option value="7">[4 Channel] 4 Channel</option>
                                <option value="8">[8 Channel] 8 Channel</option>
                                <option value="4">[Box Cameras with Housing] Box Cameras with Housing</option>
                                <option value="1">[General] General</option>
                                <option value="2">[HD Cameras] HD Cameras</option>
                                <option value="3">[IP Cameras] IP Cameras</option>
                                <option value="10">[Monitors] Monitors</option>
                                <option value="6">[PTZ Cameras] PTZ Cameras</option>
                                <option value="5">[Still Cameras] Still Cameras</option>    
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Name:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="prodname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Description:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="proddesc">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">Is Available :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" name="prodstatus" value="Yes">
                            </div>
                        </div>
                        
                        
                    
                    
            </div>
                    <input type="hidden" name="posted" value="true">
                <input type="submit" class="btn"  value="SAVE" style="margin:10px auto;background-color:#008234;color:white">
                    </form>
            </div>
            <div class="col-sm-6">
                
                <p><?php if(isset($_POST['posted'])){echo $success;}?></p>
                <p><?php if(isset($_POST['posted'])){echo $failure;}?></p>
                <p><?php if(isset($_POST['posted'])){echo $dbfailure;}?></p>
                
            </div>
            
        </div>
    </div>


<div class="container">
<?php include_once('footer.php')?>
</div>
    
