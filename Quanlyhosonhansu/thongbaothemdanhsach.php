<?php 
// Lấy dữ liệu từ form bằng toán tử ?? (nếu không có thì trả về rỗng)
$id         = $_POST['id'] ?? '';
$hoten      = $_POST['hoten'] ?? '';
$ngaysinh   = $_POST['ngaysinh'] ?? '';
$gioitinh   = $_POST['gioitinh'] ?? '';
$diachi     = $_POST['diachi'] ?? '';
$sdt        = $_POST['sdt'] ?? '';
$gmail      = $_POST['gmail'] ?? '';
$phongban   = $_POST['phongban'] ?? '';
$chucvu     = $_POST['chucvu'] ?? '';
$ngayvaolam = $_POST['ngayvaolam'] ?? '';
$tinhtrang  = $_POST['tinhtrang'] ?? '';

// Gọi file connect.php để kết nối CSDL
include 'connect.php';

// ✅ Dùng Prepared Statement để chống SQL Injection
$sql = "INSERT INTO danhsach_hosonhansu 
        (id, hoten, ngaysinh, gioitinh, diachi, sdt, gmail, phongban, chucvu, ngayvaolam, tinhtrang) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh SQL
$stmt = $conn->prepare($sql);

// Gán dữ liệu vào câu lệnh (bind_param)
// "i" = integer (số), "s" = string (chuỗi)
// Ở đây id là int, các cột còn lại dạng chuỗi => "issssssssss"
$stmt->bind_param(
    "issssssssss", 
    $id, $hoten, $ngaysinh, $gioitinh, $diachi, 
    $sdt, $gmail, $phongban, $chucvu, $ngayvaolam, $tinhtrang
);

// Thực thi câu lệnh
if ($stmt->execute()) {
    // Nếu thành công -> hiển thị alert và quay về danh sách
    echo "<script>
            alert('✅ Thêm mới thành công!');
            window.location='danhsachhosonhansu.php';
          </script>";
} else {
    // Nếu thất bại -> hiển thị lỗi và quay lại trang trước
    echo "<script>
            alert('❌ Thêm mới thất bại: " . $conn->error . "');
            window.history.back();
          </script>";
}

// Đóng statement và kết nối
$stmt->close();
$conn->close();
?>
