<!DOCTYPE html>
<html>
<head>
<title>Incident Reporting</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script src="microapp.js"></script>
<script type="text/javascript"> 

</script> 
<style>
#hey {
    style="background: #fff;
    color: #000;
    outline: none;
    display: block;
    margin: 0 auto;
    border: none;
    cursor: pointer;
    padding: 5px 15px;
    font-size: 14px;
    margin-top: 10px;
	margin-bottom: 10px;
    font-weight: bold;
    text-transform: uppercase;
	font-family: Open Sans, sans-serif;
	transition: 0.3s all;
    -webkit-transition: 0.3s all;
    -moz-transition: 0.3s all;
    -o-transition: 0.3s all;
    -ms-transition: 0.3s all;"
}
#hey:hover{
    background: #df5799;
	color:#ffffff;
	transition: 0.3s all;
    -webkit-transition: 0.3s all;
    -moz-transition: 0.3s all;
    -o-transition: 0.3s all;
    -ms-transition: 0.3s all;
}
#hey1{
    padding: 3px;
    vertical-align:middle;	
}

</style>

</head>
<body onload="initialize()"> 
<?php
include("database.php");
include("header.php");
if($_SESSION['usernamer'] == "")
	header('Location:index.php');
?>

<h1>Incidents Reporting</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<?php	
		echo '<table align="center" >
  <tr align="center"> <button id="hey"><a href="incident.php">Report Incident</a></button></tr>
</table><br>';
		echo ' <table width="100%" class="form-w3-agile1"><tr align="center">
    <th id="hey1" width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">Incidents</span></td>
	<th id="hey1" width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">Date</span></td>
	<th id="hey1" width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">View</span></td>
  </tr></table><br>';
  $rs1 = mysqli_query("SELECT * FROM incidentreport WHERE ReporterName = '{$_SESSION['usernamer']}' ORDER BY id DESC");
	$X=1;	while($row1 = mysqli_fetch_array($rs1, MYSQLIi_ASSOC)){
	echo '<table width="100%" class="form-w3-agile1"> <tr align="center">
	<td width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">'.$row1['I_Name'].'</span></td> 
	<td width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">'.$row1['Dated'].'</span></td>';
	if($row1['seen']==1)
		echo'<td width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">Seen</span></td>';
	else
		echo'<td width="33%" height="40"><span style="color:white;font-family: Oswald, sans-serif;">Unseen</span></td>';
	
	echo'<td width="33%" height="40"><form name="form2" method="get" action="responder2.php">
	<button  id="hey" type="submit" name="IncidentId" value='.$row1['IncidentId'].'>
	View</button>
         </form>
	</td>			
	</tr></table><br>';}			
		exit;

		?>
	<br><br>
</div>
<!--//form-ends-here-->
</div>
<!-- copyright -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>
</html>'</table></div>';
		
		?>
		<br><br>
		
		
		
<!--//form-ends-here-->
</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
</html>