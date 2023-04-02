<?php

include("inc/connection.php");
include("inc/security.php");

// Session Commit - last PHP line in file
session_commit();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Form</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>Register as new person</h1>
  <div class ="topnav">
    <a href="view_products.php">View Products</a><br>
    <a href="view_cart.php">View Cart</a><br>
    <a href="login.php">Login</a><br>
    <a class= "active" href="register.php">Register</a><br>
  </div>

<br><br>

<div class = "register">
  <form action="register_process.php" method="post">
    <label for="username">username</label>
    <input type="text" name="username">
    <br><br>

    <label for="password">password</label>
    <input type="password" name="password">
    <br><br>

    <label for="forename">forename</label>
    <input type="text" name="forename">
    <br><br>

    <label for="surname">surname</label>
    <input type="text" name="surname">
    <br><br>

    <label for="email">email</label>
    <input type="email" name="email">
    <br><br>

    <label for="address">address</label>
    <input type="text" name="address">
    <br><br>


    <input type="submit" value="Submit">

    <a href="login.php">return to login</a><br>
    <a href="view_products.php">return to products</a><br>
</div>

  </form>
</body>

</html>
