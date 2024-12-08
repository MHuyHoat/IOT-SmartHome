<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/LoaiThietBi.php');
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/KhuVuc.php');
require_once(__DIR__ . '/models/ViTri.php');
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
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    $userModel = new User();
                    $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->getAll(['tb.nha_id =' => $user['nha_id'],"p.user_id ="=>$_SESSION['USER_ID'] , "ltb.ten!=" => 'Chip Connect']);
                    $loaiThietBiModel = new LoaiThietBi();
                    $listLoaiThietBi = $loaiThietBiModel->getAll(['ltb.nha_id =' => $user['nha_id']]);

                    $khuVucModel = new KhuVuc();
                    $listKhuVuc = $khuVucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
                    $chipConnect = $thietBiModel->find(['p.user_id =' => $_SESSION['USER_ID'], "tb.loai_id =" => '0']);
                    $chanPinModel = new ChanPin();
                    $listChanPin = $chanPinModel->getAll();
                    $viTriModel= new ViTri();
                    $listViTri = $viTriModel->getAll(['vt.nha_id =' => $user['nha_id']]);
                    include('views/managerDevice/list.view.php');
               } else {
                    $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/managerDevice/index.view.php');
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
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    unset($_REQUEST['action']);
                    $thietBiModel = new ThietBi();
                     $_REQUEST['ten']=$thietBiModel->getTenThietBiByLoaiKhuVucViTri($_REQUEST['loai_id'],$_REQUEST['khuvuc_id'],$_REQUEST['vitri_id']);
                     $_REQUEST['mieu_ta']=trim($_REQUEST['mieu_ta']," ");
                     $thietBiModel->create($_REQUEST);
               
                    $_SESSION['success'] = "Thêm dữ liệu thành công!";

                    header("location:managerDevice.php?action=danh-sach");
               } else {
                    $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/managerDevice/edit.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else if (($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'chinh-sua')) {

     try {
          $userModel = new User();
          $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
          $thietBiModel = new ThietBi();
          $detail = $thietBiModel->find(['tb.id =' => $_REQUEST['id']]);
          $loaiThietBiModel = new LoaiThietBi();
          $listLoaiThietBi = $loaiThietBiModel->getAll(['ltb.nha_id =' => $user['nha_id']]);
          $khuVucModel = new KhuVuc();
          $listKhuVuc = $khuVucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
          $chipConnect = $thietBiModel->find(['p.user_id =' => $_SESSION['USER_ID'], "tb.loai_id =" => '0']);
          $chanPinModel = new ChanPin();
          $listChanPin = $chanPinModel->getAll();

          $viTriModel= new ViTri();
          $listViTri = $viTriModel->getAll(['vt.nha_id =' => $user['nha_id']]);
          include('views/managerDevice/edit.view.php');
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
                    $thietBiModel = new ThietBi();
                    $_REQUEST['ten']=$thietBiModel->getTenThietBiByLoaiKhuVucViTri($_REQUEST['loai_id'],$_REQUEST['khuvuc_id'],$_REQUEST['vitri_id']);
                    $_REQUEST['mieu_ta']=trim($_REQUEST['mieu_ta']," ");
                    $thietBiModel->update($id, $_REQUEST);
                    $_SESSION['success'] = "Cập nhật dữ liệu thành công!";

                    header("location:managerDevice.php?action=danh-sach");
               } else {
                    $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/managerDevice/edit.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}
