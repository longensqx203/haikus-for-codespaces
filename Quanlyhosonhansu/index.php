<?php 
// index.php
session_start(); // Bắt đầu session để lưu trạng thái đăng nhập

// Nếu chưa đăng nhập thì quay về login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng về trang đăng nhập
    exit(); // Ngừng thực thi
}

// Lấy thông tin user từ session
$username = $_SESSION['username']; // Tên đăng nhập
$role     = $_SESSION['role'];     // Vai trò (quyền hạn)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Trang Quản Lý Hồ Sơ Nhân Sự</title>
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

<!-- Thanh Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <!-- Logo / Tên hệ thống -->
    <a class="navbar-brand fw-bold" href="#">
      <i class="fa-solid fa-building-user me-2"></i> Quản Lý Hồ Sơ Nhân Sự
    </a>

    <!-- Thông tin user + nút đăng xuất -->
    <div class="d-flex align-items-center">
      <span class="text-white me-3">
        Xin chào, <strong><?php echo htmlspecialchars($username); ?></strong> 
        (<?php echo htmlspecialchars($role); ?>)
      </span>
      <a href="logout.php" class="btn btn-outline-light">Đăng Xuất</a>
    </div>
  </div>
</nav>

<!-- Nội dung chính -->
<div class="container mt-5">
  <div class="row g-4">

    <!-- Card: Phòng Tổ Chức -->
    <div class="col-md-6 col-lg-3">
      <div class="card shadow h-100 text-center">
        <div class="card-body">
          <i class="fa-solid fa-users-gear fa-3x mb-3 text-primary"></i>
          <h5 class="card-title">Phòng Tổ Chức</h5>
          <p class="text-muted">Quản lý, nhập hồ sơ nhân sự toàn trường</p>
          <a href="danhsachhosonhansu.php" class="btn btn-primary">Vào quản lý</a>
        </div>
      </div>
    </div>

    <!-- Card: Lãnh Đạo Khoa/Viện -->
    <div class="col-md-6 col-lg-3">
      <div class="card shadow h-100 text-center">
        <div class="card-body">
          <i class="fa-solid fa-graduation-cap fa-3x mb-3 text-success"></i>
          <h5 class="card-title">Lãnh Đạo Khoa/Viện</h5>
          <p class="text-muted">Cập nhật khen thưởng/kỷ luật sinh viên</p>
          <a href="khoa_vien.php" class="btn btn-success">Vào quản lý</a>
        </div>
      </div>
    </div>

    <!-- Card: Lãnh Đạo Trường -->
    <div class="col-md-6 col-lg-3">
      <div class="card shadow h-100 text-center">
        <div class="card-body">
          <i class="fa-solid fa-school fa-3x mb-3 text-warning"></i>
          <h5 class="card-title">Lãnh Đạo Trường</h5>
          <p class="text-muted">Cập nhật khen thưởng/kỷ luật cấp trường</p>
          <a href="lanhdao_truong.php" class="btn btn-warning text-white">Vào quản lý</a>
        </div>
      </div>
    </div>

    <!-- Card: Phòng Tài Vụ -->
    <div class="col-md-6 col-lg-3">
      <div class="card shadow h-100 text-center">
        <div class="card-body">
          <i class="fa-solid fa-sack-dollar fa-3x mb-3 text-danger"></i>
          <h5 class="card-title">Phòng Tài Vụ</h5>
          <p class="text-muted">Quản lý lương, thưởng, phiếu chi</p>
          <a href="taivu.php" class="btn btn-danger">Vào quản lý</a>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
