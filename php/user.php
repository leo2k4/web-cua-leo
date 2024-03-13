<?php
session_start();
// Kiểm tra và hiển thị thông tin
function showuser()
{
    include_once('../db/connects.php');

    // Kiểm tra xem session 'username' có tồn tại không để tránh lỗi SQL injection
    if (isset($_SESSION['username'])) {
        // Sử dụng prepared statement để tránh SQL injection
        $sql2 = "SELECT * FROM users WHERE username LIKE ?";
        $stmt = $mysqli->prepare($sql2);

        // Binds parameters
        $stmt->bind_param("s", $username);
        $username = $_SESSION['username'];

        // Thực thi truy vấn
        $stmt->execute();
        $result2 = $stmt->get_result();

        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $fullName = $row['full_name'];
                $address = $row['address'];
                $phone = $row['phone'];

                echo '<tr>
                <td>' . ($fullName ? $fullName : "Chưa nhập thông tin") . '</td>
                <td>' . ($address ? $address : "Chưa nhập thông tin") . '</td>
                <td>' . ($phone ? $phone : "Chưa nhập thông tin") . '</td>
                </tr>';
            }
        } else {
            echo '<td class="cdn" colspan="3">Bạn chưa đăng nhập</td>';
        }

        // Đóng kết nối và statement
        $stmt->close();
        $mysqli->close();
    } else {
        echo "Session 'username' không tồn tại";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
    <link rel="stylesheet" href="../css/userr.css?v= <?php echo time(); ?>">
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
            <a href="../php/trangchinh.php" class="home-btn">
                <i class="fa-solid fa-house"></i>
            </a>

        </div>
    </header>

    <div class="show-user">
        <table class="center-table">
            <thead>
                <tr>
                    <th>Họ Và Tên</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php showuser(); ?>
            </tbody>
        </table>

    </div>
    <div class="cc1">
        <form class="show-input" method="post" action="../db/process_user_info.php">
            <label for="full_name">Họ và Tên:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="address">Địa Chỉ:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Số Điện Thoại:</label>
            <input type="text" id="phone" name="phone" required>

            <button type="submit">Lưu Thông Tin</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>