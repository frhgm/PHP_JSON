<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "663401993";
$conn = mysqli_connect($db_host, $db_user, $db_pass) or die('Database Not Connected. Please Fix the Issue! ' . mysqli_error($conn));
$dbName = "mavid";
mysqli_select_db($conn, $dbName);
