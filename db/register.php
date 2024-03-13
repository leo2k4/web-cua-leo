<?php
require '../db/connects.php';
session_start();

if (isset($_POST['reg1'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sqlCheckUsername = "SELECT * FROM users WHERE username = '$username'";
    $resultCheckUsername = $mysqli->query($sqlCheckUsername);

    $sqlCheckEmail = "SELECT * FROM users WHERE email = '$email'";
    $resultCheckEmail = $mysqli->query($sqlCheckEmail);

    if ($resultCheckEmail->num_rows > 0) {
        echo '<script>';
        echo '    alert("Email đã được sử dụng!");';
        echo '    window.location.href = "../php/home.php";';
        echo '</script>';
    } elseif ($resultCheckUsername->num_rows > 0) {
        echo '<script>';
        echo '    alert("Tên đăng nhập đã tồn tại!");';
        echo '    window.location.href = "../php/home.php";';
        echo '</script>';
    } else {
        // Tiến hành đăng ký
        $password = $_POST['password'];
        $hashed_password = md5($password);

        if (!empty($username) && !empty($password) && !empty($email)) {
            $sqlInsertUser = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if ($mysqli->query($sqlInsertUser) === TRUE) {
                $_SESSION['username'] = $username;
                echo '<script>';
                echo '    alert("Đăng ký thành công!");';
                echo '    window.location.href = "../php/trangchinh.php";';
                echo '</script>';
            } else {
                echo "Lỗi: " . $mysqli->error;
            }
        } else {
            echo "Hãy nhập đầy đủ thông tin!";
        }
    }

    // Đóng kết nối sau khi sử dụng
    $mysqli->close();
}
