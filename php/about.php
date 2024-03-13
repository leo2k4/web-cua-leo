<?php
// Bắt đầu hoặc khôi phục một phiên làm việc
include_once('../db/connects.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi</title>
    <link rel="stylesheet" href="../css/aboutt.css?v= <?php echo time(); ?>">
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
    <div class="aboutwe">
        <p class="diachi">Địa chỉ:</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.0527444810086!2d105.80472787472942!3d21.583864168482684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31352738b1bf08a3%3A0x515f4860ede9e108!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiAmIFRydXnhu4FuIHRow7RuZyBUaMOhaSBOZ3V5w6pu!5e0!3m2!1svi!2s!4v1703781913834!5m2!1svi!2s" width="560" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="mota">
            <p class="p1">Giới Thiệu Về Cửa Hàng:</p>
            <p class="p2">"Chào mừng đến với Nanh-World, nơi tinh tế hòa quyện giữa ẩm thực độc đáo và không gian thoải
                mái. Chúng
                tôi tự hào mang đến cho khách hàng những trải nghiệm ẩm thực độc đáo và đa dạng với các món ăn ngon,
                phong cách phục vụ chuyên nghiệp và không gian ấm cúng. Hãy đồng hành cùng chúng tôi để khám phá thế
                giới ẩm thực đầy sáng tạo và hấp dẫn!"</p>
            <p class="p1">Đội Ngũ Nhân Viên:</p>
            <p class="p2">"Đội ngũ nhân viên tại Nanh-World không chỉ là những chuyên gia chăm sóc khách hàng mà còn là
                đồng đội
                thân thiện và nhiệt huyết. Với sứ mệnh phục vụ tận tâm, chúng tôi cam kết mang đến cho bạn trải nghiệm
                mua sắm và ẩm thực tuyệt vời nhất. Sự am hiểu về sản phẩm, sự nhiệt huyết và sự chuyên nghiệp là những
                giá trị cốt lõi mà đội ngũ của chúng tôi hướng đến, để đảm bảo mỗi lượt ghé thăm của bạn là một hành
                trình đáng nhớ."</p>
            <p class="p1">Thời Gian Hoạt Động:</p>
            <p class="p2">"Cửa hàng Nanh-World mở cửa từ thứ Hai đến Chủ Nhật, đảm bảo cung cấp dịch vụ cho bạn mỗi ngày
                trong
                tuần. Thời gian linh hoạt và tiện ích giúp bạn dễ dàng ghé thăm chúng tôi bất cứ lúc nào trong khoảng
                thời gian hoạt động. Chúng tôi cam kết mang đến cho bạn không gian ấm cúng và thân thiện, nơi bạn có thể
                thưởng thức đồ ăn và nước uống ngon miệng cùng với dịch vụ chăm sóc khách hàng tận tâm."</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>