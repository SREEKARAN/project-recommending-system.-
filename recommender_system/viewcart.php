<?php
include 'dbconnect.php';
include 'product.php';
include 'head.html';
include 'isRegisterd.php';
include 'nav.html';
//print_r($_SESSION);
echo '<hr>';
	session_start();
	$query="select user_id from user where email = '".$_SESSION['username']."'";
	session_write_close ();
	$rslt=mysqli_query($con,$query);
   	if(! $rslt ) 
   		{
    	die('Could not get data: ' . mysql_error());
   		} 
   while($row=mysqli_fetch_row($rslt)) 
   		{
			$user_id=$row[0];
		} 
	$query="select product_id_cart,quantity from cart_line where user_id_cart = '$user_id'";
	$rslt=mysqli_query($con,$query);
   	if(! $rslt ) 
   		{
    	die('Could not get data: ' . mysql_error());
   		} 
   while($row=mysqli_fetch_row($rslt)) 
   		{
			$param=$row[0];
			$quantity=$row[1];
			//echo $param;
			$current=new Product($param);
			$current->printCartItem($quantity);
		}
	mysqli_close($con);
?>