<?php
session_start();
require_once "models/User.php";

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $maSV = $_POST["maSV"] ?? "";

            if (empty($maSV)) {
                echo json_encode(["success" => false, "message" => "Vui lòng nhập Mã Sinh Viên!"]);
                exit();
            }

            $userModel = new User();
            $sinhvien = $userModel->login($maSV);

            if ($sinhvien) {
                $_SESSION["sinhvien"] = $sinhvien; // Lưu vào session
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Mã Sinh Viên không tồn tại!"]);
            }
            exit();
        }

        include "views/auth/login.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
