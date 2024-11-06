<?php
ob_start();
session_start();
require_once(__DIR__.'/models/ThietBi.php');
if (!isset($_SESSION['USER_ID']) && !isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE']!='superadmin') {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' &&  $_REQUEST['action'] == 'dashboard-admin') {
     try {
            
            $conn= new DBConn();
            $soTaiKhoan= count($conn->executeQuery('SELECT * FROM users ')->fetchAll());
            $soNha= count($conn->executeQuery('SELECT * FROM nha ')->fetchAll());
            $soThietBi= count($conn->executeQuery('SELECT * FROM thietbi')->fetchAll());
            $userModel = new User();
            
            include('views/dashboard/dashboardAdmin.view.php');
         
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else {
}

ob_end_flush();

