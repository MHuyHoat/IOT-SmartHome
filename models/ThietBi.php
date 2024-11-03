<?php

require_once(__DIR__ . '/../config/DBConn.php');
require_once(__DIR__ . '/../helpers/Helpers.php');
require_once(__DIR__ . '/User.php');
require_once(__DIR__ . '/Permission.php');
class ThietBi
{
    public $conn;
    public $table = "thietbi";
    public $alias = 'tb';
    public $helper;
    public $userModel;
    public $permissionsModel;
    public function __construct()
    {

        try {
            $this->conn = (new DBConn());
            $this->helper = new Helpers();
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            die();
        }
    }
    public function  setUserModel(){
        $this->userModel = new User();
    }
    public function setPermissionModel(){
        $this->permissionsModel = new Permission();
    }
    public function getAll($data = [])
    {
        try {
            //code...            
            $query = "SELECT  
            $this->alias.* ,
             ltb.ten as ten_loai_thietbi , ltb.id as id_loai_thietbi,
             ltb.default_image as image , 
              kv.ten as ten_khu_vuc, kv.id as id_khuvuc,
              p.permission_type , p.id as permission_id ,
              n.ten as ten_nha,
              cp.ten as ten_chanpin
            from $this->table AS  $this->alias
            INNER JOIN permissions AS p on $this->alias.id= p.thietbi_id
            INNER JOIN users  AS u on u.id= p.user_id
            INNER JOIN loai_thietbi AS ltb ON $this->alias.loai_id=ltb.id 
            INNER JOIN khuvuc AS kv ON $this->alias.khuvuc_id = kv.id
            INNER JOIN nha as n ON $this->alias.nha_id= n.id
            LEFT JOIN chanpin as cp ON $this->alias.chanpin_id=cp.id
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
    public function find($data = [])
    {
        try {
            //code...            
            $query = "SELECT 
            $this->alias.* ,
             ltb.ten as ten_loai_thietbi , ltb.id as id_loai_thietbi,
             ltb.default_image as image , 
              kv.ten as ten_khu_vuc, kv.id as id_khuvuc,
              p.permission_type , p.id as permission_id,
              n.ten as ten_nha,
              cp.ten as ten_chanpin
            from $this->table AS  $this->alias
            INNER JOIN permissions AS p on $this->alias.id= p.thietbi_id
            INNER JOIN users  AS u on u.id= p.user_id
            INNER JOIN loai_thietbi AS ltb ON $this->alias.loai_id=ltb.id 
            LEFT JOIN khuvuc AS kv ON $this->alias.khuvuc_id = kv.id
            LEFT JOIN nha as n ON $this->alias.nha_id= n.id
            LEFT JOIN chanpin as cp ON $this->alias.chanpin_id=cp.id
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
            // gan quyen permission cho cac tai khoan trong nha
            $this->setUserModel();
            $listUser =    $this->conn->executeQuery("SELECT * FROM users as u WHERE u.nha_id=".$data['nha_id']."")->fetchAll();
            $this->setPermissionModel();
            foreach ($listUser as $key => $value) {
                # code...
                $this->permissionsModel->create([
                    'permission_type' => 'control',
                    'user_id' => $value['id'],
                    'thietbi_id' => $lastId
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
            $lastId = $this->conn->executeUpdate($query);
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
             $this->permissionsModel->delete([
                'thietbi_id ='=>$data['id']
             ]);
            //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
            return true;
        } catch (\Throwable $th) {
            echo  $th;
            die();
        }
    }
}
