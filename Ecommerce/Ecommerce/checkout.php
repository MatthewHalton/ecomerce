<?php

include("inc/connection.php");
include("cart.php");
include("inc/security.php");

// Check HTTP User Agent
checkLogged();
checkAgent();

?>
