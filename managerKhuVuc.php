<<<<<<< HEAD
<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/KhuVuc.php');
require_once(__DIR__ . '/models/User.php');
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
         $userModel = new User();
         $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
         $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'], 'u.id !=' => $user['id']]);

         $khuvucModel = new KhuVuc();
         $listKhuVuc = $khuvucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
          $nhaModel = new Nha();
        $listNha = $nhaModel->find(data:['id =' => $user['nha_id']]);
         include('views/managerKhuVuc/list.view.php');
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
                   $khuvucModel = new KhuVuc();
                   $listKhuVuc = $khuvucModel->create($_REQUEST);

                 
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
} else if (($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action'] == 'chinh-sua')) {

    try {
        $userModel = new User();
        $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
        // $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'], 'u.id !=' => $user['id']]);

        $khuvucModel = new KhuVuc();
        $listKhuVuc = $khuvucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
        $detailKhuVuc = $khuvucModel->find(['id ='=>$_REQUEST['id'] ]);
        $nhaModel = new Nha();
       $listNha = $nhaModel->find(data:['id =' => $detailKhuVuc['nha_id']]);
         include('views/managerKhuVuc/edit.view.php');
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
        // Assuming you want to update other fields, not the ID itself
      
        $khuvucModel = new KhuVuc();
        $khuvucModel->update($id, $_REQUEST); // Update other fields using ID

        $_SESSION['success'] = "Cập nhật dữ liệu thành công!";
        header("location:managerKhuVuc.php?action=danh-sach");
    } catch (\Throwable $th) {
        // Handle exceptions gracefully
        echo $th;
        die();
    }
=======
<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/Nha.php');
require_once(__DIR__ . '/models/KhuVuc.php');
require_once(__DIR__ . '/models/User.php');
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
         $userModel = new User();
         $user = $userModel->find(['u.id =' => $_SESSION['USER_ID']]);
         $listUser = $userModel->getAll(['u.nha_id =' => $user['nha_id'], 'u.id !=' => $user['id']]);

         $khuvucModel = new KhuVuc();
         $listKhuVuc = $khuvucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
          $nhaModel = new Nha();
        $listNha = $nhaModel->find(data:['id =' => $user['nha_id']]);
         include('views/managerKhuVuc/list.view.php');
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
                   $khuvucModel = new KhuVuc();
                   $listKhuVuc = $khuvucModel->create($_REQUEST);

                 
                   $_SESSION['success'] = "Thêm dữ liệu thành công!";

                   header("location:managerKhuVuc.php?action=danh-sach");
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

        $khuvucModel = new KhuVuc();
        $listKhuVuc = $khuvucModel->getAll(['kv.nha_id =' => $user['nha_id']]);
        $detailKhuVuc = $khuvucModel->find(['id ='=>$_REQUEST['id'] ]);
        $nhaModel = new Nha();
       $listNha = $nhaModel->find(data:['id =' => $detailKhuVuc['nha_id']]);
         include('views/managerKhuVuc/edit.view.php');
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
        // Assuming you want to update other fields, not the ID itself
      
        $khuvucModel = new KhuVuc();
        $khuvucModel->update($id, $_REQUEST); // Update other fields using ID

        $_SESSION['success'] = "Cập nhật dữ liệu thành công!";
        header("location:managerKhuVuc.php?action=danh-sach");
    } catch (\Throwable $th) {
        // Handle exceptions gracefully
        echo $th;
        die();
    }
>>>>>>> 9ecb0482888ccc95074cd80fc7494e0d67363d9d
}