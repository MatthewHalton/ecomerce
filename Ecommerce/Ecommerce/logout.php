<?php

session_start();
$_SESSION = array();
session_destroy();
session_regenerate_id();
header("location: login.php");

?>
