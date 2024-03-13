<?php
include_once('../db/connects.php');

session_start();

// Khởi tạo phiên người dùng nếu chưa có
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    $_SESSION['username'] = 'Guest!';
}

// Kiểm tra xem người dùng đã đăng nhập chưa
if ($_SESSION['username'] !== 'Guest!') {
    $username = $_SESSION['username'];

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $mysqli->query($sql);

    // Kiểm tra và hiển thị thông tin
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fullName = $row['full_name'];
            $address = $row['address'];
            $phone = $row['phone'];

            echo "<p style='color: blue; font-size: 16px;font-weight: bold; margin-left:20px'>" . ($fullName ? $fullName : "Chưa nhập thông tin") . "</p>";
            echo "<p style='margin-left:20px;font-size: 14px;'> " . ($address ? $address : "Chưa nhập thông tin") . "</p>";
            echo "<p style='margin-left:20px;font-size: 14px;'> " . ($phone ? $phone : "Chưa nhập thông tin") . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Không có dữ liệu";
    }

    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Lấy thông tin người dùng từ form 
        $fullName = $_POST['full_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Cập nhật thông tin người dùng chỉ cho người dùng hiện tại
        $sql = "UPDATE users SET full_name='$fullName', address='$address', phone='$phone'
                WHERE username='$username'";
        $result = $mysqli->query($sql);

        if ($result) {
            echo "<script>alert('Cập Nhật Thông Tin Thành Công'); window.location.href='../php/user.php';</script>";
        } else {
            echo "Có lỗi xảy ra khi cập nhật thông tin.";
        }
    } else {
        echo "<script>alert('Chưa đăng nhập'); window.location.href='../php/user.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Chưa đăng nhập'); window.location.href='../php/user.php';</script>";
    exit(); // Đảm bảo kết thúc script sau khi chuyển hướng
}

$mysqli->close();
