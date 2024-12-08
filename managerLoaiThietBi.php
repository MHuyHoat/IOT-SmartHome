<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/LoaiThietBi.php');
require_once(__DIR__ . '/models/User.php');
require_once(__DIR__ . '/models/Permission.php');
require_once(__DIR__ . '/helpers/Helpers.php');

if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'danh-sach') {
    try {
         $userModel = new User();
         $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
         $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'], 'u.id !=' => $user['id']]);

         $loaiThietBiModel = new LoaiThietBi();
         $listLoaiThietBi = $loaiThietBiModel->getAllWithSoLuongThietBi(['ltb.nha_id =' => $user['nha_id']]);
          $nhaModel = new Nha();
         $listNha = $nhaModel->find(data:['id =' => $user['nha_id']]);
         include('views/managerLoaiThietBi/list.view.php');
         ob_end_flush();
    } catch (\Throwable $th) {
         //throw $th;
         echo $th;
         die();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'them-moi') {

    try {
         try {
              if (!empty($_SESSION['USER_ID'])) {
                
                   unset($_REQUEST['action']);
                   $helpers= new Helpers();
                   $loaiThietBiModel = new LoaiThietBi();
                   $_REQUEST['default_image']=$helpers->convertFileToBase64($_FILES['default_image']);
            
                   $listLoaiThietBi = $loaiThietBiModel->create($_REQUEST);
                   $_SESSION['success'] = "Thêm dữ liệu thành công!";

                   header("location:managerLoaiThietBi.php?action=danh-sach");
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
        $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
        
        // $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'], 'u.id !=' => $user['id']]);

        $loaiThietBiModel = new LoaiThietBi();
        $listLoaiThietBi = $loaiThietBiModel->getAll(['ltb.nha_id =' => $user['nha_id']]);
        $detailLoaiThietBi = $loaiThietBiModel->find(['id ='=>$_REQUEST['id'] ]);
        $nhaModel = new Nha();
       $listNha = $nhaModel->find(data:['id =' => $detailLoaiThietBi['nha_id']]);
         include('views/managerLoaiThietBi/edit.view.php');
         ob_end_flush();
    } catch (\Throwable $th) {
         //throw $th;
         echo $th;
         die();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action'] == 'cap-nhat') {

    try {
        unset($_REQUEST['action']);
        $id = $_REQUEST['id'];
        $helpers= new Helpers();
         
        // Assuming you want to update other fields, not the ID itself
        $_REQUEST['default_image']=$helpers->convertFileToBase64($_FILES['default_image']);
            
        $loaiThietBiModel = new LoaiThietBi();
        $loaiThietBiModel->update($id, $_REQUEST); // Update other fields using ID

        $_SESSION['success'] = "Cập nhật dữ liệu thành công!";
        header("location:managerLoaiThietBi.php?action=danh-sach");
    } catch (\Throwable $th) {
        // Handle exceptions gracefully
        echo $th;
        die();
    }
}