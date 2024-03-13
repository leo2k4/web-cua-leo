<?php
require '../db/connects.php';
session_start();
if (isset($_POST['reg'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);
    if (!empty($email) && !empty($password)) {
        // echo "<pre>";
        // print_r($_POST);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password'";
        // echo "'$sql'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $userRow = $result->fetch_assoc(); // Lấy dữ liệu người dùng từ kết quả truy vấn
            $_SESSION['username'] = $userRow['username']; // Lưu tên người dùng vào session
            // print_r($_SESSION['username']);
            echo '<script>';
            echo '    alert("Đăng nhập thành công!");';
            echo '    window.location.href = "../php/trangchinh.php";';
            echo '</script>';
            die();
            $connect->close();
        } else {
            echo '<script>';
            echo '    alert("Sai email hoặc mật khẩu!");';
            echo '    window.location.href = "../php/home.php";';
            echo '</script>';
        }
        // } else {
        // echo "Hãy nhập đầy đủ thông tin!";
    }
}