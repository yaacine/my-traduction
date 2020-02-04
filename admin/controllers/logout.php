<?php
session_start();
$_SESSION["loggedinAdmin"] = false;
session_destroy();
header ("location: ../index.php");
?>