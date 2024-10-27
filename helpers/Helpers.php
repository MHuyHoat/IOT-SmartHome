<?php

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
            }
     
            return $query;
        } catch (Exception $e) {
            return $data;
        }
    }
    
}
