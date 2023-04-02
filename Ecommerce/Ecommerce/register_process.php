<?php
include("inc/connection.php");

function clean($input) {
  $data = trim($input);
  $data = stripslashes($input);
  $data = htmlspecialchars($input);
  return $data;
}

// Take posted variables and escape dangerous characters
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$forename = mysqli_real_escape_string($conn, $_POST["forename"]);
$surname = mysqli_real_escape_string($conn, $_POST["surname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);

// Use clean function to prepare data
$username = clean($username);
$password = clean($password);
$forename = clean($forename);
$surname = clean($surname);
$email = clean($email);
$address = clean($address);

// Hash the password, ready for insert
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username already exists
$check = $conn->prepare("SELECT username FROM tbl_users WHERE username=?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();
$check->fetch();
$matches = $check->num_rows;

if($matches > 0){
  echo "Username already exists.";
  exit;
}
else{
  // Insert new user
  $stmt = $conn->prepare("INSERT INTO tbl_users (username, password, forename, surname, email, address) VALUES(?, ?, ?, ?, ?, ?)");
  $stmt -> bind_param('ssssss', $username, $hashed_password, $forename, $surname, $email, $address);
  $stmt -> execute();

  if($stmt){
    echo "Success";
    session_regenerate_id();
  }
  else{
    echo "Fail.";
  }
}
?>
