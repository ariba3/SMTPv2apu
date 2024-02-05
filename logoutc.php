<?php 

session_start();
session_destroy();
header("location: loginc.php");
die();

?>