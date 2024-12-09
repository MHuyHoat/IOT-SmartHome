<?php
session_start();
  if(!empty($_SESSION['USER_ROLE'])){
  
    if($_SESSION['USER_ROLE']=='superadmin'){
      header("location:dashboard.php?action=dashboard-admin"); 
    }else{
      if((int)$_SESSION['USER_ACTIVE']==0){
        header("location:newSetUp.php?action=danh-sach");
      }else{
        header("location:home.php"); 
      }
    }
 
  }else{
    header("location:login.php"); 
  }


?>