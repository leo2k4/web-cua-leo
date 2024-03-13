<?php

include "../db/dulieu.php";


function kiemtra()
{
    include_once('../db/connects.php');
    if (isset($_SESSION['username'])) {
        // Sử dụng prepared statement để tránh SQL injection
        $sql5 = "SELECT * FROM users WHERE username LIKE ?";
        $stmt5 = $mysqli->prepare($sql5);

        // Binds parameters
        $stmt5->bind_param("s", $username);
        $username = $_SESSION['username'];

        // Thực thi truy vấn
        $stmt5->execute();
        $result2 = $stmt5->get_result();

        if ($result2->num_rows > 0) {
            return 1;
        } else {
            echo "<script>alert('Chưa đăng nhập'); window.location.href='../php/trangchinh.php';</script>";
            exit();
        }

        // Đóng kết nối và statement
        $stmt5->close();
        $mysqli->close();
    } else {
        echo "Session 'username' không tồn tại";
    }
}


kiemtra();

if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
    // lấy thông tin từ form để tạo đơn

    $total = tongdonhang();
    //lấy thông tin từ session + id đơn hàng 
    //thêm vào bảng giỏ hàng 
    $mabill = madonhang();
    $tongtien = 0;
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $hinh = $_SESSION['giohang'][$i][0];
        $tensp = $_SESSION['giohang'][$i][1];
        $gia = $_SESSION['giohang'][$i][2];
        $soluong = $_SESSION['giohang'][$i][3];
        $tong = $gia * $soluong;
        $tongtien += $tong;
        taodonhang($hinh, $tensp, $gia, $soluong, $tong, $total, $mabill);
    }
    // echo "$tongtien ---";
    // echo "$total";
    // echo " $mabill";
    unset($_SESSION['giohang']);
    //show đơn hàng đã đc đặt 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="../css/bill.css?v= <?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3716b6d6a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="../php/trangchinh.php">
            <h2 class="playerhub">NANH-WORLD</h2>
        </a>
        <div class="khoi2">
            <nav class="navi">
                <a href="../php/about.php">Về Chúng Tôi</a>
                <a href="../php/trangchinh.php">Dịch Vụ</a>
                <a href="../php/contact.php">Liên Hệ</a>
            </nav>
        </div>
        <div class="user-info">
            <p>Xin chào, bạn đang đăng nhập với tư cách: <span id="username">
                    <?php
                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        $_SESSION['username'] = 'Guest!';
                        echo $_SESSION['username'];
                    }
                    ?>
            </p>
            <form id="form-logout" method="post" action="../db/logout.php">
                <button type="submit" class="logout-button" name="logout">
                    <i class="fas fa-right-from-bracket"></i> Quit
                </button>
            </form>
        </div>
        <a href="../php/trangchinh.php" class="home-btn">
            <i class="fa-solid fa-house"></i>
        </a>
    </header>
    <h1>Đơn Hàng Đã Đặt</h1>
    <main>
        <table class="center-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th colspan="">Thành tiền theo đơn</th>
                    <th>Mã Đơn Hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php showdonhang(); ?>
            </tbody>
        </table>
        <div class="aa">
            <button class="a1"><a href="../php/trangchinh.php">Trở về trang chính</a></button>
    </main>
    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>