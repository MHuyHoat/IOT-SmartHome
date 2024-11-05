<?php

require_once(__DIR__ . '/../config/DBConn.php');
require_once(__DIR__ . '/../helpers/Helpers.php');
require_once(__DIR__ . '/Permission.php');
require_once(__DIR__ . '/ThietBi.php');
class User
{
    public $conn;
    public $table = "users";
    public $helper;
    public $alias = 'u';
    public $thietBiModel;
    public $permissionModel;
    public function __construct()
    {

        $this->conn = (new DBConn());
        $this->helper = new Helpers();
    }
    public function  setThietBiModel(){
        $this->thietBiModel = new ThietBi();
    }
    public function setPermissionModel(){
        $this->permissionModel = new Permission();
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

            $stmt = $this->conn->executeQuery($query);

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

            $lastId= $this->conn->executeInsert($query);
            $this->setThietBiModel();
            $listThietBi = $this->conn->executeQuery("SELECT * FROM thietbi as tb WHERE tb.nha_id=".$data['nha_id']."")->fetchAll();
            $this->setPermissionModel();
            foreach ($listThietBi as $key => $value) {
                # code...
                $this->permissionModel->create([
                    'permission_type' => 'control',
                    'user_id' => $lastId,
                    'thietbi_id' => $value['id']
                ]);
            }
         
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
            $this->conn->executeUpdate($query);
            $this->setPermissionModel();
            $this->permissionModel->delete([
               'user_id ='=>$data['id']
            ]);
            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
}
