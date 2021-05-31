<?php
session_start();
unset($_SESSION["success"]);
unset($_SESSION["email"]);
header("Location:../index.php");
?>
