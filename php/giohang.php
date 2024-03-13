<?php
include "../db/dulieu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/giohangg.css?v= <?php echo time(); ?>">
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
            <a href="../php/bill.php" class="bill-btn">
                <i class="fa-solid fa-table"></i>
            </a>
        </div>
    </header>
    <h1>Giỏ Hàng</h1>
    <main>
        <form action="../php/bill.php" method="post">
            <table class="center-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th colspan="2">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php showgiohang(); ?>
                </tbody>
            </table>
            <div class="aa">
                <input type="submit" value="Đồng ý đặt hàng" name="dongydathang" class="a1">
                <button class="a1"><a href="../php/giohang.php?delgiohang=1">Xóa giỏ hàng</a></button>
                <button class="a1"><a href="../php/trangchinh.php">Tiếp tục đặt hàng</a></button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>