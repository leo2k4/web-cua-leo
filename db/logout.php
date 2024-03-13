<?php
// Bắt đầu hoặc khôi phục một phiên làm việc
session_start();

if (isset($_POST['logout'])) {
    // Hủy phiên làm việc và chuyển hướng đến trang đăng nhập
    session_destroy();
    header('Location: ../php/home.php');
    exit();
}
?>