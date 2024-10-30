<?php

require_once(__DIR__.'/../config/DBConn.php');
require_once(__DIR__.'/../helpers/Helpers.php');
class User
{
    public $conn;
    public $table = "users";
    public $helper;
    public function __construct()
    {
        
        $this->conn = (new DBConn())->Connect();
        $this->helper= new Helpers();
    }
    public function getAll($data=[])
    {
        try {
            //code...            
            $query= "SELECT * from $this->table where 1=1 ";
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
    public function find($data=[]){
        try {
            //code...            
            $query= "SELECT * from $this->table where 1=1 ";

            // generate chuỗi string đầu vào 
            $query=$this->helper->strQuery($query,$data);
          
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
    public function update($data=[]){
        try {
            //code...
            $query= "SELECT * from $this->table where 1=1 ";

            // generate chuỗi string đầu vào 
            $query=$this->helper->strQuery($query,$data);
            $stmt = $this->conn->prepare($query);

            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            //Gán giá trị và thực thi
            $stmt->execute();
        } catch (\Throwable $th) {
            //throw $th;
            echo  $th;
            die();
        }
    }
}

?>
