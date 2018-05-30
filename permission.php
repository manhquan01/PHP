<?php
if(isset($_SESSION["permission"]) == true && $_SESSION["permission"] != 0 || isset($_COOKIE["permission"]) == true && $_COOKIE["permission"] != 0){
  header("location: index.php");
}
?>
