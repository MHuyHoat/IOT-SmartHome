<?php



try {
    //code...
    require_once(__DIR__ . '/../models/ThietBi.php');
    require_once(__DIR__.'/../models/Permission.php');
    require_once(__DIR__.'/../config/DBConn.php');
    $thietBiModel = new ThietBi();
    $permissionModel= new Permission();
    // Thiết lập tiêu đề HTTP

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
            $dataThietBi = $thietBiModel->getAll(['tb.nha_id' => $data['nhaId']]);
            $thietBiThayDoi = null;

            foreach ($dataThietBi as $key => $value) {
                // Chuyển đổi tên thiết bị sang chữ thường
                $tenThietBi = mb_strtolower(trim($value['ten']), 'UTF-8');

                // Kiểm tra xem $text có chứa $tenThietBi không
                if (strstr($text, $tenThietBi)) {
                    $thietBiThayDoi = $value;
                    break;
                }
            }
            if (empty($thietBiThayDoi)) {
                $responseData = [
                    'status' => 'error',

                    'message' => "Lỗi không tìm thấy thiết bị muốn thay đổi ",

                ];
                // Chuyển đổi dữ liệu thành JSON và trả về
                echo json_encode($responseData);
            } else {
                if (strstr($text, 'bật')) {
                    $thietBiModel->update($thietBiThayDoi['id'], ['trangthai' => 1]);
                    $responseData = [
                        'status' => 'success',
                        'message' => "Đã thay đổi thành công trạng thái thiết bị ",
                        'data' => $thietBiModel->find(['tb.id = ' =>  $thietBiThayDoi['id']])
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                } else if (strstr($text, 'tắt')) {
                    $thietBiModel->update($thietBiThayDoi['id'], ['trangthai' => 0]);
                    $responseData = [
                        'status' => 'success',
                        'message' => "Đã thay đổi thành công trạng thái thiết bị ",
                        'data' => $thietBiModel->find(['tb.id = ' =>  $thietBiThayDoi['id']])
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
    } else {
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
