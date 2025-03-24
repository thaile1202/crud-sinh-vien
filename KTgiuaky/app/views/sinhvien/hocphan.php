<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #343a40;
        }
        .table {
            margin-top: 15px;
        }
        .btn-success {
            width: 100px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Học Phần</a>
        </div>
    </nav>
    <div class="container">
        <h2>DANH SÁCH HỌC PHẦN</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CNTT01</td>
                    <td>Lập trình C</td>
                    <td>3</td>
                    <td><button class="btn btn-success">Đăng Ký</button></td>
                </tr>
                <tr>
                    <td>CNTT02</td>
                    <td>Cơ sở dữ liệu</td>
                    <td>2</td>
                    <td><button class="btn btn-success">Đăng Ký</button></td>
                </tr>
                <tr>
                    <td>QTKD02</td>
                    <td>Xuất nhập khẩu</td>
                    <td>3</td>
                    <td><button class="btn btn-success">Đăng Ký</button></td>
                </tr>
                <tr>
                    <td>QTKD01</td>
                    <td>Kinh tế vĩ mô</td>
                    <td>2</td>
                    <td><button class="btn btn-success">Đăng Ký</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>