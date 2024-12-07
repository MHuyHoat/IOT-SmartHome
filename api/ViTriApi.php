<?php



try {
    //code...
    require_once(__DIR__ . '/../models/ViTri.php');

    $viTriModel = new ViTri();
    // Thiết lập tiêu đề HTTP

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $postData = file_get_contents('php://input');
        $data = json_decode($postData, true);
        // Decode the JSON data into a PHP associative array
       
         if($data['action'] == "deleteViTri"){
            $viTriModel->delete(['id ='=>$data['id']]);
            $responseData = [
                'status' => 'success',
                'message' => "Đã xóa thành công chân pin ",
            ];
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
