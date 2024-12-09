<?php
require_once(__DIR__ . "/../vendor/php-jwt/src/JWT.php");
require_once(__DIR__ . "/../vendor/php-jwt/src/Key.php");
require_once(__DIR__ . '/../config/config.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Helpers
{
    public function __construct() {}
    public  function strQuery($query = "", $data = [])
    {
        try {
            foreach ($data as $k => $v) {

                if (strstr($k, '=') || strstr($k, '>') || strstr($k, '<')) {
                    // Thêm điều kiện vào truy vấn
                    $query .= " and $k '$v' ";
                } else {
                    $query .= 'and ' . $k . $v;
                }
            }

            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    public  function strUpdate($query = "", $data = [])
    {
        try {
            foreach ($data as $k => $v) {


                $query .= ', ' . "`" . $k . "`" . "=" . "'$v'";
            }

            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    public  function strInsert($query = "", $data = [])
    {
        try {
            $query .= "(";
            foreach ($data as $k => $v) {
                $query .= "`$k`" . ",";
            }
            $query = substr($query, 0, -1);
            $query .= ") VALUES (";
            foreach ($data as $k => $v) {
                $query .= "'$v'" . ",";
            }
            $query = substr($query, 0, -1);
            $query .= ');';

            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    public  function strDelete($query = "", $data = [])
    {
        try {
            foreach ($data as $k => $v) {

                if (strstr($k, '=') || strstr($k, '>') || strstr($k, '<')) {
                    // Thêm điều kiện vào truy vấn
                    $query .= " and $k '$v' ";
                } else {
                    $query .= 'and ' . $k . $v;
                }
            }

            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    public function generateJWT($payload)
    {
        try {


            $key = JWT_SECRET;
            $alg = 'HS256';

            $token = JWT::encode($payload, $key, $alg);
            // Trả về token dưới dạng JSON

            return $token;
        } catch (\Exception $e) {

            return false;
        }
    }
    public function decodeJWT($jwt)
    {
        try {

            $decoded = JWT::decode($jwt ?? "", new Key(JWT_SECRET, 'HS256'));
            $decodedArr = (array) $decoded;
            return $decodedArr;
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
    }
    public function defaultImageLoaiThietBi()
    {
        return 'data:image/svg+xml;base64,CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHN0eWxlPSJmaWxsOiM1NzZlZDUiIGlkPSJMYXllcl8xIiBkYXRhLW5hbWU9IkxheWVyIDEiIHZpZXdCb3g9IjAgMCAyNCAyNCI+CiAgPHBhdGggZD0ibTIzLjg2MSwxOC4xMDRsLTIuOTg3LDUuMzgxYy0uMTgzLjMyOS0uNTIzLjUxNS0uODc1LjUxNS0uMTY0LDAtLjMzMS0uMDQtLjQ4NS0uMTI2LS40ODItLjI2OS0uNjU3LS44NzctLjM4OC0xLjM1OWwyLjUwOS00LjUxN2gtNC4xNTNjLS41MTcsMC0uOTg3LS4yNjMtMS4yNTktLjcwMS0uMjcyLS40MzktLjI5Ni0uOTc5LS4wNjYtMS40NDFsMi45Ny01LjM0MmMuMjY5LS40ODEuODc5LS42NTYsMS4zNi0uMzg4LjQ4My4yNjkuNjU3Ljg3Ny4zODgsMS4zNmwtMi41MSw0LjUxMmg0LjE1NGMuNTA5LDAsLjk3Ni4yNTYsMS4yNDkuNjg2LjI3My40MjkuMzA4Ljk2LjA5MywxLjQyMVptLTYuMzc5LDEuODk0aC43NTRsLS44NTcsMS41NDRjLS4yNDIuNDM0LS4zNjMuOTAzLS4zNzYsMS4zNjgtMS41MjMuNjk5LTMuMjE3LDEuMDktNS4wMDIsMS4wOUM1LjM3MywyNCwwLDE4LjYyNywwLDEyUzUuMzczLDAsMTIsMHMxMiw1LjM3MywxMiwxMmMwLC43NjUtLjA3MiwxLjUxMi0uMjA5LDIuMjM3LS4zOTgtLjE1Ni0uODI5LS4yMzktMS4yNzItLjIzOWgtLjc1M2wuODU3LTEuNTRjLjgwMy0xLjQ0Ni4yODEtMy4yNzYtMS4xNjItNC4wNzgtLjc4Mi0uNDM3LTEuNjc2LS40ODQtMi40NjEtLjIwNnYtLjE3NGMwLS41NTItLjQ0OC0xLTEtMXMtMSwuNDQ4LTEsMXYyLjIyMmwtMi42MzQsNC43NDJjLS41NDIsMS4wODgtLjQ4MywyLjM1NC4xNTcsMy4zODguNjQsMS4wMzEsMS43NDYsMS42NDYsMi45NTksMS42NDZaTTcsOGMwLS41NTMtLjQ0OC0xLTEtMXMtMSwuNDQ3LTEsMXYyYzAsLjU1My40NDgsMSwxLDFzMS0uNDQ3LDEtMXYtMlptNCwwYzAtLjU1My0uNDQ4LTEtMS0xcy0xLC40NDctMSwxdjJjMCwuNTUzLjQ0OCwxLDEsMXMxLS40NDcsMS0xdi0yWm0zLDNjLjU1MiwwLDEtLjQ0NywxLTF2LTJjMC0uNTUzLS40NDgtMS0xLTFzLTEsLjQ0Ny0xLDF2MmMwLC41NTMuNDQ4LDEsMSwxWiIvPgogIDxwYXRoIGQ9Im0yMy44NjEsMTguMTA0bC0yLjk4Nyw1LjM4MWMtLjE4My4zMjktLjUyMy41MTUtLjg3NS41MTUtLjE2NCwwLS4zMzEtLjA0LS40ODUtLjEyNi0uNDgyLS4yNjktLjY1Ny0uODc3LS4zODgtMS4zNTlsMi41MDktNC41MTdoLTQuMTUzYy0uNTE3LDAtLjk4Ny0uMjYzLTEuMjU5LS43MDEtLjI3Mi0uNDM5LS4yOTYtLjk3OS0uMDY2LTEuNDQxbDIuOTctNS4zNDJjLjI2OS0uNDgxLjg3OS0uNjU2LDEuMzYtLjM4OC40ODMuMjY5LjY1Ny44NzcuMzg4LDEuMzZsLTIuNTEsNC41MTJoNC4xNTRjLjUwOSwwLC45NzYuMjU2LDEuMjQ5LjY4Ni4yNzMuNDI5LjMwOC45Ni4wOTMsMS40MjFabS02LjM3OSwxLjg5NGguNzU0bC0uODU3LDEuNTQ0Yy0uMjQyLjQzNC0uMzYzLjkwMy0uMzc2LDEuMzY4LTEuNTIzLjY5OS0zLjIxNywxLjA5LTUuMDAyLDEuMDlDNS4zNzMsMjQsMCwxOC42MjcsMCwxMlM1LjM3MywwLDEyLDBzMTIsNS4zNzMsMTIsMTJjMCwuNzY1LS4wNzIsMS41MTItLjIwOSwyLjIzNy0uMzk4LS4xNTYtLjgyOS0uMjM5LTEuMjcyLS4yMzloLS43NTNsLjg1Ny0xLjU0Yy44MDMtMS40NDYuMjgxLTMuMjc2LTEuMTYyLTQuMDc4LS43ODItLjQzNy0xLjY3Ni0uNDg0LTIuNDYxLS4yMDZ2LS4xNzRjMC0uNTUyLS40NDgtMS0xLTFzLTEsLjQ0OC0xLDF2Mi4yMjJsLTIuNjM0LDQuNzQyYy0uNTQyLDEuMDg4LS40ODMsMi4zNTQuMTU3LDMuMzg4LjY0LDEuMDMxLDEuNzQ2LDEuNjQ2LDIuOTU5LDEuNjQ2Wk03LDhjMC0uNTUzLS40NDgtMS0xLTFzLTEsLjQ0Ny0xLDF2MmMwLC41NTMuNDQ4LDEsMSwxczEtLjQ0NywxLTF2LTJabTQsMGMwLS41NTMtLjQ0OC0xLTEtMXMtMSwuNDQ3LTEsMXYyYzAsLjU1My40NDgsMSwxLDFzMS0uNDQ3LDEtMXYtMlptMywzYy41NTIsMCwxLS40NDcsMS0xdi0yYzAtLjU1My0uNDQ4LTEtMS0xcy0xLC40NDctMSwxdjJjMCwuNTUzLjQ0OCwxLDEsMVoiLz4KPC9zdmc+Cg==';
    }
    function convertFileToBase64($file)
    {
        // Kiểm tra xem file có được tải lên thành công không
  
        if ($file['error'] !== UPLOAD_ERR_OK || empty($file['tmp_name'])) {
           
            return $this->defaultImageLoaiThietBi();
        }

        // Lấy loại MIME của file
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file['tmp_name']);

        // Kiểm tra xem file có phải là ảnh không
        if (strpos($type, 'image/') !== 0 && $type !== 'image/svg+xml') {
            return $this->defaultImageLoaiThietBi();
        }

        // Chuyển đổi nội dung file thành mã base64
        $base64 = base64_encode(file_get_contents($file['tmp_name']));

        // Trả về chuỗi mã base64 theo định dạng data URI
        return 'data:' . $type . ';base64,' . $base64;
    }
    function checkDeviceOnTextSpeech($text, $value)
    { {
            try {
            $loaiThietBi = mb_strtolower($value['ten_loai_thietbi'], 'UTF-8'); 
            $khuvuc =  mb_strtolower( $value['ten_khu_vuc'], 'UTF-8');
            $vitri =  mb_strtolower( $value['ten_vi_tri'], 'UTF-8');

            if ((strstr($text, $loaiThietBi) || $this->CHECK_TEXT_LOAI_THIET_BI($text) ) 
            && (strstr($text, $vitri) || $this->CHECK_TEXT_LOAI_VI_TRI($text))  
            && (strstr($text, $khuvuc) || $this-> CHECK_TEXT_LOAI_KHU_VUC($text) )
            ) {

                return true;
            }else return false;
            } catch (\Throwable $th) {
                throw $th;

                return false;
            }
        }
    }
    function CHECK_TEXT_LOAI_THIET_BI($text){
        foreach (CONFIG_CHECK_TEXT_LOAI_THIET_BI as $key => $value) {
            if (strstr($text, $value)) {
                return true;
            }
        }
        return   false;
    }
    function CHECK_TEXT_LOAI_KHU_VUC($text){
        foreach (CONFIG_CHECK_TEXT_KHU_VUC as $key => $value) {
         
            if (strstr($text, $value)) {
              
                return true;
            }
        }
        return   false;
    }
    function CHECK_TEXT_LOAI_VI_TRI($text){
        foreach (CONFIG_CHECK_TEXT_VI_TRI as $key => $value) {
            if (strstr($text, $value)) {
                return true;
            }
        }
        return   false;
    }
}
