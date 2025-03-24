<?php 
$rootPath = dirname(__DIR__, 3); // Lấy đường dẫn thư mục gốc

// Kiểm tra và include header
$headerPath = $rootPath . '/app/views/layout/header.php';
if (file_exists($headerPath)) {
    include $headerPath;
} else {
    die("Lỗi: Không tìm thấy file header.php!");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Thêm sinh viên</h1>
        <form action="index.php?controller=sinhvien&action=create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="MaSV" class="form-label">Mã sinh viên</label>
                <input type="text" class="form-control" id="MaSV" name="MaSV" required>
            </div>
            <div class="mb-3">
                <label for="HoTen" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" required>
            </div>
            <div class="mb-3">
                <label for="GioiTinh" class="form-label">Giới tính</label>
                <select class="form-control" id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="NgaySinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
            </div>
            <div class="mb-3">
                <label for="Hinh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="Hinh" name="Hinh">
            </div>
            <div class="mb-3">
                <label for="MaNganh" class="form-label">Mã ngành</label>
                <input type="text" class="form-control" id="MaNganh" name="MaNganh" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="index.php?controller=sinhvien&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $footerPath = $rootPath . '/app/views/layout/footer.php';
if (file_exists($footerPath)) {
    include $footerPath;
} else {
    die("Lỗi: Không tìm thấy file footer.php!");
}
?>
