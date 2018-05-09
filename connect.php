<?php
$dbHost = "localhost";
$dbUser = "root";
$dbpass = "";
$dbName = "vietproshop";
$conn = mysqli_connect($dbHost, $dbUser, $dbpass, $dbName);

if (isset($conn)) {
  $setLang = mysqli_query($conn, "SET NAMES 'utf8'");
}
else{
  die("Connect failed!".mysqli_connect_error());
}
?>
