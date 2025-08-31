<?php
// Khai báo thông tin để kết nối đến MySQL
$servername = "localhost"; // Tên server (thường là localhost khi chạy trên máy cá nhân)
$username   = "root";      // Tên user MySQL (mặc định của XAMPP/WAMP là root)
$password   = "";          // Mật khẩu MySQL (mặc định root thường để trống)
$dbname     = "quanlynhansu"; // Tên cơ sở dữ liệu cần kết nối

// Tạo kết nối đến MySQL bằng MySQLi (hướng đối tượng)
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối có thành công hay không
if ($conn->connect_error) {
    // Nếu có lỗi -> dừng chương trình và hiển thị thông báo
    die("❌ Kết nối thất bại: " . $conn->connect_error);
}

// Nếu muốn test kết nối thành công, có thể bỏ comment dòng dưới
// echo "✅ Kết nối thành công";
?>
