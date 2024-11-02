<?php

require_once(__DIR__.'/../config/DBConn.php');
require_once(__DIR__.'/../helpers/Helpers.php');
class ThietBi
{
    public $conn;
    public $table = "thietbi";
    public $alias='tb';
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
            $query= "SELECT  
            $this->alias.id, $this->alias.ten as ten_thiet_bi,  $this->alias.trangthai ,
             ltb.ten as ten_loai_thietbi , ltb.id as id_loai_thietbi,
             ltb.default_image as image , 
              kv.ten as ten_khu_vuc, kv.id as id_khuvuc
              
               from $this->table AS  $this->alias
            INNER JOIN loai_thietbi AS ltb ON $this->alias.loai_id=ltb.id 
            INNER JOIN khuvuc AS kv ON $this->alias.khuvuc_id = kv.id
            
             where 1=1 ";
                         // generate chuỗi string đầu vào 
            $query=$this->helper->strQuery($query,$data);
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
            $query= "SELECT  
            $this->alias.id, $this->alias.ten as ten_thiet_bi,  $this->alias.trangthai , $this->alias.thong_tin ,
             ltb.ten as ten_loai_thietbi , ltb.id as id_loai_thietbi,
             ltb.default_image as image , 
              kv.ten as ten_khu_vuc, kv.id as id_khuvuc
               from $this->table AS  $this->alias
            INNER JOIN loai_thietbi AS ltb ON $this->alias.loai_id=ltb.id 
            INNER JOIN khuvuc AS kv ON $this->alias.khuvuc_id = kv.id
            
             where 1=1 ";

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
    public function update($id,$data=[]){
        try {
            //code...            
            $query= $query= " UPDATE $this->table SET id=$id  ";

            // generate chuỗi string đầu vào 
            $query=$this->helper->strUpdate($query,$data);
            $query.= " WHERE id = $id ";
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

?>
