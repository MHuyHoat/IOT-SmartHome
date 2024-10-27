<?php



try {
    //code...
    require_once(__DIR__.'/../models/ThietBi.php');
    $thietBiModel = new ThietBi();
    // Thiết lập tiêu đề HTTP

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $postData = file_get_contents('php://input');
    
            // Decode the JSON data into a PHP associative array
            $data = json_decode($postData, true);
        if ($data['action']=="controlTrangThaiByButton") {
            $thietbi = $thietBiModel->find(['tb.id = ' => $data['id']]);
            $trangThaiThietBi = $thietbi['trangthai'];
            if ($trangThaiThietBi == 1) {
                $thietBiModel->update($data['id'], ['trangthai = ' => 0]);
            } else {
                $thietBiModel->update($data['id'], ['trangthai = ' => 1]);
            }
            $responseData = [
                'status' => 'success',
                'message' => 'Dữ liệu đã được xử lý thành công!',
               
            ];
            // Chuyển đổi dữ liệu thành JSON và trả về
            echo json_encode($responseData);
        }else if($data['action']=="controlTrangThaiBySpeech"){
            $text = mb_strtolower($data['text'], 'UTF-8');
            $dataThietBi = $thietBiModel->getAll(['user_id' => $data['userId']]);
            $thietBiThayDoi = null;
            
            foreach ($dataThietBi as $key => $value) {
                // Chuyển đổi tên thiết bị sang chữ thường
                $tenThietBi = mb_strtolower(trim($value['ten_thiet_bi']), 'UTF-8');
                
                // Kiểm tra xem $text có chứa $tenThietBi không
                if (strstr($text, $tenThietBi)) {
                    $thietBiThayDoi = $value;
                    break;
                }
            }
            if(empty($thietBiThayDoi)){
                $responseData = [
                    'status' => 'error',

                    'message' =>"Lỗi không tìm thấy thiết bị muốn thay đổi ",
                   
                ];
                // Chuyển đổi dữ liệu thành JSON và trả về
                echo json_encode($responseData);
                
            }else{
                if(strstr($text,'bật')){
                    $thietBiModel->update($thietBiThayDoi['id'], ['trangthai = ' => 1]);
                    $responseData = [
                        'status' => 'success',
                        'message' =>"Đã thay đổi thành công trạng thái thiết bị ",
                        'data'=> $thietBiModel->find(['tb.id = ' =>  $thietBiThayDoi['id']])
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                }else if(strstr($text,'tắt')){
                    $thietBiModel->update($thietBiThayDoi['id'], ['trangthai = ' => 0]);
                    $responseData = [
                        'status' => 'success',
                        'message' =>"Đã thay đổi thành công trạng thái thiết bị ",
                        'data'=> $thietBiModel->find(['tb.id = ' =>  $thietBiThayDoi['id']])
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                }else{
                    $responseData = [
                        'status' => 'error',
                        'message' =>"Lỗi không rõ yêu cầu với thiết bị ",
                       
                    ];
                    // Chuyển đổi dữ liệu thành JSON và trả về
                    echo json_encode($responseData);
                }

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
