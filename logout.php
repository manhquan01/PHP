<?php
session_start();
if (isset($_SESSION["email"])) {
	session_destroy();
	header("location: index.php");
}
elseif (isset($_COOKIE["email"]) && isset($_COOKIE["mk"])) {
  setcookie("email", $email, time()-3600);
  setcookie("mk", $pass, time()-3600);
  header("location: index.php");
}
else{
	header("location: index.php");
}
?>
