<?php $baseUrl = 'http://localhost/KTgiuaky/'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Đăng Nhập</h4>
                </div>
                <div class="card-body">
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
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let maSV = document.getElementById("maSV").value;
    let loginError = document.getElementById("loginError");

    fetch("index.php?controller=auth&action=login", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "maSV=" + encodeURIComponent(maSV)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = "index.php?controller=sinhvien&action=index"; // Chuyển hướng sau khi đăng nhập
        } else {
            loginError.textContent = data.message; // Hiển thị lỗi nếu đăng nhập thất bại
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

</body>
</html>
