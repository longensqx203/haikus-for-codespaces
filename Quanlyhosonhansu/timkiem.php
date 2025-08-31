<?php 
// Kết nối database
include 'connect.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm Nâng Cao</title>
    <!-- CSS & JS Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- Thanh navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="danhsachhosonhansu.php">
        <i class="fa-solid fa-building-user me-2"></i> Quản Lý Nhân Sự
    </a>
  </div>
</nav>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fa-solid fa-magnifying-glass me-2"></i> Tìm Kiếm Hồ Sơ
        </div>
        <div class="card-body">
            <!-- Form tìm kiếm nâng cao -->
            <form method="post" class="row g-3">
                <!-- Nhập Mã NV -->
                <div class="col-md-2">
                    <label class="form-label">Mã NV</label>
                    <input type="text" name="id" class="form-control">
                </div>
                <!-- Nhập Họ tên -->
                <div class="col-md-4">
                    <label class="form-label">Họ Tên</label>
                    <input type="text" name="hoten" class="form-control">
                </div>
                <!-- Nhập SĐT -->
                <div class="col-md-3">
                    <label class="form-label">SĐT</label>
                    <input type="text" name="sdt" class="form-control">
                </div>
                <!-- Nhập Email -->
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="gmail" class="form-control">
                </div>
                <!-- Nhập Địa chỉ -->
                <div class="col-md-4">
                    <label class="form-label">Địa Chỉ</label>
                    <input type="text" name="diachi" class="form-control">
                </div>
                <!-- Nhập Phòng ban -->
                <div class="col-md-4">
                    <label class="form-label">Phòng Ban</label>
                    <input type="text" name="phongban" class="form-control">
                </div>
                <!-- Nhập Chức vụ -->
                <div class="col-md-4">
                    <label class="form-label">Chức Vụ</label>
                    <input type="text" name="chucvu" class="form-control">
                </div>
                <!-- Chọn Tình trạng -->
                <div class="col-md-4">
                    <label class="form-label">Tình Trạng</label>
                    <select name="tinhtrang" class="form-select">
                        <option value="">-- Tất cả --</option>
                        <option>Đang làm</option>
                        <option>Nghỉ việc</option>
                        <option>Tạm nghỉ</option>
                    </select>
                </div>

                <!-- Nút bấm -->
                <div class="col-12 text-center mt-3">
                    <button type="submit" name="btn" class="btn btn-success px-4">
                        <i class="fa-solid fa-magnifying-glass"></i> Tìm Kiếm
                    </button>
                    <a href="danhsachhosonhansu.php" class="btn btn-secondary ms-2 px-4">
                        <i class="fa-solid fa-arrow-left"></i> Quay Lại Danh Sách
                    </a>
                </div>
            </form>

            <hr>

            <?php
            // Nếu người dùng bấm nút tìm kiếm
            if (isset($_POST['btn'])) {
                $conditions = []; // Mảng chứa điều kiện SQL
                $params = [];     // Mảng chứa giá trị tham số
                $types = "";      // Chuỗi kiểu dữ liệu cho bind_param

                // Kiểm tra từng input, nếu có nhập thì thêm vào điều kiện WHERE
                if (!empty($_POST['id'])) {
                    $conditions[] = "id LIKE ?";
                    $params[] = "%" . $_POST['id'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['hoten'])) {
                    $conditions[] = "hoten LIKE ?";
                    $params[] = "%" . $_POST['hoten'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['sdt'])) {
                    $conditions[] = "sdt LIKE ?";
                    $params[] = "%" . $_POST['sdt'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['gmail'])) {
                    $conditions[] = "gmail LIKE ?";
                    $params[] = "%" . $_POST['gmail'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['diachi'])) {
                    $conditions[] = "diachi LIKE ?";
                    $params[] = "%" . $_POST['diachi'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['phongban'])) {
                    $conditions[] = "phongban LIKE ?";
                    $params[] = "%" . $_POST['phongban'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['chucvu'])) {
                    $conditions[] = "chucvu LIKE ?";
                    $params[] = "%" . $_POST['chucvu'] . "%";
                    $types .= "s";
                }
                if (!empty($_POST['tinhtrang'])) {
                    $conditions[] = "tinhtrang = ?";
                    $params[] = $_POST['tinhtrang'];
                    $types .= "s";
                }

                // Câu SQL mặc định
                $sql = "SELECT * FROM danhsach_hosonhansu";
                if (!empty($conditions)) {
                    // Nếu có điều kiện thì nối thêm WHERE
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                }

                // Chuẩn bị statement
                $stmt = $conn->prepare($sql);
                if (!empty($params)) {
                    // Gắn tham số vào câu lệnh
                    $stmt->bind_param($types, ...$params);
                }

                // Thực thi câu lệnh
                $stmt->execute();
                $result = $stmt->get_result();

                // Hiển thị kết quả
                if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered table-hover text-center">';
                    echo '<thead class="table-dark">
                            <tr>
                                <th>Mã NV</th>
                                <th>Họ Tên</th>
                                <th>Ngày Sinh</th>
                                <th>Giới Tính</th>
                                <th>Địa Chỉ</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Phòng Ban</th>
                                <th>Chức Vụ</th>
                                <th>Ngày Vào Làm</th>
                                <th>Tình Trạng</th>
                                <th>Thao Tác</th>
                            </tr>
                          </thead>';
                    echo '<tbody>';

                    // Lặp qua từng kết quả
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['hoten']}</td>
                                <td>{$row['ngaysinh']}</td>
                                <td>{$row['gioitinh']}</td>
                                <td>{$row['diachi']}</td>
                                <td>{$row['sdt']}</td>
                                <td>{$row['gmail']}</td>
                                <td>{$row['phongban']}</td>
                                <td>{$row['chucvu']}</td>
                                <td>{$row['ngayvaolam']}</td>
                                <td>{$row['tinhtrang']}</td>
                                <td>
                                    <!-- Nút sửa -->
                                    <a href='suadanhsach.php?id={$row['id']}' class='btn btn-warning btn-sm'>
                                        <i class='fa-solid fa-pen'></i>
                                    </a>
                                    <!-- Nút xóa -->
                                    <a href='xoadanhsach.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Bạn có chắc muốn xóa không?')\">
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                </td>
                              </tr>";
                    }
                    echo '</tbody></table>';
                } else {
                    // Không có kết quả
                    echo '<div class="alert alert-warning text-center">Không tìm thấy kết quả nào!</div>';
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
