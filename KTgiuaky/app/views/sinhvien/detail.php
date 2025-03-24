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
<div class="container mt-4">
    <h2 class="text-center">Chi tiết sinh viên</h2>
    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if (!empty($sinhvien['Hinh'])): ?>
                    <img src="/KTgiuaky/app/uploads/<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Ảnh Sinh Viên" class="img-thumbnail">
                <?php else: ?>
                    <p class="text-muted">Chưa có ảnh</p>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>Mã Sinh Viên:</th>
                        <td><?= htmlspecialchars($sinhvien['MaSV']) ?></td>
                    </tr>
                    <tr>
                        <th>Họ và Tên:</th>
                        <td><?= htmlspecialchars($sinhvien['HoTen']) ?></td>
                    </tr>
                    <tr>
                        <th>Giới Tính:</th>
                        <td><?= htmlspecialchars($sinhvien['GioiTinh']) ?></td>
                    </tr>
                    <tr>
                        <th>Ngày Sinh:</th>
                        <td><?= htmlspecialchars($sinhvien['NgaySinh']) ?></td>
                    </tr>
                    <tr>
                        <th>Mã Ngành:</th>
                        <td><?= htmlspecialchars($sinhvien['MaNganh']) ?></td>
                    </tr>
                </table>
                <a href="index.php?controller=sinhvien&action=index" class="btn btn-secondary">⬅️ Quay lại</a>
            </div>
        </div>
    </div>
</div>

<?php $footerPath = $rootPath . '/app/views/layout/footer.php';
if (file_exists($footerPath)) {
    include $footerPath;
} else {
    die("Lỗi: Không tìm thấy file footer.php!");
}
?>