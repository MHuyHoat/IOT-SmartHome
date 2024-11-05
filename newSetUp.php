<?php
ob_start();
session_start();
require_once(__DIR__.'/models/User.php');
require_once(__DIR__.'/models/Nha.php');
require_once(__DIR__.'/models/ThietBi.php');
require_once(__DIR__.'/models/KhuVuc.php');
if (!isset($_SESSION['USER_NAME'])) {
    header("location:login.php");
    die();
}

try {
    //code...
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        try {
    
    
            include('views/newSetUp/index.view.php');
    
            ob_end_flush();
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            die();
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['action']=='them-moi' ) {
        try {
       
            $nhaModel= new Nha();
            $lastIdNha= $nhaModel->create(['ten'=>$_REQUEST['ten_nha']]);
            
            $khuVucModel= new KhuVuc();
             foreach ($_REQUEST['ten_khuvuc'] as $key => $value) {
                # code...
                $khuVucModel->create(['ten'=>$value,'nha_id'=>$lastIdNha]);
             }
            
            $thietBiModel= new ThietBi();
             $thietBiModel->update($_REQUEST['maChipKetNoi'],['nha_id'=>$lastIdNha]);
             $userModel= new User();
             $lastIdUser= $userModel->create([
                'nha_id'=>$lastIdNha,
                'hoten'=> $_REQUEST['hoten'],
                'username' => $_REQUEST['username'],
                'password'=>$_REQUEST['password'],
                'role_id'=>$_REQUEST['role_id']
             ]);

            // echo json_encode($_REQUEST);
            // die();
            $_SESSION['success'] = "Thêm dữ liệu thành công!";
            header('location:user.php?action=danh-sach');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
} catch (\Throwable $th) {
    //throw $th;
}

