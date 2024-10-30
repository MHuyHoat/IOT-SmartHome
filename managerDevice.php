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
          try {
               $userModel = new User();
               $userName =  $_SESSION['USER_NAME'];

               $user = $userModel->find([
                    'username =' => $userName,
               ]);
               if (!empty($user)) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->getAll(['p.user_id =' =>$_SESSION['USER_ID']]);

                   
               } else {
                    $_SESSION['error'] = "Thông tin sai!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/managerDevice.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else {
}
