
<?php

try {
    require_once(__DIR__ . '/../helpers/Helpers.php');
    $helper = new Helpers();
    header('Content-Type: application/json');
    $payload = [
        "nha_id" => $_REQUEST['nha_id'],
    ];
    $token = $helper->generateJWT($payload);
    $data = [
        "status" => "success",
        "token" => $token
    ];
    $jsonString = json_encode($data);
    echo $jsonString;
} catch (\Throwable $th) {
    //throw $th;

}
?>