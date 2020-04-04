<?php
session_start();
$cn = mysqli_connect("localhost","root","","incidentreporting");
if(mysqli_connect_error()){
    echo 'database connection error or doesnt exit "One of the two"';
    die();
}
?>
