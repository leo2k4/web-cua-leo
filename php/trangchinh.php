<?php
//Kết nối csdl
include_once('../db/connects.php');
session_start();
$sql = "SELECT * FROM foods";
$result = $mysqli->query($sql);
$sql1 = "SELECT * FROM drinks";
$result1 = $mysqli->query($sql1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch Vụ</title>
    <link rel="stylesheet" href="../css/trangchinh.css?v= <?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3716b6d6a.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="headder">
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
                <form id="form-user" method="post" action="../php/user.php">
                    <button type="submit" class="user-button" name="user">
                        <i class="fa-solid fa-user"></i>
                    </button>
                </form>
                <a href="../php/bill.php" class="bill-btn">
                    <i class="fa-solid fa-table"></i>
                </a>

            </div>
        </header>
    </div>
    <div class="infor-shop"></div>
    <section class="foods">
        <p class="mota">Đồ ăn:</p>
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="food-item">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                <h3>
                    <?php echo $row['name']; ?>
                </h3>
                <p>
                    <?php echo $row['description']; ?>
                <div class="khoimua">
                    <p>
                        <span class="donvi">đ</span><span class="giatien"><?php echo $row['price']; ?></span>
                    </p>
                    <form action="giohang.php" method="post">
                        <input type="number" name="soluong" min="1" max="10" value="1" class="btn-soluong">
                        <input type="submit" name="addcart" value="Mua" class="btn-addcart">
                        <input type="hidden" name="tensp" value=" <?php echo $row['name']; ?>">
                        <input type="hidden" name="gia" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="hinh" value="<?php echo $row['image_url']; ?>">
                    </form>
                </div>
            </div>
            <?php
                }
            } else {
                echo "Không có thức ăn nào.";
            }
            ?>
        </div>
    </section>
    <section class="foods">
        <p class="mota">Đồ uống:</p>
        <div class="container">
            <?php
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
            ?>
            <div class="food-item">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                <h3>
                    <?php echo $row['name']; ?>
                </h3>
                <p>
                    <?php echo $row['description']; ?>
                </p>
                <div class="khoimua">
                    <p>
                        <span class="donvi">đ</span><span class="giatien"><?php echo $row['price']; ?></span>
                    </p>
                    <form action="giohang.php" method="post">
                        <div class="cc">
                            <input type="number" name="soluong" min="1" max="10" value="1" class="btn-soluong">
                            <input type="submit" name="addcart" value="Mua" class="btn-addcart">
                            <input type="hidden" name="tensp" value=" <?php echo $row['name']; ?>">
                            <input type="hidden" name="gia" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="hinh" value="<?php echo $row['image_url']; ?>">
                        </div>
                    </form>
                </div>
            </div>
            <?php
                }
            } else {
                echo "Không có thức ăn nào.";
            }
            ?>
        </div>
    </section>
    <button class="icon" onclick="addToCart()">
        <i class="fa-solid fa-cart-shopping"></i>
    </button>
    <button class="scrollToTopBtn" onclick="scrollToTop()">
        <i class="fa-solid fa-up-long"></i>
    </button>

    <footer>
        <p>&copy; 2023 Shop bán đồ ăn và nước uống</p>
        <p>Design by PTN</p>
    </footer>
</body>

</html>

<script>
function scrollToTop() {
    document.documentElement.scrollTop = 0;
}


function addToCart() {
    window.location.href = "giohang.php";
}
</script>