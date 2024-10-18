<?php
session_start();
  if($_SESSION['USER_NAME']){
    header("location:dashboard.php"); 
  }else{
    header("location:login.php"); 
  }
?>