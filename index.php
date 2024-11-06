<?php
session_start();
  if($_SESSION['USER_NAME']){
    header("location:home.php"); 
  }else{
    header("location:login.php"); 
  }


?>
