<?php

/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/


session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="assets/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="validation.min.js"></script>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen">
<link href='https://fonts.googleapis.com/css?family=Droid+Sans|Oswald|Montserrat|Raleway|Nunito' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="assets/js/script.js"></script>

</head>

<body>
    
    <div class="container">
        <div class="row">
            <h1>Advance Cntrol</h1>
        </div>
        
    </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Admin Login Area</h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
        </div>  
      
      </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>