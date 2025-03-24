<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "test1";  // Đổi thành tên database của bạn
    private static $username = "root"; // Kiểm tra username của MySQL
    private static $password = "";     // Kiểm tra password của MySQL
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            try {
                self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$dbname);
                if (self::$conn->connect_error) {
                    die("❌ Kết nối database thất bại: " . self::$conn->connect_error);
                }
            } catch (Exception $e) {
                die("❌ Lỗi kết nối database: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
