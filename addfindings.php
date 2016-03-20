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
          $ftxt =validation($_POST['findtext']);
          $fdesc =validation($_POST['finddesc']);
          $fcat =validation($_POST['findcat']);
    // write query
    $query = "INSERT INTO findings SET  findtext=:findtext, finddesc=:finddesc,findcat=:findcat";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    
    $stmt->bindParam(":findtext", $ftxt);
    $stmt->bindParam(":finddesc", $fdesc);
    $stmt->bindParam(":findcat", $fcat);
    
    
 
    // execute the query
    if($stmt->execute()){
        
        
        $success= "New Findings Record created."; 
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
            <h3><b>Add Findings</b></h3>  
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
                    <h4>FINDING DETAILS</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Text:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="findtext" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Description:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="finddesc" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Category:*</div>
                            <div class="col-sm-6">
                                <select class="ftxt" style="color:black" name="findcat" required>
                                <option selected="selected" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
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
