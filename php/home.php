<?php
include_once('../db/connects.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng kí đăng nhập</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://kit.fontawesome.com/d3716b6d6a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/homee.css?v= <?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css" />
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
        <div class="khoi3">
            <button class="btn-login">Đăng nhập</button>
            <div>
    </header>
    <div class="wrapper">
        <span class="icon-close">
            <i class="fa-solid fa-xmark"></i>
        </span>
        <div class="box-login login">
            <form action="../db/login.php" id="form-login" method="post" onsubmit=" return validation(this);">
                <h2 class="dau">Đăng nhập</h2>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input name="email" type="text" class="loginn" autocomplete="off">
                    <label for="">Email</label>
                </div>
                <p id="errorEmail" class=""> </p>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input name="password" type="password" class="loginn" autocomplete="off">
                    <label for="">Mật khẩu</label>
                </div>
                <p id="errorPassword" class=""></p>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Ghi nhớ
                    </label>
                    <a href="">Quên Mật Khẩu?</a>
                </div>
                <div class="btn">
                    <input type="submit" value="Đăng nhập" class="form-submid" name="reg">
                </div>
                <div class="last">
                    <p>Chưa có tài khoản? </p>
                    <span class="separator"></span>
                    <a href="#" class="register-link"> Đăng kí</a>
                </div>
            </form>
        </div>
        <div id="reggi" class="box-register register">
            <form action="../db/register.php" id="" method="post" onsubmit=" return validationn(this);">
                <h2 class="dau">Đăng kí</h2>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input name="username" type="text" class="login" autocomplete="off">
                    <label for="">Tên đăng nhập</label>
                </div>
                <p id="errorUsername1" class=""> </p>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input name="email" type="text" class="login" autocomplete="off">
                    <label for="">Email</label>
                </div>
                <p id="errorEmail1" class=""> </p>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input name="password" type="password" class="login">
                    <label for="">Mật khẩu</label>
                </div>
                <p id="errorPassword1" class=""> </p>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Tôi đồng ý với các điều khoản
                    </label>
                </div>
                <div class="btn">
                    <input type="submit" value="Đăng kí" class="form-submid" name="reg1">
                </div>
                <div class="last">
                    <p>Đã có tài khoản? </p>
                    <span class="separator"></span>
                    <a href="#" class="login-link">Đăng nhập</a>
                </div>

            </form>
        </div>
    </div>

    <script src="../js/scriptt.js"></script>
</body>

</html>