<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/LoaiThietBi.php');
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/KhuVuc.php');
require_once(__DIR__ . '/models/User.php');
require_once(__DIR__ . '/models/ChanPin.php');
require_once(__DIR__ . '/models/Permission.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}
// echo json_encode($_REQUEST);
// echo $_SERVER['REQUEST_METHOD'];
// die();
// trang danh sach thiet bi 
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'danh-sach') {

     try {
          try {
               if (!empty($_REQUEST['user_id'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    $userModel = new User();
                    $user = $userModel->find(['u.id =' => $_REQUEST['user_id']]);
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->getAll(['tb.nha_id =' => $user['nha_id'], "p.user_id =" => $user['id'], "ltb.ten!=" => 'Chip Connect']);
                    
               } else {


                    header("location:managerChildAccount.php?action=danh-sach");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/permission/list.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}
