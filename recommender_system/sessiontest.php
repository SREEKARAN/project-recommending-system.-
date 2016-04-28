<?php
print_r($_SESSION);
echo '<hr>';
//echo "<img class='img-rounded img-responsives' width='100%' src='images/3.jpg'>";
echo $_SESSION;
/*
$param = $_SESSION['username'];

$query=$dbh->prepare("SELECT secret FROM users WHERE username=:param");
$query->bindParam(':param', $param);
$query->execute();

$result = $query -> fetch();

print_r($result);
*/
?>