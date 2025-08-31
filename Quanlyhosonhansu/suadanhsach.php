<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Hồ Sơ</title>
    <!-- Gọi Bootstrap và FontAwesome để làm giao diện -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<?php 
// Kết nối database
include 'connect.php'; 

// Lấy id hồ sơ từ URL (GET)
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Chuẩn bị câu lệnh SQL để lấy thông tin hồ sơ theo id
$sql = "SELECT * FROM danhsach_hosonhansu WHERE id = ?";

// Dùng prepare để chống SQL Injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="danhsachhosonhansu.php">
        <i class="fa-solid fa-building-user me-2"></i> Quản Lý Nhân Sự
    </a>
  </div>
</nav>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark fw-bold">
            <i class="fa-solid fa-user-pen me-2"></i> Cập Nhật Hồ Sơ
        </div>
        <div class="card-body">
            <?php 
            // Nếu có dữ liệu hồ sơ
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            ?>
            <!-- Form cập nhật hồ sơ -->
            <form action="processSuadanhsach.php" method="POST" class="row g-3">
                <!-- Truyền id ẩn để biết cập nhật bản ghi nào -->
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <!-- Họ tên -->
                <div class="col-md-6">
                    <label class="form-label">Họ Tên</label>
                    <input name="hoten" type="text" class="form-control" value="<?= $row['hoten'] ?>" required>
                </div>

                <!-- Ngày sinh -->
                <div class="col-md-3">
                    <label class="form-label">Ngày Sinh</label>
                    <input name="ngaysinh" type="date" class="form-control" value="<?= $row['ngaysinh'] ?>">
                </div>

                <!-- Giới tính -->
                <div class="col-md-3">
                    <label class="form-label">Giới Tính</label>
                    <select name="gioitinh" class="form-select">
                        <option <?= $row['gioitinh']=="Nam"?"selected":"" ?>>Nam</option>
                        <option <?= $row['gioitinh']=="Nữ"?"selected":"" ?>>Nữ</option>
                        <option <?= $row['gioitinh']=="Khác"?"selected":"" ?>>Khác</option>
                    </select>
                </div>

                <!-- Địa chỉ -->
                <div class="col-md-6">
                    <label class="form-label">Địa Chỉ</label>
                    <input name="diachi" type="text" class="form-control" value="<?= $row['diachi'] ?>">
                </div>

                <!-- SĐT -->
                <div class="col-md-3">
                    <label class="form-label">SĐT</label>
                    <input name="sdt" type="number" class="form-control" value="<?= $row['sdt'] ?>">
                </div>

                <!-- Email -->
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input name="gmail" type="email" class="form-control" value="<?= $row['gmail'] ?>">
                </div>

                <!-- Phòng ban -->
                <div class="col-md-4">
                    <label class="form-label">Phòng Ban</label>
                    <input name="phongban" type="text" class="form-control" value="<?= $row['phongban'] ?>">
                </div>

                <!-- Chức vụ -->
                <div class="col-md-4">
                    <label class="form-label">Chức Vụ</label>
                    <input name="chucvu" type="text" class="form-control" value="<?= $row['chucvu'] ?>">
                </div>

                <!-- Ngày vào làm -->
                <div class="col-md-4">
                    <label class="form-label">Ngày Vào Làm</label>
                    <input name="ngayvaolam" type="date" class="form-control" value="<?= $row['ngayvaolam'] ?>">
                </div>

                <!-- Tình trạng -->
                <div class="col-md-6">
                    <label class="form-label">Tình Trạng</label>
                    <select name="tinhtrang" class="form-select">
                        <option <?= $row['tinhtrang']=="Đang làm"?"selected":"" ?>>Đang làm</option>
                        <option <?= $row['tinhtrang']=="Nghỉ việc"?"selected":"" ?>>Nghỉ việc</option>
                        <option <?= $row['tinhtrang']=="Tạm nghỉ"?"selected":"" ?>>Tạm nghỉ</option>
                    </select>
                </div>

                <!-- Nút lưu & quay lại -->
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Lưu Cập Nhật
                    </button>
                    <a href="danhsachhosonhansu.php" class="btn btn-outline-secondary px-4 ms-2">
                        <i class="fa-solid fa-arrow-left"></i> Quay Lại Danh Sách
                    </a>
                </div>
            </form>
            <?php 
            } else {
                // Nếu không tìm thấy hồ sơ
                echo "<div class='alert alert-warning'>Không tìm thấy hồ sơ!</div>";
            }
            // Đóng kết nối
            $conn->close();
            ?>
        </div>
    </div>
</div>
</body>
</html>
