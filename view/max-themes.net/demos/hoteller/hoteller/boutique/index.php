<?php
session_start();
include 'model/pdo.php';
include 'model/loaiphong.php';
include 'model/phong.php';
include 'model/hotro.php';
include 'model/datphong.php';
include 'model/taikhoan.php';
include 'header.php';

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ourrooms':
            if (isset($_GET['idlp'])) {
                $id = $_GET['idlp'];
                $listlp = loadall_loaiphong_ourrooms();
                $listpcungloai = load_phong_cungloai($id);
            } else {
                $listpcungloai = loadall_phong();
                $listlp = loadall_loaiphong_ourrooms();
            }


            include "our-rooms.php";
            break;
        case 'dining':
            include "dining.php";
            break;
        case 'about':
            include "about.php";
            break;
        case 'home':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $ngaydat = $_POST['ngayden'];
                $ngaytra = $_POST['ngaytra'];
                $datphongs = loadall_phongdadat();
                foreach ($datphongs as $datphong) {
                    if ($ngaydat === $datphong['ngayden'] && $ngaytra === $datphong['ngaytra']) {
                        // echo "tìm kiếm của khách có trùng với một số phòng có ngày trả và ngày đến giống với khách tìm kiếm , hiển thị những phòng còn trống";
                        $listpchuadat = loadall_phongchuadat2($ngaydat, $ngaytra);
                    } else if ($ngaydat != $datphong['ngayden'] && $ngaytra != $datphong['ngaytra']) {
                        // echo "Ngày khác ngày trong bảng dặt phòng";
                        $listpchuadat = loadall_phongchuadat();
                    } else if (($ngaydat <= $datphong['ngayden'] && ($datphong['ngayden'] <= $ngaytra && $ngaytra <= $datphong['ngaytra'])) || (($datphong['ngayden'] <= $ngaydat && $ngaydat <= $datphong['ngaytra']) && $ngaytra >= $datphong['ngaytra'])) {
                        // echo "Ngày khác ngày trong bảng dặt phòng jfakdfhkj";
                        $listpchuadat = loadall_phongchuadat3($ngaydat, $ngaytra);
                    }
                }
            }
            include "home.php";
            break;
        case 'contact':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $id = $_POST['id'];
                $name_user = $_POST['name_user'];
                $tel = $_POST['tel'];
                $ghichu = $_POST['ghichu'];
                insert_hotro($id, $name_user, $tel, $ghichu);
                insert_hotro($name_user, $tel, $ghichu);
                $thongbao = "Dữ liệu được gửi thành công!";
            }
            include "contact.php";
            break;
        case 'booknow':
            include "booking-now.php";
            break;
        case 'deluxe':
            include "deluxe-room.php";
            break;
        case 'room':
            $id = $_GET['id'];
            $room = loadone_phong($id);
            if (isset($_POST['datphong']) && ($_POST['datphong'])) {
                if (($_POST['ngayden']) < ($_POST['ngaytra'])) {
                    $id_user = $_SESSION['user']['id_user'];
                    $sokhach = $_POST['sokhach'];
                    $price = $room['price'];
                    $ngayden = $_POST['ngayden'];
                    $ngaytra = $_POST['ngaytra'];
                    $id_phong = $room['id_phong'];
                    $datefirst = strtotime($_POST['ngayden']);
                    $dateout = strtotime($_POST['ngaytra']);
                    $datediff = abs($datefirst - $dateout);
                    $songay = floor($datediff / (60 * 60 * 24));
                    $tongtien = $songay * ($price * 23000);
                    $format_tongtien = number_format($tongtien);
                    insert_datphong($id_phong, $id_user, $sokhach, $ngayden, $ngaytra);
                    $thongbao = "Vui lòng thanh toán trong 24h để đặt phòng!";
                    // if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])){
                    // header('Location:../sandbox/vnpay_php/index.php');
                    // }
                } else {
                    $err = "Vui lòng điền ngày hợp lệ";
                }
            } else {
            }
            include "room.php";
            break;
        case 'comfirm':
            $id = $_GET['id'];
            $room = loadone_phong($id);
            $id_user = $_SESSION['user']['id_user'];
            $sokhach = $_POST['sokhach'];
            $price = $room['price'];
            $ngayden = $_POST['ngayden'];
            $ngaytra = $_POST['ngaytra'];
            $id_phong = $room['id_phong'];
            $datefirst = strtotime($_POST['ngayden']);
            $dateout = strtotime($_POST['ngaytra']);
            $datediff = abs($datefirst - $dateout);
            $songay = floor($datediff / (60 * 60 * 24));
            $tongtien = $songay * ($price * 23000);


            // var_dump(insert_datphong($id_phong, $id_user, $sokhach, $ngayden, $ngaytra));
            include "comfirm.php";
            break;
        case 'thanhtoan':
            include "sandbox/vnpay_php/index.php";
            break;
        case 'tk':
            include "taikhoan/info.php";
            break;
        case 'dangki':
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {

                $user = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $tel = $_POST['phone'];
                $address = $_POST['add'];
                // echo $user,$pass, $email,$tel,$address;
                insert_taikhoan($user, $pass, $email, $tel, $address);
                $thongbao = "Đã đăng kí thành công!.Vui lòng đăng nhập để thực hiện các chức năng";
            }
            include "./taikhoan/dangki.php";
            break;
        case 'capnhat':
            $id = $_POST['id'];
            $user = $_POST['user'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            // echo $id, $user, $password, $email, $address, $tel;
            $update = update_taikhoan($id, $user, $password, $email, $address, $tel);
            $_SESSION['user'] = $update;
            include "home.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                // echo $email;
                $checkemail = checkEmail($email);
                // echo "<pre>";
                // var_dump($checkemail);
                if (isset($checkemail)) {
                    $thongbao = 'Mật khẩu của bạn là ' . $checkemail['password'];
                } else {
                    $thongbao = 'Email này không tồn tại';
                }
            }
            include "./taikhoan/quenmk.php";
            break;
        case 'thoat':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
            }

            include "home.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include 'footer.php';
