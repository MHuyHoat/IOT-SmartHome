
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
    'tb.nha_id =' => $decodeJWT['nha_id'],
     'tb.id =' => $decodeJWT['thietbi_id']
  ]);

  $jsonString = json_encode($data);
  echo $jsonString;
} catch (\Throwable $th) {
  //throw $th;
  echo $th->getMessage();
}
?>