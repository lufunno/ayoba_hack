<?php

require_once 'database.php';
if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($dbconnect,$_POST['uname']);
	$phone = mysqli_real_escape_string($dbconnect,$_POST['phone']);
	$adsql = $dbconnect->prepare("SELECT phone FROM User WHERE phone=?");
	if($adsql->num_rows==1){
        session_start();
        $_SESSION['usernamer'] = $username;
        header('Location:home.php');
	}
	else {
		$insertsql = $dbconnect->prepare("INSERT INTO User (username, phone) VALUES (?,?)");
        $insertsql->bind_param("ss", $username, $phone);
        $insertsql->execute();
        session_start();
        $_SESSION['usernamer'] = $username;
        header('Location:home.php');

	}
}
?>