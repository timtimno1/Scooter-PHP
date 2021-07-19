<?php

define('HOST','localhost');
define('USERNAME','********');
define('PASSWORD','********');
define('DB','gogoro');

$con=mysqli_connect(HOST,USERNAME,PASSWORD,DB) or die('連結失敗,請檢查網路');
?>
