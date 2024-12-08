
<?php
try {
  require_once(__DIR__ . '/../helpers/Helpers.php');
  require_once(__DIR__ . '/../models/ThietBi.php');
  header('Content-Type: application/json');

  $helper = new Helpers();
  $decodeJWT = $helper->decodeJWT($_REQUEST['jwt']);
  //echo "found";  
  // lấy toàn bộ các thiết bị trong nhà 
  $thietBiModel = new ThietBi();
  $data = $thietBiModel->getAll([
    'tb.parent_id =' => $decodeJWT['id'],
  ]);
  foreach ($data as $key => $value) {
    # code...
    $result=[
      'chanpin_id'=>$value['chanpin_id'],
      'trangthai'=>$value['trangthai']
    ];
    $data[$key]=$result;
  }
  $jsonString = json_encode($data);
  echo $jsonString;
} catch (\Throwable $th) {
  //throw $th;
  echo $th->getMessage();
}
?>