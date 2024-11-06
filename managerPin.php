<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ChanPin.php');
require_once(__DIR__ . '/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action']=='danh-sach') {
     try {
          $chanPinModel= new ChanPin();
          $listChanPin= $chanPinModel->getAll();
          include('views/managerChanPin/list.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else if(($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action']=='chinh-sua')) {
     try {
          $chanPinModel= new ChanPin();
          $listChanPin= $chanPinModel->getAll();
          $detailChanPin = $chanPinModel->find(['id ='=>$_REQUEST['id'] ]);
          include('views/managerChanPin/edit.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action']=='cap-nhat') {
     
     try {
          unset($_REQUEST['action']);
          $id = $_REQUEST['idCu'];
          unset($_REQUEST['idCu']);
          // Assuming you want to update other fields, not the ID itself
        
          $chanPinModel = new ChanPin();
          $chanPinModel->update($id, $_REQUEST); // Update other fields using ID
  
          $_SESSION['success'] = "Cập nhật dữ liệu thành công!";
          header("location:managerPin.php?action=danh-sach");
      } catch (\Throwable $th) {
          // Handle exceptions gracefully
          echo $th;
          die();
      }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action']=='them-moi') {
     
     try {
          unset($_REQUEST['action']);
                
                    $chanPinModel = new ChanPin();
                    $listChanPin = $chanPinModel->create($_REQUEST);
                    $_SESSION['success'] = "Thêm dữ liệu thành công!";
                    
                    header("location:managerPin.php?action=danh-sach");
          } catch (\Throwable $th) {
               //throw $th;
               echo $th;
               die();
          }
}