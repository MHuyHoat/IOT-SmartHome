<?php



try {
    //code...
    require_once(__DIR__ . '/../models/ThietBi.php');
    require_once(__DIR__.'/../models/Permission.php');
    require_once(__DIR__.'/../config/DBConn.php');
    require_once(__DIR__.'/../helpers/Helpers.php');
    $thietBiModel = new ThietBi();
    $permissionModel= new Permission();
    // Thiết lập tiêu đề HTTP
     $helpers = new Helpers();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $postData = file_get_contents('php://input');

        // Decode the JSON data into a PHP associative array
        $data = json_decode($postData, true);
        if ($data['action'] == "controlTrangThaiByButton") {
            $thietbi = $thietBiModel->find(['tb.id = ' => $data['id']]);
            $trangThaiThietBi = $thietbi['trangthai'];
            if ($trangThaiThietBi == 1) {
                $thietBiModel->update($data['id'], ['trangthai' => 0]);
            } else {
                $thietBiModel->update($data['id'], ['trangthai' => 1]);
            }
            $responseData = [
                'status' => 'success',
                'message' => 'Dữ liệu đã được xử lý thành công!',

            ];
            // Chuyển đổi dữ liệu thành JSON và trả về
            echo json_encode($responseData);
        } else if ($data['action'] == "controlTrangThaiBySpeech") {
            $text = mb_strtolower($data['text'], 'UTF-8');
            $dataThietBi = $thietBiModel->getAll(['tb.nha_id' => $data['nhaId'],'tb.loai_id !=' => '0']);
            $thietBiThayDoi = null;
            $listThietBi=[];
            foreach ($dataThietBi as $key => $value) {
                // Chuyển đổi tên thiết bị sang chữ thường
                // Kiểm tra xem $text có chứa $tenThietBi không
                if ($helpers->checkDeviceOnTextSpeech($text, $value)) {
                    $listThietBi[] = $value;
                }
            }
            if (count($listThietBi)==0) {
                $responseData = [
                    'status' => 'error',

                    'message' => "Lỗi không tìm thấy thiết bị muốn thay đổi ",

                ];
                // Chuyển đổi dữ liệu thành JSON và trả về
                echo json_encode($responseData);
            } else {
                if (strstr($text, 'bật')) {
                    foreach ($listThietBi as $key => $value) {
                        # code...
                        $listThietBi[$key]['trangthai']=1;
                        $thietBiModel->update($value['id'], ['trangthai' => 1]);
                    }
                   
                    $responseData = [
                        'status' => 'success',
                        'message' => "Đã thay đổi thành công trạng thái thiết bị ",
                        'data' => $listThietBi
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                } else if (strstr($text, 'tắt')) {
                    foreach ($listThietBi as $key => $value) {
                        # code...
                        $listThietBi[$key]['trangthai']=0;
                        $thietBiModel->update($value['id'], ['trangthai' => 0]);
                    }
                   
                    $responseData = [
                        'status' => 'success',
                        'message' => "Đã thay đổi thành công trạng thái thiết bị ",
                         'data' => $listThietBi
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                } else {
                    $responseData = [
                        'status' => 'error',
                        'message' => "Lỗi không rõ yêu cầu với thiết bị ",

                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                }
            }
        }
        else if($data['action'] == "deleteThietBi"){
            $thietbi = $thietBiModel->find(['tb.id = ' => $data['id']]);
            $permissionModel->delete(['thietbi_id = '=>$thietbi['id']]);
            $thietBiModel->delete(['id ='=>$thietbi['id']]);
            $responseData = [
                'status' => 'success',
                'message' => "Đã xóa thành công trạng thái thiết bị ",
            ];
            echo json_encode($responseData);
        }
        else if($data['action']='checkChipKetNoi'){
             $conn= new DBConn();
             $query= "SELECT tb.* FROM `thietbi` AS tb
              INNER JOIN `loai_thietbi`as ltb ON tb.loai_id=ltb.id 
              WHERE tb.id= ? and ltb.ten='Chip Connect'  and tb.nha_id IS NULL and tb.khuvuc_id IS NULL ";
             $params=[$data['maChip']];
             $existedChip= $conn->executeQuery($query,$params)->fetch();
             if(!empty($existedChip)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Chip kết nối đã sẵn sàng sàng sử  dụng '
                ]);
             }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Chip kết nối đã được sử dụng hoặc mã không tồn tại '
                ]);
             }
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data=$_REQUEST;
         if($data['action']=='cap-nhat-nhiet-do-do-am'){
            $decodeJWT = $helpers->decodeJWT($_REQUEST['jwt']);
            //echo "found";  
            // lấy toàn bộ các thiết bị trong nhà 
            $thietBiModel = new ThietBi();
            $listThietBi = $thietBiModel->getAll([
              'tb.parent_id =' => $decodeJWT['id'],
            ]);
            $thietBiNhietDo=null;
            $thietBiDoAm=null;
            foreach ($listThietBi as $key => $value) {
              # code...
              if(!empty($thietBiDoAm) && !empty($thietBiNhietDo)){
                break;
              }
              $valueTenLoaiThietBi= mb_strtolower($value['ten_loai_thietbi'], 'UTF-8');
             
              if(strstr($valueTenLoaiThietBi,'nhiệt độ') ){
             
                $thietBiNhietDo=$value;
              }else if(strstr($valueTenLoaiThietBi,'độ ẩm') ){
                
                $thietBiDoAm=$value;
              }
            }
            
            if(empty($thietBiDoAm) && empty($thietBiNhietDo)){
                $responseData = [
                    'status' => 'error',
                    'message' => "Lỗi chưa tạo thiết bị nhiệt độ hoặc độ ạm",
                ];
                echo json_encode($responseData);
              }else{
                
                $thietBiModel->update($thietBiDoAm['id'], ['du_lieu'=>$data['do-am']]);
                $thietBiModel->update($thietBiNhietDo['id'], ['du_lieu'=>$data['nhiet-do']]);
    
                $responseData = [
                    'status' => 'success',
                    'message' => "Đã thay đổi thành công trạng thái thiết bị ",
                ];
                echo json_encode($responseData);
                }
            
            
         }
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'Phương thức không hợp lệ.'
        ]);
    }
} catch (\Throwable $th) {
    $responseData = [
        'status' => 'error',
        'message' => $th->getMessage(),

    ];
    // Chuyển đổi dữ liệu thành JSON và trả về
    echo json_encode($responseData);
}
