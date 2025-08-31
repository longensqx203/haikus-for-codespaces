<?php
session_start(); // Bắt đầu session để lưu trạng thái đăng nhập
include 'connect.php'; // Kết nối tới CSDL

// Kiểm tra nếu người dùng submit form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];                // Lấy username từ form
    $password = md5($_POST['password']);           // Lấy password từ form và mã hóa MD5 (⚠️ nên dùng bcrypt/argon2 an toàn hơn)

    // Câu lệnh SQL kiểm tra user tồn tại trong bảng `users`
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Nếu tìm thấy user
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Lấy thông tin user từ CSDL
        $_SESSION['username'] = $row['username']; // Lưu username vào session
        $_SESSION['role'] = $row['role'];         // Lưu quyền (role) vào session
        header("Location: index.php"); // Chuyển hướng về trang chính
        exit();
    } else {
        // Nếu sai thông tin đăng nhập thì hiển thị lỗi
        $error = "❌ Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập Hệ Thống</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #6610f2); /* Nền gradient xanh tím */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(26, 200, 84, 0.2);
            width: 400px; /* Chiều rộng form */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔐 Đăng Nhập</h2>
        <!-- Nếu có lỗi thì hiển thị ra -->
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        
        <!-- Form đăng nhập -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
