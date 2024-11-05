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
         
          if (!empty($_SESSION['USER_ID'])) {
               //echo "found";  
               // lấy toàn bộ các thiết bị trong nhà 
               $userModel = new User();
               $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
               $thietBiModel = new ThietBi();
              
               
               $dataThietBi = $thietBiModel->getAll(['tb.nha_id = ' => $user['nha_id'],"p.user_id ="=>$_SESSION['USER_ID'] ,"ltb.ten!="=>'Chip Connect']);
  
               $dataThietBiKhuVuc = [];
               foreach ($dataThietBi ?? [] as $k => $v) {

                    $dataThietBiKhuVuc[$v['id_khuvuc']][] = $v;
               }
               // 
               $thietBiDoAm= $thietBiModel->find(['tb.nha_id = ' => $user['nha_id'],"p.user_id ="=>$_SESSION['USER_ID'] ,'ltb.ten = '=>'Đo độ ẩm']);
               $thietBiNhietDo= $thietBiModel->find(['tb.nha_id = ' => $user['nha_id'],"p.user_id ="=>$_SESSION['USER_ID'] ,'ltb.ten = ' => 'Đo nhiệt độ ']);
          
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
include( 'views/home.view.php');
ob_end_flush();

