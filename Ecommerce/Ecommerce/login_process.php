<?php
include("inc/connection.php");
include("cart_functions.php");
include("inc/security.php");


if ($_SERVER["REQUEST_METHOD"] == "POST")
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);


$username = clean($username);
$password = clean($password);


$sql = "SELECT * FROM tbl_users WHERE username = '$username' LIMIT 1";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

if($rows > 0){
  $data = mysqli_fetch_assoc($result);
  if(password_verify($password, $data["password"])){

    session_regenerate_id();

    $_SESSION["id"] = $data["user_ID"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["loggedin"] = true;

    echo "Success";
  }
  else{
    echo "password does not match";
  }
}else{
  echo "Username does not match";
}
?>
