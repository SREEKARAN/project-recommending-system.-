<?php
include("dbconnect.php");
session_start();
$prod=$_GET['prod_id'];
$from=$_SESSION['start'];
$star=new DateTime($from);
$end= new DateTime();
$la=date('Y-m-d H:i:s');
$interval = $star->diff($from);
$min=$interval->format('%h')*60;
$min=$min+$interval->format('%i');
$min=$min+($interval->format('%S')/100);
//$min=10;
	$query=mysqli_query($con,"INSERT INTO time(user,prod,time,last_access) VALUES (52,$prod,$min,'$la')");
session_write_close();
?>