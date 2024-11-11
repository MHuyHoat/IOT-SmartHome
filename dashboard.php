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
            $recentCreated = $conn->executeQuery("SELECT  ROW_NUMBER() OVER (ORDER BY nha.id) AS stt,
       nha.ten, nha.created_at,
       (SELECT COUNT(*) FROM thietbi WHERE thietbi.nha_id = nha.id) AS soluongthietbi,
       (SELECT COUNT(*) FROM users WHERE users.nha_id = nha.id) AS soluongnguoidung
FROM nha
WHERE nha.created_at >= CURDATE() - INTERVAL 30 DAY
GROUP BY nha.id")-> fetchAll();
          //   $user = $conn->executeQuery("SELECT u.*,r.ten as ten_role FROM users as u INNER JOIN role AS r ON u.role_id=r.id  WHERE  u.username='$userName' and u.password='$password' ")->fetch();

            include('views/dashboard/dashboardAdmin.view.php');
         
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else {
}

ob_end_flush();