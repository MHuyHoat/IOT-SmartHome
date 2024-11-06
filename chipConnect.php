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

                $listThietBi = $thietBiModel->getAllByCategory(["ltb.ten =" => 'Chip Connect']);
                foreach($listThietBi??[] as $k =>$v){
                    $nhaId= $listThietBi[$k]['nha_id'];
                    $countThietBiControl=0;
                    if(!empty($nhaId)){
                        $countThietBiControl=count( $conn->executeQuery("SELECT * FROM thietbi WHERE nha_id=$nhaId and id!=".$listThietBi[$k]['id']." ")->fetchAll());

                    }
                    $listThietBi[$k]['slThietBiControl']=$countThietBiControl;
                }
                $loaiThietBiModel = new LoaiThietBi();
                $listLoaiThietBi = $loaiThietBiModel->getAll(['ten =' => 'Chip Connect']);
                $khuVucModel = new KhuVuc();
                $listKhuVuc = $khuVucModel->getAll([]);
                $chanPinModel = new ChanPin();
                $nhaModel = new Nha();
                $listNha = $nhaModel->getAll();
                $listChanPin = $chanPinModel->getAll();
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

                $thietBiModel = new ThietBi();
                $thietBiModel->create($_REQUEST);

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

        $detail = $conn->executeQuery("SELECT tb.*   ,  ltb.ten as ten_loai_thietbi , ltb.id as id_loai_thietbi,
             ltb.default_image as image  FROM  thietbi as tb
            INNER JOIN loai_thietbi AS ltb ON tb.loai_id=ltb.id 
           WHERE tb.id = " . $_REQUEST['id'] . "")->fetch();

        $loaiThietBiModel = new LoaiThietBi();
        $listLoaiThietBi = $loaiThietBiModel->getAll(['ten =' => 'Chip Connect']);
        $khuVucModel = new KhuVuc();
        $listKhuVuc = $khuVucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
        $chanPinModel = new ChanPin();
        $listChanPin = $chanPinModel->getAll();

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
                $thietBiModel = new ThietBi();
                $thietBiModel->update($id, $_REQUEST);
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
