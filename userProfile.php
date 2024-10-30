<?php
ob_start();
session_start();
require_once(__DIR__.'/models/ThietBi.php');
require_once(__DIR__.'/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] = 'get') {
     try {
          $userModel = new User();
          $userName =  $_SESSION['USER_NAME'];

          $user = $userModel->find([
               'id =' => $_SESSION['USER_ID'],
          ]);
          if (!empty($user)) {
            include('views/userProfile.view.php');
          
          } else {
            $_SESSION['error']="Thông tin sai!";  

            header("location:login.php"); 
          }
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else {
}

ob_end_flush();

