<?php
class DBConn
{
    public $dsn = 'mysql:host=localhost;dbname=iotlight;charset=utf8';
    public $username = 'root';
    public $password = '';
    public function __construct()
    {
       
    }
    public function Connect(){
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
            return null;
            
        }
    }
}
