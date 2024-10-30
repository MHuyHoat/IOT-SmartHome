<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ThietBi.php');
require_once(__DIR__ . '/models/LoaiThietBi.php');
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/KhuVuc.php');
require_once(__DIR__ . '/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}
// trang danh sach thiet bi 
if ($_SERVER['REQUEST_METHOD'] = 'get' && $_REQUEST['action']=='danh-sach') {
     
     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    $userModel= new User();
                    $user= $userModel->find(['u.id ='=>$_SESSION['USER_ID'] ]);
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->getAll(['p.user_id =' =>$_SESSION['USER_ID'],"ltb.ten!="=>'Chip Connect']);
                    $loaiThietBiModel= new LoaiThietBi();
                    $listLoaiThietBi= $loaiThietBiModel->getAll([]);
                    $khuVucModel= new KhuVuc();
                    $listKhuVuc= $khuVucModel->getAll(['kv.nha_id ='=>$user['nha_id']]);

                    $chipConnect= $thietBiModel->find(['p.user_id =' =>$_SESSION['USER_ID'],"ltb.ten="=>'Chip Connect']);


               } else {
                    $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                    header("location:login.php");
               }
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
          include('views/managerDevice/list.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}

else if(($_SERVER['REQUEST_METHOD'] = 'post' && $_REQUEST['action']=='them-moi')) {
     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    unset($_REQUEST['action']);
                
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->create($_REQUEST);
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
}

else if(($_SERVER['REQUEST_METHOD'] = 'get' && $_REQUEST['action']=='chinh-sua')) {
     try {
          try {
               if (!empty($_SESSION['USER_ID'])) {
                    //echo "found";  
                    // lấy toàn bộ các thiết bị trong nhà 
                    $thietBiModel = new ThietBi();
                    $listThietBi = $thietBiModel->find(['p.user_id =' =>$_SESSION['USER_ID'],"tb.id"=>$_REQUEST['id']]);

                   
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
