<?php
require_once __DIR__ . '/../config/database.php';

class SinhVien {
    private static function getConnection() {
        return Database::connect(); 
    }

    public static function all() {
        $conn = self::getConnection();
        $sql = "SELECT * FROM SinhVien";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = self::getConnection();
        $sql = "SELECT * FROM SinhVien WHERE MaSV = '$id'";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function create($data) {
        $conn = self::getConnection();
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh)
                VALUES ('{$data['MaSV']}', '{$data['HoTen']}', '{$data['GioiTinh']}',
                        '{$data['NgaySinh']}', '{$data['Hinh']}', '{$data['MaNganh']}')";
        return $conn->query($sql);
    }

    public static function update($id, $data) {
        $conn = self::getConnection();
        $sql = "UPDATE SinhVien SET 
                HoTen = '{$data['HoTen']}', 
                GioiTinh = '{$data['GioiTinh']}', 
                NgaySinh = '{$data['NgaySinh']}', 
                Hinh = '{$data['Hinh']}', 
                MaNganh = '{$data['MaNganh']}'
                WHERE MaSV = '$id'";
        return $conn->query($sql);
    }

    public static function delete($id) {
        $conn = self::getConnection();
        $sql = "DELETE FROM SinhVien WHERE MaSV = '$id'";
        return $conn->query($sql);
    }
}
?>
