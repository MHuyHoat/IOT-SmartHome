<?php
session_start();
unset($_SESSION['USER_NAME']);
header("location:login.php");
die();

?>