<?php
session_start();
$baseUrl = 'http://localhost/KTgiuaky/';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
            transform: scale(1.1);
        }
        .header {
            background: black;
            color: white;
            text-align: center;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .header h1 {
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
            border-radius: 50px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $baseUrl ?>index.php">QL Sinh Viên</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>index.php?controller=sinhvien&action=index">📋 Danh sách sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>index.php?controller=sinhvien&action=create">➕ Thêm sinh viên</a>
                </li>
            </ul>

            <!-- Menu Đăng nhập / Đăng xuất -->
            <ul class="navbar-nav ms-auto">
                <?php if (!empty($_SESSION['sinhvien'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">👤 <?= htmlspecialchars($_SESSION['sinhvien']['HoTen']) ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white" href="<?= $baseUrl ?>index.php?controller=auth&action=logout">Đăng Xuất</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <button class="nav-link btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Đăng Nhập
                        </button>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal đăng nhập -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng Nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="maSV" class="form-label">Mã Sinh Viên</label>
                        <input type="text" class="form-control" id="maSV" name="maSV" required>
                    </div>
                    <div class="mb-3 text-danger" id="loginError"></div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>

            <!-- Menu Đăng nhập / Đăng xuất -->
            <ul class="navbar-nav ms-auto">
                <?php if (!empty($_SESSION['sinhvien'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">👤 <?= htmlspecialchars($_SESSION['sinhvien']['HoTen']) ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white" href="<?= $baseUrl ?>index.php?controller=auth&action=logout">Đăng Xuất</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success btn-sm text-white" href="<?= $baseUrl ?>index.php?controller=auth&action=login">Đăng Nhập</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<div class="container mt-4">
    <div class="header">
        <h1>Hệ Thống Quản Lý Sinh Viên</h1>
        <p>Quản lý sinh viên với đầy đủ chức năng thêm, sửa, xóa.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
