<?php require_once('headerlogin.php');?>

<?php
	if(isset($_GET['success']))
	{
        $msg="Form Created Successfully";
	}
	else if(isset($_GET['fail']))
	{
		$msg="Problem While Creating form";
	}
	else
	{
        $msg="Try to upload zip,doc,xlxx,png,jpg files";
	}
	?>

<?php 
    if(isset($_POST['posted']))
{    
    $formname=$_POST['ftitle'];
	$file =$_FILES['mfileto']['name'];
    $file_loc = $_FILES['mfileto']['tmp_name'];
	$file_size = $_FILES['mfileto']['size'];
	$file_type = $_FILES['mfileto']['type'];
	$folder="phpprocess/uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	
	
	if(move_uploaded_file($file_loc,$folder.$file))
	{
        $query = "INSERT INTO addpromo SET promotitle=:promotitle, file=:file, type=:type,size=:size";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(":promotitle", $formname);
        $stmt->bindParam(":file", $file);
        $stmt->bindParam(":type", $file_type);
        $stmt->bindParam(":size", $new_size);
        if($stmt->execute()){
        
        
        $success= "New Promotion Record created."; 
    }else{
        $failure= "Unable to create New Promotion Record.";
    }
		
}
}
?>



<div class="container" style="margin-top:60px">
<!--
    
-->
</div>
<div class="container ">
    <div class="row">
      <div class="col-sm-12">
        <div class="memarea">
            <h3><b>Add Promotions</b></h3>  
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
                    <h4>PROMOTION INFORMATION</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Title:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt" name="ftitle" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Upload:*</div>
                            <div class="col-sm-6">
                            <input type="file" class="ftxt" name="mfileto" required>
                            </div>
                        </div>
                      
            </div>
                    <input type="hidden" name="posted" value="true">
                <input type="submit" class="btn"  value="SAVE" style="margin:10px auto;background-color:#008234;color:white">
                    </form>
            </div>
            <div class="col-sm-6">
                <?php if(isset($_GET['success'])){echo $msg;}?>
                <?php if(isset($_GET['fail'])){echo $msg;}?>
                <?php if(isset($_POST['posted'])){echo $success;}?>
            </div>
            
        </div>
    </div>



    <div class="container">
<?php include_once('footer.php')?>
</div>
