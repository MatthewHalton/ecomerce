<?php

// Include connection
include("inc/connection.php");
include("cart_functions.php");


// CART FUNCTIONS
// Add product to cart
if(isset($_GET["add"]) && $_GET["add"] == true){
  Add($conn, $_GET["id"]);
}

// Remove product from cart
if(isset($_GET["remove"]) && $_GET["remove"] == true){
  Remove($conn, $_GET["id"]);
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>View Cart</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css"
</head>

<body>
  <h1>View Cart</h1>
  <div class ="topnav">
    <a href="view_products.php">View Products</a><br>
    <a class= "active"  href="view_cart.php">View Cart</a><br>
    <a href="login.php">Login</a><br>
    <a href="register.php">Register</a><br>
  </div>

<?php
// Collect Cart Logic
$count = 0;
foreach($_SESSION["cart"] as $subarray){
   $count += count($subarray);
}

if($count > 0){
  $keys = array_keys($_SESSION["cart"]);
  for($i = 0; $i < count($_SESSION["cart"]); $i++) {
      $row = array();
      foreach($_SESSION["cart"][$keys[$i]] as $key => $value) {
          array_push($row, $value);
      }
      if(!empty($row[1])){
        $price = $row[3] * $row[4];
      ?>

        <!-- Echo out the Cart -->
        <b>Name: </b><?php echo $row[1];?><br>
        <b>Quantity: </b><?php echo $row[4];?><br>
        <b>Price: </b>£<?php echo $price;?><br><br>
        <a href='view_cart.php?id=<?php echo $row[0];?>"&add=true'>Add Product</a><br>
        <a href='view_cart.php?id=<?php echo $row[0];?>&remove=true'>Remove Product</a><br><br>
<?php
        }
    }
}

if($count > 0){
  echo "<br><br><a href='process_order.php?order=true'>Checkout</a>";
  echo "<br><a href='view_products.php?empty=true'>Empty Cart</a>";
}

echo "<br><br><b><a href='view_products.php'>Return to View Products</a></b>";
?>


</body>

</html>
