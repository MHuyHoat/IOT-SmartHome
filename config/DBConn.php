<?php
class DBConn
{
    public $dsn = 'mysql:host=localhost;dbname=iotlight;charset=utf8';
    public $username = 'admin';
    public $password = '1223';
    public function __construct()
    {
        // Constructor can be used for initialization if needed
    }

    public function Connect()
    {
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

    public function executeQuery($query, $params = [])
    {
        $pdo = $this->Connect();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare($query);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute($params);
                return $stmt; // Trả về statement để có thể xử lý thêm nếu cần
            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
                return false;
            } finally {
                // Đóng kết nối
                $pdo = null; // Giải phóng tài nguyên
            }
        }
        return false;
    }
    public function executeInsert($query)
    {
        $pdo = $this->Connect();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare($query);
                //Gán giá trị và thực thi
                $stmt->execute();
                $lastId= $pdo->lastInsertId();
                return $lastId; // Trả về statement để có thể xử lý thêm nếu cần
            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
                return false;
            } finally {
                // Đóng kết nối
                $pdo = null; // Giải phóng tài nguyên
            }
        }
        return false;
    }
    public function executeUpdate($query)
    {
        $pdo = $this->Connect();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare($query);
                //Gán giá trị và thực thi
                $stmt->execute();
                return $stmt; // Trả về statement để có thể xử lý thêm nếu cần
            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
                return false;
            } finally {
                // Đóng kết nối
                $pdo = null; // Giải phóng tài nguyên
            }
        }
        return false;
    }
}
