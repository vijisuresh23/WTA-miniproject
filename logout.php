<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["success"]);
unset($_GET['id']);
header("Location:index.php");
?>