<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "admin_panel"; // Database name

$conn = mysqli_connect($host,$username,$password,$db_name) or die("cannot connect");
