<?php
require_once "connect.php";

if(isset($_POST["email"]))
{
  // //check if its an ajax request, exit if not
  // if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
  //     die();
  // }

  // //trim and lowercase username
  // $username =  strtolower(trim($_POST["username"]));

  // //sanitize username
  // $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

  $email = $_POST["email"];
  //check username in db
  $results = mysqli_query($conn,"SELECT email FROM thanhvien
                  WHERE email='$email'");

  //return total count
  $check = mysqli_fetch_row($results); //total records

  //if value is more than 0, username is not available
  if($check) {
    echo 'true';
  }else{
    echo 'false';
  }
}

?>
