<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Hồ Sơ Nhân Sự</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa; /* Màu nền xám nhạt */
        }
        .card-header {
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #007bff, #0056b3); /* Gradient xanh dương */
            color: white;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            border-bottom: none;
        }
        tbody tr:hover {
            background-color: #eef3ff; /* Khi hover đổi màu nền */
            transition: 0.25s;
        }
    </style>
</head>
<body>

<?php include 'connect.php'; // Gọi file PHP để kết nối CSDL ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">
        <i class="fa-solid fa-building-user me-2"></i> Quản Lý Nhân Sự
    </a>
  </div>
</nav>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <i class="fa-solid fa-users-gear me-2"></i> Danh Sách Hồ Sơ Nhân Sự
        </div>
        <div class="card-body">

            <!-- Các nút thao tác -->
            <div class="mb-3 text-center">
                <a href="themdanhsach.php" class="btn btn-success me-2">
                    <i class="fa-solid fa-user-plus"></i> Nhập Hồ Sơ
                </a>
                <a href="timkiem.php" class="btn btn-info text-white me-2">
                    <i class="fa-solid fa-magnifying-glass"></i> Tìm Kiếm Hồ Sơ
                </a>
                <a href="index.php" class="btn btn-primary me-2">
                    <i class="fa-solid fa-house"></i> Trang Chủ
                </a>
            </div>

            <!-- Bảng hiển thị danh sách nhân sự -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle shadow-sm">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>STT</th>
                            <th>Mã NV</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Giới Tính</th>
                            <th>Địa Chỉ</th>
                            <th>SĐT</th>
                            <th>Gmail</th>
                            <th>Phòng Ban</th>
                            <th>Chức Vụ</th>
                            <th>Ngày Vào Làm</th>
                            <th>Tình Trạng</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Truy vấn lấy toàn bộ dữ liệu từ bảng nhân sự
                        $sql = "SELECT * FROM danhsach_hosonhansu";
                        $result = $conn->query($sql);

                        // Nếu có dữ liệu thì hiển thị
                        if ($result->num_rows > 0) {
                            $i = 1; // Biến đếm STT
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$i.'</td>'; // STT
                                echo '<td class="text-center">'.$row['id'].'</td>'; // Mã NV
                                echo '<td class="text-start">'.$row['hoten'].'</td>'; // Họ tên
                                echo '<td class="text-center">'.$row['ngaysinh'].'</td>'; // Ngày sinh
                                echo '<td class="text-center">'.$row['gioitinh'].'</td>'; // Giới tính
                                echo '<td class="text-start">'.$row['diachi'].'</td>'; // Địa chỉ
                                echo '<td class="text-center">'.$row['sdt'].'</td>'; // SĐT
                                echo '<td class="text-start">'.$row['gmail'].'</td>'; // Gmail
                                echo '<td class="text-start">'.$row['phongban'].'</td>'; // Phòng ban
                                echo '<td class="text-start">'.$row['chucvu'].'</td>'; // Chức vụ
                                echo '<td class="text-center">'.$row['ngayvaolam'].'</td>'; // Ngày vào làm
                                echo '<td class="text-center">'.$row['tinhtrang'].'</td>'; // Tình trạng

                                // Thao tác: Sửa và Xóa
                                echo '<td class="text-center">
                                    <a href="suadanhsach.php?id='.$row['id'].'" class="btn btn-sm btn-warning me-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                    <a href="xoadanhsach.php?id='.$row['id'].'" class="btn btn-sm btn-danger" 
                                       onclick="return confirm(\'Bạn có chắc chắn muốn xóa hồ sơ này không?\')">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </td>';
                                echo '</tr>';
                                $i++; // Tăng STT
                            }
                        } else {
                            // Nếu không có dữ liệu thì in ra thông báo
                            echo '<tr><td colspan="13" class="text-center text-muted">📭 Không có dữ liệu</td></tr>';
                        }
                        $conn->close(); // Đóng kết nối CSDL
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
