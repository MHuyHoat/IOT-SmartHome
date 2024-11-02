<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/User.php');
require_once(__DIR__ . '/models/Role.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action']=='danh-sach') {
     try {
          $userModel = new User();
          $user=$userModel->find(['u.id ='=>$_SESSION['USER_ID']]);
          $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'],'u.id !='=>$user['id']]);

          $roleModel= new Role();
          $listRole = $roleModel->getAll(['r.ten !='=>'superadmin']);
          include('views/managerChildAccount/list.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} 
else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action']=='them-moi') {
     
     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    unset($_REQUEST['action']);
                
                    $userModel = new User();
                    $listThietBi = $userModel->create($_REQUEST);
                    $_SESSION['success'] = "Thêm dữ liệu thành công!";
                    
                    header("location:managerChildAccount.php?action=danh-sach");
                    ob_end_flush();
                   
               } else {
                    $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
         
      
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}
