<?php
//ini_set('display_errors','on');
function create_uuid($prefix = "")
{
    $str = md5(uniqid(mt_rand(), true));  
    $uuid  = substr($str,0,8) . '-';  
    $uuid .= substr($str,8,4) . '-';  
    $uuid .= substr($str,12,4) . '-';  
    $uuid .= substr($str,16,4) . '-';  
    $uuid .= substr($str,20,12);  
    return $prefix . $uuid;
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];

	if($name=="" || $username=="" || $password=="" || $email=="" || $tel=="")
	{
		echo '請檢查未填滿的項目';
	}
	else
	{
		require_once('dbConnect.php');
		$sql="select * from userinfo where name='$name'";

		$check=mysqli_fetch_array(mysqli_query($con,$sql));

		if(isset($check))
		{
			echo'帳號已存在';
		}
		else
		{
			$uuid=create_uuid();
			$sql0="insert into userinfo (name,password,username,email,tel,uuid) values('$name','$password','$username','$email','$tel','$uuid')";
			$sql1="insert into map(uuid) values('$uuid')";

			if(mysqli_query($con,$sql0) and mysqli_query($con,$sql1))
			{
				echo '帳號創建成功';
			}
			else
			{
				echo'請稍後在試一次';
			}
		}
		mysqli_close($con);
	}
}
else
{
	echo '連線方式錯誤';
}
?>
