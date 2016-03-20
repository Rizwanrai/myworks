<?php require_once('headerlogin.php');?>
<div class="container" style="margin-top:60px">
<!--
    
-->
</div>
<div class="container ">
    <div class="row">
      <div class="col-sm-12">
        <div class="memarea">
            <h3><b>Change Password</b></h3>  
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
                    <h4>PASSWORD INFORMATION</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">Current Password:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">New Password:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Security Key:*</div>
                            <div class="col-sm-6">
                            <input type="text" class="ftxt">
                            </div>
                        </div>
                        
                      
            </div>
                <input type="submit" class="btn"  value="SAVE" style="margin:10px auto;background-color:#008234;color:white">
                    </form>
            </div>
            <div class="col-sm-6"></div>
            
        </div>
    </div>



    <div class="container">
<?php include_once('footer.php')?>
</div>
