<?php
// include_once('../db/connects.php');
session_start();
//xóa giỏ hàng
if (isset($_GET['delgiohang']) && ($_GET['delgiohang'] == 1)) unset($_SESSION['giohang']);
//xóa sản phầm tử giỏ hàng
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
// lấy dữ liệu từ form
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $hinh = $_POST['hinh'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    //kiểm tra sản phẩm có trong giỏ hàng hay không 
    $fl = 0; // kiểm tra sản phẩm đã có trong giỏ hàng hay chưa, có thì trả về 1

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;
        }
    }


    if ($fl == 0) {
        // thêm mới sản phẩm vào giỏ hàng 
        $sp = [$hinh, $tensp, $gia, $soluong];
        $_SESSION['giohang'][] = $sp;
        // var_dump($_SESSION['giohang']);
    }
}

function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        if (sizeof($_SESSION['giohang']) > 0) {
            $tong = 0;
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong += $tt;
                echo '<tr>
            <td>' . ($i + 1) . '</td>
            <td><img src="' . $_SESSION['giohang'][$i][0] . '"></td>    
            <td>' . $_SESSION['giohang'][$i][1] . '</td>
            <td>' . $_SESSION['giohang'][$i][2] . '</td>
            <td>' . $_SESSION['giohang'][$i][3] . '</td>
            <td>
            <div>' . $tt . '</div>
            </td>
            <td> <a href="giohang.php?delid=' . $i . '">Xóa</a>
            </td>
</tr>';
            }
            echo '<tr>
        <th colspan="5"> Tổng đơn hàng </th>
        <th colspan="2">
        <div>' . $tong . '</div>
        </th>
        </tr>';
        } else {
            echo '<td class="cdn" colspan="6">Giỏ hàng trống</td>';
        }
    }
}


function showdonhang()
{
    $mysqli = new mysqli("localhost", "root", "", "quan_ly_thong_tin");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    $username = $_SESSION['username'];

    $sql2 = "SELECT * FROM bill WHERE users_id IN (SELECT users_id FROM users WHERE username = '$username')";
    $result2 = $mysqli->query($sql2);

    if ($result2->num_rows > 0) {
        $i = 1; // Khởi tạo biến i

        while ($row = $result2->fetch_assoc()) {
            $hinh = $row['hinh'];
            $tensp = $row['ten'];
            $gia = $row['gia'];
            $soluong = $row['soluong'];
            // $tongdonhang = $row['tong'];
            $tt = $row['tongtien'];
            $mah = $row['id_bill'];

            echo '<tr>
                <td>' . $i . '</td>
                <td>
                    <img src="' . $hinh . '" alt="' . $hinh . '">
                </td>
                <td>' . $tensp . '</td>
                <td>' . $gia . '</td>
                <td>' . $soluong . '</td>
                <td>
                    <div>' . $tt . '</div>
                </td>
                <td>' . $mah . '</td>
            </tr>';

            $i++; // Tăng giá trị i sau mỗi lần lặp
        }

        echo '<tr>
            <th colspan="7"> Các đơn đã đặt </th>
            </tr>';
    } else {
        echo '<td class="cdn" colspan="7">Giỏ hàng trống</td>';
    }
}

function tongdonhang()
{
    $tong = 0;
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        if (sizeof($_SESSION['giohang']) > 0) {

            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong += $tt;
            }
        }
    }
    return $tong;
}

function madonhang()
{
    $mysqli = new mysqli("localhost", "root", "", "quan_ly_thong_tin");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    $username = $_SESSION['username'];

    // Lấy user_id của người dùng từ bảng users
    $user_query = "SELECT users_id FROM users WHERE username = '$username'";
    $user_result = $mysqli->query($user_query);
    $min = 100;
    $max = 10000;
    $randomNumber = random_int($min, $max);

    if ($user_result) {
        $user_row = $user_result->fetch_assoc();
        $user_id = $user_row['users_id'];

        $ma = 0;
        if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
            if (sizeof($_SESSION['giohang']) > 0) {

                for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                    $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $ma += ($tt + 1772004 * 4  + $user_id + $randomNumber);
                }
            }
        }
        return $ma;
    }
}



function taodonhang($hinh, $tensp, $gia, $soluong, $tong, $total, $mabill)
{
    $mysqli = new mysqli("localhost", "root", "", "quan_ly_thong_tin");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    $username = $_SESSION['username'];

    // Lấy user_id của người dùng từ bảng users
    $user_query = "SELECT users_id FROM users WHERE username = '$username'";
    $user_result = $mysqli->query($user_query);

    if ($user_result) {
        $user_row = $user_result->fetch_assoc();
        $user_id = $user_row['users_id'];

        // Thêm đơn hàng vào bảng bill
        $order_query = "INSERT INTO bill (users_id, hinh, ten, gia, soluong, tong, tongtien, id_bill) VALUES ('$user_id', '$hinh', '$tensp', '$gia', '$soluong', '$tong','$total','$mabill')";
        $result = $mysqli->query($order_query);
        if ($result) {
            return 1;
        } else {
            echo "Lỗi khi thêm đơn hàng: " . $mysqli->error;
            return 0;
        }
    } else {
        echo "Lỗi khi truy vấn user_id: " . $mysqli->error;
        return 0;
    }

    // Đóng kết nối
    $mysqli->close();
}

function ketnoidb()
{

    $mysqli = new mysqli("localhost", "root", "", "quan_ly_thong_tin");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
}
