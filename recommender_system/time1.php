<?php
include("dbconnect.php");
//$p,rod=$_GET['timeSpent'];
	//$query=mysqli_query($con,"INSERT INTO time(user,prod,time) VALUES (78,78,78)");




$datetime1 = new DateTime();
$datetime2 = new DateTime('2011-01-03 17:13:00');

$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%y-%m-%a %h:%i:%d:%S');
//echo $elapsed;
echo $interval->format('%y-%m-%a %h:%i:%S');



session_start();
$prod=100201;
//$from=$_SESSION['start'];
$star=new DateTime('2011-01-03 17:13:00');
$end= new DateTime();
$la=date('Y-m-d H:i:s');
$interval = $star->diff($end);
$p = $interval->format('%y-%m-%a %h:%i:%S');
$u = $end->format('%y-%m-%a %h:%i:%S');
echo '<br>'.$p;
echo '<br>'.$u;
echo "here";
$min=$interval->format('%h')*60;
$min=$min+$interval->format('%i');
$min=$min+($interval->format('%S')/100);
echo "<br>".$min."<br>";


$_SESSION['start']=new DateTime();
$o= $_SESSION['start'];
echo $o->format('%y-%m-%a %h:%i:%S');
$datew = strtotime($p);
echo date('d/M/Y H:i:s', $datew);

	$query=mysqli_query($con,"INSERT INTO time(user,prod,time,last_access) VALUES (52,$prod,$min,'$la')");
session_write_close();
/*
$to_time = strtotime("2008-12-13 10:42:00");
$from_time = strtotime("2008-12-13 10:21:00");
echo round(abs($to_time - $from_time) / 60,2). " minute";
*/
?>