<?php

// Function to check if the HTTP User Agent is correct
function checkAgent(){
  if(isset($_SESSION['HTTP_USER_AGENT'])){
    if($_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']){
      header("location: login.php");
    }
  }
  else {
    // The header hasn't been sent to the server yet, set it equal so we can reference it in the future
    $_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
  }
}

// Function to check if the user is logged in
function checkLogged(){
  if(empty($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: login.php");
  }
}

// Function to check timeout
function checkExpired(){
  $login_session_duration = 10;
  $current_time = time();

  if(isset($_SESSION["session_time"]) && isset($_SESSION["user_id"])){
    if((time() - $_SESSION["session_time"]) > $login_session_duration){
      return true;
    }
  }
    return false;
}

// Clean data
function clean($input) {
  $data = trim($input);
  $data = stripslashes($input);
  $data = htmlspecialchars($input);
  return $data;
}

?>
