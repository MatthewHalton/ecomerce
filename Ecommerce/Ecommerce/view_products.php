<?php
// Includes
include("inc/connection.php");
include("cart_functions.php");
include("inc/security.php");

checkAgent();

if(isset($_SESSION["user_id"])){
  if(checkExpired()){
    header("location: logout.php");
  }
}

mysqli_set_charset($conn,"utf8");

$sql = "SELECT * FROM tbl_products";
$result = mysqli_query($conn, $sql);

// Cart Functionality and Messages
// Messages
if(isset($_SESSION["message"])){
  echo $_SESSION["message"]."<br>";
  unset($_SESSION["message"]);
}

// Create Cart and implement session timeout
if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = array();
  $_SESSION["cart_life"] = time();
}
else{
  if(time() - $_SESSION["cart_life"] > 60){
    $_SESSION["cart"] = array();
    unset($_SESSION["cart_life"]);
    $_SESSION["cart_life"] = time();
  }
}

// CART FUNCTIONS
// Add product to cart
if(isset($_GET["add"]) && $_GET["add"] == true){
  Add($conn, $_GET["id"]);
}

// Remove product from cart
if(isset($_GET["remove"]) && $_GET["remove"] == true){
  Remove($conn, $_GET["id"]);
}

// Empty cart
if(isset($_GET["empty"]) && $_GET["empty"] == true){
  EmptyCart();
}

?>

<html>

<head>
  <title>Dipping Donuts - View Products</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1> Dipping Donuts</h1>
  <div class ="topnav">
    <a class= "active" href="view_products.php">View Products</a><br>
    <a href="view_cart.php">View Cart</a><br>
    <a href="login.php">Login</a><br>
    <a href="register.php">Register</a><br>
  </div>



    <h1>Avaliable Products</h1>
    <?php
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      ?><div class="container">
        <h2><?php echo $row["name"];?></h2>
        <p><?php echo $row["description"];?></p>
        <p><b><?php echo $row["price"];?></p></b>
        <img src='<?php echo "images/".$row["image"];?>' width="250" height="250"><br>
        <a href='view_products.php?id=<?php echo $row["product_id"];?>&add=true'>Add Product</a><br>
        <a href='view_products.php?id=<?php echo $row["product_id"];?>&remove=true'>Remove Product</a><br><br>
      </div>
<?php
}}

// Committing the session, last PHP line
session_commit();
?>



</body>

</html>
