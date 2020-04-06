<?php

require_once 'database.php';

if(isset($_POST['insubmit'])){
    $username = $_SESSION['usernamer'];
	date_default_timezone_set('Asia/Kolkata');
	$I_Name=$_POST['I_Name'];
	$category=$_POST['I_category'];
	$loc=$_POST['Location'];
	$date = date('d/m/Y');
	$time = date('h:i:s a');
	$summary = $_POST['Summary'];
	// var_dump($username, $I_Name, $category, $loc, $date, $time, $summary);
	$insertsql = $dbconnect->prepare("INSERT INTO incidentReport (ReporterName, I_Name, I_Category, Location, Dated, Timer, Summary) VALUES (?,?,?,?,?,?,?)");
    $insertsql->bind_param("sssssss", $username, $I_Name, $category, $loc, $date, $time, $summary);
	$insertsql->execute();
	// var_dump($insertsql->execute());
}

if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($dbconnect,$_POST['uname']);
	$phone = mysqli_real_escape_string($dbconnect,$_POST['phone']);
        $adsql = $dbconnect->prepare("SELECT phone FROM User WHERE phone=?");
        session_start();
        $_SESSION['usernamer'] = $username;
	if($adsql->num_rows==1){
        header('Location:home.php');
	}
	else {
		$insertsql = $dbconnect->prepare("INSERT INTO User (username, phone) VALUES (?,?)");
        $insertsql->bind_param("ss", $username, $phone);
        $insertsql->execute();
        header('Location:home.php');

	}
}
?>