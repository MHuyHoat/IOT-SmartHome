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
require_once(__DIR__ . '/config/DBConn.php');
if (!isset($_SESSION['USER_NAME'])) {
    header("location:login.php");
    die();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'danh-sach') {

    try {
        try {
            if (!empty($_SESSION['USER_ID'])) {
                //echo "found";  
                // lấy toàn bộ các thiết bị trong nhà 
                $conn= new DBConn();
                $thietBiModel = new ThietBi();

                $listThietBi = $conn->executeQuery("SELECT * FROM thietbi WHERE loai_id=0")->fetchAll();
                foreach($listThietBi??[] as $k =>$v){
                    $nhaId= $listThietBi[$k]['nha_id'];
                    $countThietBiControl=0;
                    if(!empty($nhaId)){
                        $countThietBiControl=count( $conn->executeQuery("SELECT * FROM thietbi WHERE nha_id=$nhaId and parent_id=".$listThietBi[$k]['id']." ")->fetchAll());

                    }
                    $listThietBi[$k]['slThietBiControl']=$countThietBiControl;
                }
            
            } else {
                $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                header("location:login.php");
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            die();
        }
        include('views/chipConnect/index.view.php');
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
                //echo "found";  
                // lấy toàn bộ các thiết bị trong nhà 
                unset($_REQUEST['action']);
               
                $nhaModel= new Nha();
                $lastInsertNhaId=$nhaModel->create(['ten'=>null]);
               
                $thietBiModel = new ThietBi();
                $thietBiModel->create([
                    'loai_id'=>0,
                    'nha_id' => $lastInsertNhaId,
                    'mieu_ta'=>'Chip Connect',
                    'ten'=>'ESP 32'
                ]);
           
                $userModel= new User();
                $userModel->create([
                  'username'=>$_REQUEST['username'],
                  'password'=>$_REQUEST['password'],
                  'hoten'=>"iot_admin",
                  'nha_id'=>$lastInsertNhaId,
                  'active'=>0
                ]);
                 
                $_SESSION['success'] = "Thêm dữ liệu thành công!";

                header("location:chipConnect.php?action=danh-sach");
            } else {
                $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                header("location:login.php");
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            die();
        }
        include('views/chipConnect/edit.view.php');
        ob_end_flush();
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
        die();
    }
} else if (($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'chinh-sua')) {

    try {
        $conn = new DBConn();

        $thietBi= $conn->executeQuery('SELECT * FROM  thietbi WHERE id='.$_REQUEST['id'].'')->fetch();
        $detail= $conn->executeQuery("SELECT * FROM users WHERE nha_id = ".$thietBi['nha_id'].'')->fetch();


        include('views/chipConnect/edit.view.php');
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
                $userModel->update($id,$_REQUEST);
                $_SESSION['success'] = "Cập nhật dữ liệu thành công!";

                header("location:chipConnect.php?action=danh-sach");
            } else {
                $_SESSION['error'] = "Bạn phải đăng nhập để sử dụng chức năng!";

                header("location:login.php");
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            die();
        }
        include('views/chipConnect/edit.view.php');
        ob_end_flush();
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
        die();
    }
}
