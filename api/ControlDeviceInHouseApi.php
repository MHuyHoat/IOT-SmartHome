
<?php
$data=[
    ["id"=> 1,"ten"=> "Đèn phòng khách","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 1,"loai_id"=> 1],
    ["id"=> 2,"ten"=> "Đèn phòng ngủ","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 1,"loai_id"=> 1],
    ["id"=> 3,"ten"=> "Đèn nhà bếp","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 2,"loai_id"=> 1],
    ["id"=> 4,"ten"=> "Đèn sân","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 2,"loai_id"=> 1],
    ["id"=> 5,"ten"=> "Quạt","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 1,"loai_id"=> 2],
    ["id"=> 6,"ten"=> "Điều hòa","thong_tin"=> null,"trang_thai"=> 0,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 1,"loai_id"=> 1],
    ["id"=> 7,"ten"=> "Đèn nhà vệ sinh","thong_tin"=> null,"trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 2,"loai_id"=> 1],
    ["id"=> 8,"ten"=> "Đo độ ẩm","thong_tin"=> "48%","trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 1,"loai_id"=> 3],
    ["id"=> 9,"ten"=> "Đo nhiệt độ","thong_tin"=> "20 độ C","trang_thai"=> 1,"parent_id"=> null,"nha_id"=> 1,"khuvuc_id"=> 2,"loai_id"=> 4]
  ]
;
$jsonString = json_encode($data);
echo $jsonString;
?>