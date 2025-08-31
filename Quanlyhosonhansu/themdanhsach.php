<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập Mới Hồ Sơ</title>
    <!-- Gọi Bootstrap và FontAwesome để làm giao diện đẹp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<!-- Thanh điều hướng (Navbar) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <!-- Logo + link quay lại danh sách nhân sự -->
    <a class="navbar-brand fw-bold" href="danhsachhosonhansu.php">
        <i class="fa-solid fa-building-user me-2"></i> Quản Lý Nhân Sự
    </a>
  </div>
</nav>

<!-- Container chính -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <!-- Header form -->
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fa-solid fa-user-plus me-2"></i> Nhập Mới Hồ Sơ
        </div>

        <!-- Body form -->
        <div class="card-body">
            <!-- Form nhập dữ liệu, khi submit sẽ gửi đến file thongbaothemdanhsach.php -->
            <form action="thongbaothemdanhsach.php" method="POST" class="row g-3">
                
                <!-- Mã nhân viên -->
                <div class="col-md-4">
                    <label class="form-label">Mã NV</label>
                    <input name="id" type="text" class="form-control" placeholder="Nhập Mã NV" required>
                </div>

                <!-- Họ tên -->
                <div class="col-md-8">
                    <label class="form-label">Họ Tên</label>
                    <input name="hoten" type="text" class="form-control" placeholder="Nhập họ tên" required>
                </div>

                <!-- Ngày sinh -->
                <div class="col-md-4">
                    <label class="form-label">Ngày Sinh</label>
                    <input name="ngaysinh" type="date" class="form-control">
                </div>

                <!-- Giới tính -->
                <div class="col-md-4">
                    <label class="form-label">Giới Tính</label>
                    <select name="gioitinh" class="form-select">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                    </select>
                </div>

                <!-- Số điện thoại -->
                <div class="col-md-4">
                    <label class="form-label">SĐT</label>
                    <input name="sdt" type="number" class="form-control" placeholder="Số điện thoại">
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input name="gmail" type="email" class="form-control" placeholder="Email">
                </div>

                <!-- Địa chỉ -->
                <div class="col-md-6">
                    <label class="form-label">Địa chỉ</label>
                    <input name="diachi" type="text" class="form-control" placeholder="Địa chỉ">
                </div>

                <!-- Phòng ban -->
                <div class="col-md-6">
                    <label class="form-label">Phòng Ban</label>
                    <input name="phongban" type="text" class="form-control">
                </div>

                <!-- Chức vụ -->
                <div class="col-md-6">
                    <label class="form-label">Chức Vụ</label>
                    <input name="chucvu" type="text" class="form-control">
                </div>

                <!-- Ngày vào làm -->
                <div class="col-md-6">
                    <label class="form-label">Ngày Vào Làm</label>
                    <input name="ngayvaolam" type="date" class="form-control">
                </div>

                <!-- Tình trạng -->
                <div class="col-md-6">
                    <label class="form-label">Tình Trạng</label>
                    <select name="tinhtrang" class="form-select">
                        <option>Đang làm</option>
                        <option>Nghỉ việc</option>
                        <option>Tạm nghỉ</option>
                    </select>
                </div>

                <!-- Nút bấm -->
                <div class="mt-4 text-center">
                    <!-- Nút thêm hồ sơ -->
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fa-solid fa-plus"></i> Thêm Hồ Sơ
                    </button>
                    <!-- Nút quay lại -->
                    <a href="danhsachhosonhansu.php" class="btn btn-outline-secondary px-4 ms-2">
                        <i class="fa-solid fa-arrow-left"></i> Quay Lại Danh Sách
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
