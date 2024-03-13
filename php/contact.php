<?php

include "../db/dulieu.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="../css/contact.css?v= <?php echo time(); ?>">
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
    <div class="khung">
        <section id="contact">
            <h2>Liên Hệ</h2>
            <p>Bạn có thể liên hệ với chúng tôi qua thông tin dưới đây:</p>
            <ul>
                <li class="email"> <i class="fa-regular fa-envelope"></i> Email: abcad@gmail.com</li>
                <li class="phone"><i class="fa-solid fa-mobile"></i> Hotline: +84 123 456 789</li>
                <li class="fb"><i class="fa-brands fa-facebook"></i> Fanpage: NANH WORLD</li>
            </ul>
        </section>
    </div>
    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>