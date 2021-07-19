<?php

if($_SERVER['REQUEST_METHOD']!='POST')
{
	$uuid='52fde8a3-bfef-349d-955b-f0d22d7f2e3c';
	echo("<META HTTP-EQUIV='Refresh' Content=0.5;URL=gpsPull.php>");
}
else
{
	$uuid=$_POST['uuid'];
}
$sql="select * from map  where uuid='$uuid'";
	
require_once('dbConnect.php');
$result=mysqli_query($con,$sql);

$res0= mysqli_fetch_row($result);
	
echo "Latitude:$res0[1]";
echo "Longitude:$res0[2]";
echo "speed:$res0[3]";
?>
