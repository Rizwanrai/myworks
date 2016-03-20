<?php include_once 'phpprocess/dbconfig.php';?>
<?php 
    if(isset($_POST['posted'])){
        $passerr="";
        $pass1=$_POST['emppass'];
        $pass2=$_POST['emppass1'];
        if($pass1===$pass2)
        {
            $upass=$pass2;
        }
        else
        {
            $passerr="Passwords are not matching! Try Again";
        }
      
        
        try{
     
    
     
    // write query
    $query = "INSERT INTO employee SET empadvcomp=:empcomp, empname=:fname, empemail=:uemail,empphone=:empphone,empusrname=:empusrname,emppass=:emppass,empstatus=:empstatus,empauth=:empauth";
    //$stmt="";
    // prepare query for execution
    $stmt = $db_con->prepare($query);
 
    // bind the parameters
    // this is the first question mark
    $stmt->bindParam(":empcomp", $_POST['advcc']);
    $stmt->bindParam(":fname", $_POST['empname']);
    $stmt->bindParam(":uemail", $_POST['empemail']);
    $stmt->bindParam(":empphone", $_POST['empphone']);
    $stmt->bindParam(":empusrname", $_POST['empuname']);
    $stmt->bindParam(":emppass", $upass);
    $stmt->bindParam(":empstatus", $_POST['empstatus']);
    $stmt->bindParam(":empauth", $_POST['empauth']);
 
    // execute the query
    if($stmt->execute()){
        
        
        $success= "New Employee Record created."; 
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
            <h3><b>Add Employee</b></h3>  
        </div>  
      </div> 
     </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>Please Complete the form Below</p>
                <p style="color:red">* marked fields are mendatory</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="advforms">
                    <h4>EMPLOYEE DETAILS</h4>
                    <form method="post" action="addemployee.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Advance Control Company:*</div>
                            <div class="col-sm-6">
                            <select class="ftxt" style="color:black" name="advcc" required>
                                <option value="0" selected disabled>Select Company</option>    
                                <option value="AFC">AFC</option>    
                                <option value="YORK">YORK</option>    
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Name:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="empname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Email:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="empemail" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Phone:</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="empphone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">User Id:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="empuname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Password:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="emppass" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Re-Password:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="emppass1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Signature:(200px X 100px)*</div>
                            <div class="col-sm-6">
                            <input type="file" class="ftxt" name="empsign">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Is Active :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" name="empstatus" value="yes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Is Employee Login allowed (To view Workorder) :</div>
                            <div class="col-sm-6">
                            <input type="checkbox" style="margin-bottom:10px" name="empauth" value="yes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                
                            </div>
                            
                        </div>
                    
                    
            </div>
                    <input type="hidden" name="posted" value="true">
                <input type="submit" class="btn"  value="REGISTER" style="margin:10px auto;background-color:#008234;color:white">
                    </form>
            </div>
            <div class="col-sm-6">
                <p><?php if(isset($_POST['posted'])){echo $passerr;}?></p>
                <p><?php if(isset($_POST['posted'])){echo $success;}?></p>
                <p><?php if(isset($_POST['posted'])){echo $failure;}?></p>
                <p><?php if(isset($_POST['posted'])){echo $dbfailure;}?></p>
            </div>
            
        </div>
    </div>



    <div class="container">
<?php include_once('footer.php')?>
</div>
