<?php include_once('header.php');?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="account-wall">
        <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading" style="font-family: 'Nunito', sans-serif;text-align:center">Admin Login Area</h2>
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="email" class="uftxt"  placeholder="Email address" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="uftxt"  placeholder="Password" name="password" id="password" />
        </div>
       
     	
        
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button>
            <button type="reset" class="btn btn-warning" >
    		<span class="glyphicon glyphicon-remove"></span> &nbsp; Cancel
			</button> 
            
        </div>  
      
      </form>
                   
                    </div>
                <div style="margin-top:20px"></div>
                 <a href="#">&copy; 2016 Advance Conrol. All Rights Reserved.</a>
                 <a href="http://www.track4solutions.com" target="_blank" style="float:right">Design &amp; Developed By</a>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </div>

