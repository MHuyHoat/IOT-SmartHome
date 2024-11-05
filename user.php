<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/User.php');
require_once(__DIR__ . '/models/Role.php');
require_once(__DIR__ . '/models/Nha.php');
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

          $nhaModel= new Nha();
          $listNha= $nhaModel->getAll();
           
       
          include('views/user/index.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'them-moi') {

     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                 
                    unset($_REQUEST['action']);
                    $userModel = new User();
                    $listUser = $userModel->create($_REQUEST);

                  
                    $_SESSION['success'] = "Thêm dữ liệu thành công!";

                    header("location:user.php?action=danh-sach");
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
} else if (($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'chinh-sua')) {

     try {
          $userModel = new User();
          $detail = $userModel->find(['u.id =' => $_REQUEST['id']]);

          $roleModel = new Role();
          $listRole = $roleModel->getAll(['r.ten !=' => 'superadmin']);
          $nhaModel= new Nha();
          $listNha= $nhaModel->getAll();
          include('views/user/edit.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'cap-nhat') {

     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    unset($_REQUEST['action']);
                    $id = $_REQUEST['id'];
                    $userModel = new User();
                    $userModel->update($id, $_REQUEST);
                    if((int)$_REQUEST['role_id']==2){
                         $permissionModel= new Permission();
                         $permissionModel->update($id,[
                              'permission_type'=>'control'
                         ]);
                    }
                    $_SESSION['success'] = "Cập nhật dữ liệu thành công!";

                    header("location:user.php?action=danh-sach");
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
