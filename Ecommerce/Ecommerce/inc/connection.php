<?php

DEFINE("host", "localhost");
DEFINE("user", "mhalton");
DEFINE("pass", "Password12");
DEFINE("db", "mhalton_eCommerce");

$conn = new mysqli(host, user, pass, db);

session_start();

?>
