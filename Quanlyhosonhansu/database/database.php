-- Tạo database
CREATE DATABASE IF NOT EXISTS quanlynhansu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE quanlynhansu;

-- Tạo bảng lưu hồ sơ nhân sự
CREATE TABLE danhsach_hosonhansu (
    id INT PRIMARY KEY,                  -- Mã nhân sự (ID)
    hoten VARCHAR(100) NOT NULL,         -- Họ và tên
    ngaysinh DATE NOT NULL,              -- Ngày sinh
    gioitinh ENUM('Nam','Nữ','Khác') NOT NULL, -- Giới tính
    diachi VARCHAR(255),                 -- Địa chỉ
    sdt VARCHAR(20),                     -- Số điện thoại
    gmail VARCHAR(100) UNIQUE,           -- Gmail (unique để tránh trùng)
    phongban VARCHAR(100),               -- Phòng ban
    chucvu VARCHAR(100),                 -- Chức vụ
    ngayvaolam DATE,                     -- Ngày vào làm
    tinhtrang VARCHAR(50)                -- Tình trạng (Đang làm, Nghỉ, Thử việc...)
);

-- Thêm một vài dữ liệu mẫu
INSERT INTO danhsach_hosonhansu (id, hoten, ngaysinh, gioitinh, diachi, sdt, gmail, phongban, chucvu, ngayvaolam, tinhtrang) VALUES
(1, 'Nguyễn Văn A', '1995-05-20', 'Nam', 'Hà Nội', '0912345678', 'vana@gmail.com', 'Kế Toán', 'Nhân Viên', '2022-03-01', 'Đang làm'),
(2, 'Trần Thị B', '1998-11-15', 'Nữ', 'Hải Phòng', '0987654321', 'thib@gmail.com', 'Nhân Sự', 'Trưởng Phòng', '2021-07-10', 'Đang làm');