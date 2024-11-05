<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/User.php');
require_once(__DIR__ . '/models/Role.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'danh-sach') {
     try {
          $userModel = new User();
          $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
          $listUser = $userModel->getAll([]);
          $roleModel = new Role();
          $listRole = $roleModel->getAll();
           
       
          include('views/user/index.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} 