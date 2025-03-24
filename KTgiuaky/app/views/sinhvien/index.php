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
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <div class="text-end mb-3">
            <a href="index.php?controller=sinhvien&action=create" class="btn btn-primary">➕ Thêm sinh viên</a>
        </div>
        
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Hình Ảnh</th>
                    <th>Mã Ngành</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhviens as $sv): ?>
                    <tr>
                        <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                        <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                        <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                        <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                        <td>
                            <?php if (!empty($sv['Hinh'])): ?>
                                <img src="/KTgiuaky/app/uploads/<?= htmlspecialchars($sv['Hinh']) ?>" alt="Hình SV" width="50">
                            <?php else: ?>
                                <span class="text-muted">Chưa có</span>
                            <?php endif; ?>
                        </td>

                        <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                        <td>
                            <a href="index.php?controller=sinhvien&action=detail&id=<?= $sv['MaSV'] ?>" class="btn btn-info btn-sm">📄 Chi tiết</a>
                            <a href="index.php?controller=sinhvien&action=edit&id=<?= $sv['MaSV'] ?>" class="btn btn-warning btn-sm">✏️ Sửa</a>
                            <a href="index.php?controller=sinhvien&action=delete&id=<?= $sv['MaSV'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
                                ❌ Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
