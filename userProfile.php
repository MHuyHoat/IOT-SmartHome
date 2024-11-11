<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     try {
          $conn = new DBConn();
          $userModel = new User();
          $userName = $_SESSION['USER_NAME'];

          $user = $userModel->find([
               'u.id =' => $_SESSION['USER_ID'],
          ]);
          $soTK = count($conn->executeQuery("SELECT *
FROM users
WHERE users.role_id = 3
  AND users.nha_id = (SELECT users.nha_id FROM users WHERE users.id = '" . $user['id'] . "')")->fetchAll());
          $thietBiModel = new ThietBi();
          $dataThietBi = $thietBiModel->getAll(['tb.nha_id = ' => $user['nha_id'], "p.user_id =" => $_SESSION['USER_ID'], "ltb.ten!=" => 'Chip Connect']);
          $dataNha = $conn->executeQuery(query:"SELECT ten
FROM nha
WHERE nha.id = (SELECT users.nha_id FROM users WHERE users.id = '".$user['id']."')")->fetch();
          $quyenUser = $conn->executeQuery(query:"SELECT *
FROM permissions
WHERE permissions.permission_type ='control'
AND permissions.user_id = '" . $user['id'] . "'")->fetchAll();
          $soluong = $conn->executeQuery(query:"SELECT loai_thietbi.id, loai_thietbi.ten, COUNT(*) AS device_count
FROM loai_thietbi
INNER JOIN thietbi ON loai_thietbi.id = thietbi.loai_id
INNER JOIN permissions ON thietbi.id = permissions.thietbi_id
WHERE permissions.permission_type = 'control'
AND permissions.user_id = '".$user['id']."'
GROUP BY loai_thietbi.id, loai_thietbi.ten
ORDER BY loai_thietbi.id")->fetchAll();
          if (!empty($user)) {
               include('views/userProfile.view.php');

          } else {
               $_SESSION['error'] = "Thông tin sai!";

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

