
<?php
try {
  require_once(__DIR__ . '/../helpers/Helpers.php');
  require_once(__DIR__ . '/../models/ThietBi.php');
  require_once(__DIR__ . '/../config/DBConn.php');
  header('Content-Type: application/json');

  $helper = new Helpers();
  $decodeJWT = $helper->decodeJWT($_REQUEST['jwt']);
  //echo "found";  
  // lấy toàn bộ các thiết bị trong nhà 
  $thietBiModel = new ThietBi();
  $chipConnect= $thietBiModel->find(['tb.id ='=>$decodeJWT['id']]);
  $conn= new DBConn();
  $data = $conn->executeQuery("SELECT * FROM thietbi WHERE nha_id=".$chipConnect['nha_id']."")->fetchAll();

  $jsonString = json_encode($data);
  echo $jsonString;
} catch (\Throwable $th) {
  //throw $th;
  echo $th->getMessage();
}
?>