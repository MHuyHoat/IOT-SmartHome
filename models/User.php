<?php

require_once(__DIR__ . '/../config/DBConn.php');
require_once(__DIR__ . '/../helpers/Helpers.php');
class User
{
    public $conn;
    public $table = "users";
    public $helper;
    public $alias = 'u';
    public function __construct()
    {

        $this->conn = (new DBConn())->Connect();
        
        $this->helper= new Helpers();
    }
    public function getAll($data = [])
    {
        try {
            //code...            
            $query = "SELECT $this->alias.*,
             r.ten as ten_role,
             n.ten as ten_nha
            FROM $this->table as $this->alias
             INNER JOIN role as r ON u.role_id= r.id
             INNER JOIN nha as n ON u.nha_id= n.id
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
            echo $query . "\n";
            echo  $th;
            die();
        }
    }
    public function find($data = [])
    {
        try {
            //code...            
            $query = "SELECT $this->alias.*,
            r.ten as ten_role,
            n.ten as ten_nha
           from $this->table as $this->alias
            INNER JOIN role as r ON u.role_id= r.id
            INNER JOIN nha as n ON u.nha_id= n.id
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
    public function delete($data)
    {
        try {
            //code...            
            $query =  " DELETE FROM $this->table  WHERE 1=1 ";
            $query = $this->helper->strDelete($query, $data);
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
