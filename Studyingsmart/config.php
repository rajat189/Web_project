<?php
$mysql_hostname = "localhost"; 
$mysql_user = "root"; 
$mysql_password = ""; 
$mysql_database = "book5"; 
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps error! occurred");
mysql_select_db($mysql_database, $con) or die("Opps error! occurred");
?>
