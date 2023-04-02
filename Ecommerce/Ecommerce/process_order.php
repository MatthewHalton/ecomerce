<?php

// Include connection
include("inc/connection.php");

// Start Session
session_start();


// Check cart has items
$count = 0;
foreach($_SESSION["cart"] as $subarray){
   $count += count($subarray);
}

// Are there items in the cart? If not, redirect
if($count == 0){
  $_SESSION["message"] = "You need to add items to your cart to checkout!";
  header("location: view_products.php");
}

// Confirm Checkout
if(isset($_GET["order"]) && $_GET["order"] == true){
  // Insert Order
  $date = date("Y-m-d");
  $username = "John Doe";
  $sql = "INSERT INTO tbl_orders (username, orderdate) VALUES ('$username', '$date')";
  $result = mysqli_query($conn, $sql);

  // Insert Order Items
  $insertid = mysqli_insert_id($conn);

  $keys = array_keys($_SESSION["cart"]);
  for($i = 0; $i < count($_SESSION["cart"]); $i++) {
      $row = array();
      foreach($_SESSION["cart"][$keys[$i]] as $key => $value) {
          array_push($row, $value);
      }
      $price = $row[3] * $row[4];
      $sql = "INSERT INTO tbl_orderitems (order_id, product_id, quantity, price) VALUES ('$insertid', '$row[0]', '$row[3]', '$price')";
      $result = mysqli_query($conn, $sql);
  }
  $_SESSION["cart"] = array();
  $_SESSION["message"] = "Order placed successfully!";
  header("location: view_products.php");
}
else{
  header("location: view_products.php");
}

?>
