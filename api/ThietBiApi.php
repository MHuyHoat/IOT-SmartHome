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
        if ($data['trangThaiThietBi']) {
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
