<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	require_once("dbConnect.php");

	$uuid=$_POST['uuid'];
	$Latitude=$_POST['Latitude'];
	$Longitude=$_POST['Longitude'];
	$speed=$_POST['speed'];
	$sql="UPDATE map SET Latitude=$Latitude,Longitude=$Longitude,speed=$speed WHERE uuid='$uuid'";
	
	if($uuid=='' || $Latitude=='' || $Longitude='' || $speed=='')
	{
		echo "input u$uuid L$Latitude L$Longitude S$speed";
	}
	else
	{
		if(mysqli_query($con,$sql))
		{
			echo "succer";
		}
		else
		{
			echo "error";
		}
	}


}
?>
