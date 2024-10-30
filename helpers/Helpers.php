<?php
require_once(__DIR__."/../vendor/php-jwt/src/JWT.php");
require_once(__DIR__."/../vendor/php-jwt/src/Key.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once(__DIR__.'/../config/config.php');
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
                }else {
                    $query.='and '.$k.$v;
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
                
                if (strstr($k, '=') || strstr($k, '>') || strstr($k, '<')) {
                    // Thêm điều kiện vào truy vấn
                    $query .= " , $k '$v' ";
                }
                else {
                    $query.=', '.$k.$v;
                }
            }
     
            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    public function generateJWT($payload){
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
    public function decodeJWT($jwt){
        try {
        
            $decoded = JWT::decode($jwt??"",new Key(JWT_SECRET,'HS256'));
            $decodedArr= (array) $decoded;
            return $decodedArr;
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
    }
    
}
