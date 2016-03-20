

<?php require_once('headerlogin.php');?>
<div class="container" style="margin-top:60px">
    <div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
			<strong>Hi <?php echo $row['user_name']; ?></strong>  Welcome to the Administration Panel
    </div>
</div>
<div class="container ">
    <div class="row">
      <div class="col-sm-12">
        <div class="memarea">
            <h3><b>Advance Control</b> Admin Dashboard </h3>  
        </div>  
      </div> 
     </div>
    
</div>
<div style="position:absolute;bottom:0;width:100%">
    <?php include_once('footer.php')?>
</div>
