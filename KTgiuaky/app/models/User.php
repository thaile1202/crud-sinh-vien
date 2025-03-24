<?php
require_once "models/Database.php";

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function login($maSV) {
        $query = "SELECT * FROM sinhviens WHERE maSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maSV", $maSV);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin sinh viên hoặc false nếu không tìm thấy
    }
}
