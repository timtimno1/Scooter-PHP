<?php
//ini_set('display_errors','1');
//error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	if($name=='' && $password=='')
	{
		echo '請檢查帳號密碼是否填寫正確';
	}
	else if($name=='')
	{
		echo '請檢查帳號是否填寫正確';
	}
	else if($password=='')
	{
		echo '請檢查密碼是否填寫正確';
	}
	else
	{
		require_once('dbConnect.php');
		
		$sql="select * from userinfo where name='$name'";
		$check=mysqli_fetch_array(mysqli_query($con,$sql));

		if(isset($check))
		{
			$sql="select uuid from userinfo where name='$name' and password='$password'";
			$check=mysqli_fetch_array(mysqli_query($con,$sql),MYSQLI_ASSOC);
			if(isset($check))
			{
				$uuid=$check['uuid'];
				echo "登入成功!$uuid";
				//$sql="updata userinfo set online=NOT online where name='$name'";
				//mysqli_query($con,$sql);
			}
			else
			{
				echo '請檢查密碼是否正確';
			}
		}
		else
		{
			echo '無此帳號,請先申請帳號,謝謝！';
		}
		mysqli_close($con);
	}
}
else
{
	echo "連線方式錯誤";
}
?>
