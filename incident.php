<?php
include("database.php");
include("header.php");

if($_SESSION['usernamer'] == ""){
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Incident Reporting</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="microapp.js"></script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1>Report An Incident</h1><div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>Reporter Window</h2>
			<form action="db.php" method="POST" enctype="multipart/form-data">
				<div class="form-sub-w3">
					<input type="text" name="I_Name" placeholder="Incident Name" required="" />
				<div class="icon-w3">
					<i class="fa fa-bookmark" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
				<span id="ic" style="color:white">Incident Category</span>
				<select name="I_category">
					<option  value="Doctor">Medical Issues</option>
					<option value="Warden">Hostel Affairs</option>
					<option value="Police">heroku git:clone -a we-tried-ayobahack Issues</option>
					<option value="Lawyer">Other</option>
				
				</select>
				
				</div>
				<div class="form-sub-w3">
					<input type="text" name="Location" placeholder="Location" required="" />
				<div class="icon-w3">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
					<textarea type="text-area" name="Summary" placeholder="Summary" required=""></textarea>
				<div class="icon-w3">
					<i class="fa fa-sticky-note" aria-hidden="true"></i>
				</div>
				
				</div>
				<!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
				<div class="submit-w3l">
					<input type="submit" name="insubmit" value="Submit">					
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>