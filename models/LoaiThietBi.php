<?php

require_once(__DIR__ . '/../config/DBConn.php');
require_once(__DIR__ . '/../helpers/Helpers.php');
class LoaiThietBi
{
    public $conn;
    public $table = "loai_thietbi";
    public $helper;
    public $alias = 'ltb';
    public function __construct()
    {

        $this->conn = (new DBConn());
        $this->helper = new Helpers();
    }
    public function getAll($data = [])
    {
        try {
            //code...            
            $query = "SELECT $this->alias.*
            FROM $this->table as $this->alias
              where 1=1 ";
            // generate chuỗi string đầu vào 
            $query = $this->helper->strQuery($query, $data);
            $stmt = $this->conn->executeQuery($query);

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function getAllWithSoLuongThietBi($data = [])
    {
        try {
            //code...            
            $query = "SELECT $this->alias.*
            FROM $this->table as $this->alias
              where 1=1 ";
            // generate chuỗi string đầu vào 
            $query = $this->helper->strQuery($query, $data);
            $stmt = $this->conn->executeQuery($query);

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            $listLoaiThietBi= $stmt->fetchAll();
           
            foreach ($listLoaiThietBi as $key => $value) {
                # code...
                $listLoaiThietBi[$key]['soThietBi']=$this->conn->executeQuery("SELECT * FROM thietbi where loai_id=" . $value['id'] . "")->rowCount();
            }
            
            return $listLoaiThietBi;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function find($data = [])
    {
        try {
            //code...            
            $query = "SELECT $this->alias.*
            FROM $this->table as $this->alias
              where 1=1 ";

            // generate chuỗi string đầu vào 
            $query = $this->helper->strQuery($query, $data);

            $stmt = $this->conn->executeQuery($query);

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return $stmt->fetch();
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function create($data = [])
    {
        try {
            //code...            
            $query =  " INSERT INTO $this->table ";
            $query = $this->helper->strInsert($query, $data);

            $lastId = $this->conn->executeInsert($query);
            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return $lastId;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function update($id, $data = [])
    {
        try {
            //code...            
            $query =  " UPDATE $this->table SET id=$id  ";

            // generate chuỗi string đầu vào 
            $query = $this->helper->strUpdate($query, $data);
            $query .= " WHERE id = $id ";
            $this->conn->executeUpdate($query);

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function delete($data)
    {
        try {
            //code...            
            $query =  " DELETE FROM $this->table  WHERE 1=1 ";
            $query = $this->helper->strDelete($query, $data);
            $last = $this->conn->executeUpdate($query);

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
}
