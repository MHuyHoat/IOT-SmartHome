<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] = 'get') {
     try {
          $userModel = new User();
          $listUser = $userModel->getAll(['parent_id =' => $_SESSION['USER_ID']]);
   
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else {
}
include('views/managerChildAccount.view.php');
ob_end_flush();
