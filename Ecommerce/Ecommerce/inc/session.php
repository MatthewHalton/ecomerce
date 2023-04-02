<?php
session_start();

$old = session_id();

session_regenerate_id();
$new = session_id();

echo "Old Session: $old <br />";
echo "New Session: $new <br />";

if(isset($_SESSION['HTTP_USER_AGENT'])){
  if($_SESSION['HTTP_USER_AGENT' != $_SERVER['HTTP_USER_AGENT']{

  }


} else {
  $_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT']);
}

$_SESSION['loggedin'] = true;

if(isset($_SESSION['loggedin']) && $_SESSION == true){
  header('location: checkout.php');
}



print_r($_SESSION);




 ?>
