<?php 
    // Lấy id từ URL (phương thức GET), nếu không có thì gán rỗng
	$id = isset($_GET['id']) ? $_GET['id'] : '';

    // Kết nối cơ sở dữ liệu
	include 'connect.php';

    // Câu lệnh SQL xóa nhân sự có id tương ứng
	$sql = "DELETE FROM danhsach_hosonhansu WHERE id = " . $id;

    // Thực thi câu lệnh SQL
	if ($conn->query($sql) === TRUE) {
        // Nếu xóa thành công -> hiển thị thông báo bằng JavaScript
		echo '<script type="text/javascript">';
		echo 'alert("Xóa thành công!")';
		echo '</script>';
	} else {
        // Nếu có lỗi -> in ra lỗi chi tiết và thông báo thất bại
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<script type="text/javascript">';
		echo 'alert("Xóa thất bại!")';
		echo '</script>';
	}

    // Đóng kết nối DB
	$conn->close();

    // Gọi lại file danh sách để hiển thị dữ liệu mới nhất
	include 'danhsachhosonhansu.php';
?>
