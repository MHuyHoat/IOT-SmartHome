<?php

require_once(__DIR__ . '/../config/DBConn.php');
require_once(__DIR__ . '/../helpers/Helpers.php');
class KhuVuc
{
    public $conn;
    public $table = "khuvuc";
    public $helper;
    public $alias = 'kv';
    public function __construct()
    {

        $this->conn = (new DBConn())->Connect();
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
            $stmt = $this->conn->prepare($query);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            //Gán giá trị và thực thi
            $stmt->execute();

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return $stmt->fetchAll();
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

            $stmt = $this->conn->prepare($query);

            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            //Gán giá trị và thực thi
            $stmt->execute();

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
            $query = $this->helper->strInsert($query,$data);
         
            $stmt = $this->conn->prepare($query);
            //Gán giá trị và thực thi
            
            $stmt->execute();

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
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
            $stmt = $this->conn->prepare($query);
            //Gán giá trị và thực thi
            $stmt->execute();

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
    public function delete($id)
    {
        try {
            //code...            
            $query =  " DELETE FROM $this->table ";

            $query .= " WHERE id = $id ";
            $stmt = $this->conn->prepare($query);
            //Gán giá trị và thực thi
            $stmt->execute();

            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
}
