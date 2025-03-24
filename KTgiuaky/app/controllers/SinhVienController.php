<?php
require_once __DIR__ . '/../models/SinhVien.php';

class SinhVienController {
    public function index() {
        $sinhviens = SinhVien::all();
        require __DIR__ . '/../views/sinhvien/index.php';
    }

    public function detail($id) {
        $sinhvien = SinhVien::find($id);
        require __DIR__ . '/../views/sinhvien/detail.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Đường dẫn thư mục upload mới
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/KTgiuaky/app/uploads/";
            
            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
    
            // Xử lý file ảnh
            if (!empty($_FILES["Hinh"]["name"])) {
                $fileName = time() . "_" . basename($_FILES["Hinh"]["name"]); // Đổi tên file tránh trùng
                $targetFilePath = $targetDir . $fileName;
    
                if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
                    $_POST["Hinh"] = $fileName;
                } else {
                    $_POST["Hinh"] = null;
                }
            } else {
                $_POST["Hinh"] = null;
            }
    
            // Gọi model để lưu vào database
            SinhVien::create($_POST);
            header("Location: index.php?controller=sinhvien&action=index");
            exit();
        }
        require __DIR__ . '/../views/sinhvien/create.php';
    }
    
    

    public function edit($id) {
        $sinhvien = SinhVien::find($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST;
            
            // Xử lý upload ảnh mới
            if (!empty($_FILES["Hinh"]["name"])) {
                $targetDir = __DIR__ . "/../../uploads/";
                $fileName = basename($_FILES["Hinh"]["name"]);
                $targetFilePath = $targetDir . $fileName;

                if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
                    $data["Hinh"] = $fileName;
                } else {
                    $data["Hinh"] = $sinhvien["Hinh"]; // Giữ hình cũ nếu upload thất bại
                }
            } else {
                $data["Hinh"] = $sinhvien["Hinh"]; // Giữ hình cũ nếu không chọn ảnh mới
            }

            SinhVien::update($id, $data);
            header("Location: index.php?controller=sinhvien&action=index");
            exit();
        }

        require __DIR__ . '/../views/sinhvien/edit.php';
    }

    public function delete($id) {
        // Xóa hình ảnh trước khi xóa sinh viên
        $sinhvien = SinhVien::find($id);
        if ($sinhvien["Hinh"]) {
            $imagePath = __DIR__ . "/../../uploads/" . $sinhvien["Hinh"];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        SinhVien::delete($id);
        header("Location: index.php?controller=sinhvien&action=index");
        exit();
    }
}
?>
