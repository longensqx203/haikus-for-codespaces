<?php 
    // Lấy dữ liệu từ form gửi lên (nếu có) bằng phương thức POST
	$id         = isset($_POST['id']) ? $_POST['id'] : '';
	$hoten      = isset($_POST['hoten']) ? $_POST['hoten'] : '';
	$ngaysinh   = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
	$gioitinh   = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
	$diachi     = isset($_POST['diachi']) ? $_POST['diachi'] : '';
	$sdt        = isset($_POST['sdt']) ? $_POST['sdt'] : '';
	$gmail      = isset($_POST['gmail']) ? $_POST['gmail'] : '';
	$phongban   = isset($_POST['phongban']) ? $_POST['phongban'] : '';
	$chucvu     = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';
	$ngayvaolam = isset($_POST['ngayvaolam']) ? $_POST['ngayvaolam'] : '';
	$tinhtrang  = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : '';

    // Kết nối database
	include 'connect.php';

    // Câu lệnh SQL UPDATE để cập nhật hồ sơ nhân sự dựa theo ID
	$sql = "UPDATE danhsach_hosonhansu 
            SET hoten = '$hoten', 
                ngaysinh = '$ngaysinh', 
                gioitinh = '$gioitinh', 
                diachi = '$diachi', 
                sdt = '$sdt', 
                gmail = '$gmail', 
                phongban = '$phongban', 
                chucvu = '$chucvu', 
                ngayvaolam = '$ngayvaolam', 
                tinhtrang = '$tinhtrang' 
            WHERE id = ".$id;

    // Kiểm tra thực thi lệnh SQL
	if ($conn->query($sql) === TRUE) {
		// Nếu thành công thì báo alert
		echo '<script type="text/javascript">';
		echo 'alert("Cập nhật thành công!")';
		echo '</script>';
	} else {
        // Nếu thất bại thì báo lỗi + thông tin SQL
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<script type="text/javascript">';
        echo 'alert("Cập nhật thất bại!")';
        echo '</script>';
    }

    // Đóng kết nối
	$conn->close();

    // Sau khi cập nhật xong, quay lại trang danh sách nhân sự
	include 'danhsachhosonhansu.php';
?>
