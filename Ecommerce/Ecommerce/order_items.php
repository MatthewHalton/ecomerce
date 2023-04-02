<?php

include("inc/connection.php");



session_();



$count = 0;
foreach ($session[cart] as $subarray){
  $count += count($subarray);
}


if($count == 0 ){
  $_SESSION["message"] = "You need to add items to checkout";
  header("location: veiw_products.php");
}


if(isset($_GET["order"]) && $_GET["order"] == true){
  $date =("Y-m-d");
  $username = "John Doe";
  $sql = "INSERT INTO tbl_orders (username, date) VALUES ('$username','$date')";
  $result = mysqli_query($conn, $sql);
}


$insertid = mysqli_insert_id($conn);

$keys = array_keys($_SESSION["cart"]);
