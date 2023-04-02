<?php

include("inc/connection.php");
include("inc/security.php");

// Commit the session - make sure this is the last PHP line
session_commit();

?>

<html>

<head>
  <title>Form</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<h1>Login</h1>
<div class ="topnav">
  <a  href="view_products.php">View Products</a><br>
  <a href="view_cart.php">View Cart</a><br>
  <a class= "active" href="login.php">Login</a><br>
  <a href="register.php">Register</a><br>
</div>

<br><br>

<div class= "login">
  <form action="login_process.php" method="post">

    <label for="username">Username</label><br>
    <input type="text" name="username"><br>

    <label for="password">Password</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">

<a href="view_products.php">View products</a><br>

</div>


  </form>

</body>

</html>
