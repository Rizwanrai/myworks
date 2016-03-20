<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'phpprocess/dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<title>Advance Control</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/glyphicons-halflings-regular.ttf">
<link rel="stylesheet" type="text/css" href="assets/css/smoothjquery.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/editor.dataTables.min.css">
<!--
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.foundation.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.foundation.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.1.2/css/select.foundation.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/track4/Editor-PHP-1.5.5/css/editor.foundation.min.css">
-->

</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a href="dashboard.php" class="navbar-brand" style="font-family:Lucida Handwriting;font-size:20px">Advance Control</a> 
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
<!--
        <li>
          <a href="#">HOME</a>
        </li>
-->
				<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">EMPLOYEE <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="addemployee.php">Add Employee</a></li>
	          <li><a href="updateemployee.php">Update Employee</a></li>
	        </ul>
	      </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCTS <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="addproduct.php">Add Products</a></li>
            <li><a href="updateproduct.php">Update Products</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">MASTER <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="addfindings.php">Add Findings</a></li>
            <li><a href="updatefindings.php">Update Findings</a></li>
            <li><a href="addManufacturer.php">Add Manufacturer</a></li>
            <li><a href="updatemenufacturer.php">Update Manufacturer</a></li>
            <li><a href="addService.php">Add Other Services</a></li>
            <li><a href="updateservices.php">Update Other Services</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">CLIENT <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="addClient.php">Add Client</a></li>
            <li><a href="updateclients.php">Update Client</a></li>
            <li><a href="#">Incomplete Location Data</a></li>
            <li><a href="#">Bulk Upload Client Location</a></li>
          </ul>
        </li>
        <li>
          <a href="#">WORK ORDERS</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">QUOTES <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Old Quotes</a></li>
            <li><a href="#">New Quotes</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">RESOURCES <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="addForm.php">Add Form</a></li>
            <li><a href="updateform.php">Update Form</a></li>
            <li><a href="addpromotion.php">Add Promotion</a></li>
            <li><a href="updatepromo.php">Edit Promotion</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">PROFILE <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
            
          </ul>
        </li>
<!--
        <li>
          <a href="#">Change Password</a>
        </li>
        <li class="">
          <a href="logout.php">LOGOUT</a>
        </li>
-->
      </ul>
    </nav>
  </div>
</header>
