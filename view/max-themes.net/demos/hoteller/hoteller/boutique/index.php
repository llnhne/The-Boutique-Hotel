<?php
ob_start();
session_start();
include 'model/pdo.php';
include 'model/loaiphong.php';
include 'model/phong.php';
include 'model/hotro.php';
include 'model/datphong.php';
include 'model/taikhoan.php';
include 'model/binhluan.php';
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
                // echo $ngaydat;
                // echo $ngaytra;
                $datphongs = loadall_phongdadat();
                foreach ($datphongs as $datphong) {
                    if (($ngaydat < $datphong['ngayden'] && $ngaytra === $datphong['ngayden']) || ($ngaytra > $datphong['ngaytra'] && ($ngaydat === $datphong['ngaytra']))) {
                        $listpchuadat = loadall_phongchuadat();
                    } else if ((($ngaydat < $datphong['ngayden'] && $ngaytra > $datphong['ngaytra'])) || ($ngaydat > $datphong['ngayden'] && $ngaytra > $datphong['ngaytra'])) {
                        $listpchuadat = loadall_phongchuadat();
                    } else if (($ngaydat === $datphong['ngayden'] && $ngaytra === $datphong['ngaytra'])) {
                        $listpchuadat = loadall_phongchuadat1($ngaydat, $ngaytra);
                    } else if ($ngaydat === $datphong['ngayden'] || $ngaytra === $datphong['ngaytra']) {
                        $listpchuadat = loadall_phongchuadat2($ngaydat, $ngaytra);
                    } else if ($ngaydat > $datphong['ngayden'] && $ngaytra < $datphong['ngaytra']) {
                        $listpchuadat = loadall_phongchuadat3($ngaydat, $ngaytra);
                    } else if ((($ngaydat > $datphong['ngayden'] && $ngaydat < $datphong['ngaytra']) && $ngaytra > $datphong['ngaytra']) || ($ngaydat < $datphong['ngayden'] && ($ngaytra > $datphong['ngayden'] && $ngaytra < $datphong['ngaytra']))) {
                        $listpchuadat = loadall_phongchuadat();
                    }
                }
            }
            include "home.php";
            break;
        case 'contact':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $name_user = $_POST['name_user'];
                $tel = $_POST['tel'];
                $ghichu = $_POST['ghichu'];
                if (preg_match('/^[0-9]{10}+$/', $tel)) {
                    insert_hotro($name_user, $tel, $ghichu);
                    $thongbao = "Gửi thành công!";
                } else {
                    $errtel = "Nhập số điện thoại không hợp lệ";
                }
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
            $listbl = load_binhluan($id);
            $sql = "select * from datphong where id_phong=$id";
            $datphongs = pdo_query($sql);
            if (isset($_POST['datphong']) && ($_POST['datphong'])) {
                $ngayden = $_POST['ngayden'];
                $ngaytra = $_POST['ngaytra'];
                $check = true;
                false;
                foreach ($datphongs as $dp) {
                    if ($dp['ngayden'] > $ngaytra || $dp['ngaytra'] < $ngayden) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                }
                // if (isset($_POST['ngayden']) < ($_POST['ngaytra'])) {
                if ($check == true) {
                    $id_user = $_SESSION['user']['id_user'];
                    $sokhach = $_POST['sokhach'];
                    $price = $room['price'];
                    $id_phong = $room['id_phong'];
                    $datefirst = strtotime($_POST['ngayden']);
                    $dateout = strtotime($_POST['ngaytra']);
                    $datediff = abs($datefirst - $dateout);
                    $songay = floor($datediff / (60 * 60 * 24));
                    $tongtien = $songay * $price;
                    $giaodich = '';
                    $format_tongtien = number_format($tongtien);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('m/d/Y h:i:s a', time());
                    // $hr  = floor(($rem % 86400) / 3600);
                    // $min = floor(($rem % 3600) / 60);
                    // $sec = ($rem % 60);
                    insert_datphong($id_phong, $id_user, $sokhach, $ngayden, $ngaytra, $tongtien, $giaodich);
                    $thongbao = "Vui lòng thanh toán trong 24h để đặt phòng!";
                } else {
                    $thongtin = "Đã có người đặt trước đó. Vui lòng đặt ngày khác!!!";
                }
                // }else{
                //     $errdate ="Ngày nhập không hợp lệ";
                // }
            }
            include "room.php";
            break;
        case 'thanhtoan':
            $idp = $_GET['idp'];
            $sql = "select * from datphong where id_phong = $idp";
            $dp = pdo_query_one($sql);
            $idorder = $dp['id_order'];
            $tongtien = $dp['tongtien'];
            if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                header("location: http://localhost/duan1/view/max-themes.net/demos/hoteller/hoteller/boutique/vnpay_php/index.php?idorder=$idorder");
            }
            include "room.php";
            break;
        case 'hoadon':
            $tongtien = $_POST['amount'];
            $id = $_GET['idorder'];
            insert_hoadon($id, $id_phong, $id_user, $tongtien, $role);
            include 'vnpay_php/index.php';
            break;
        case 'binhluan':
            $iduser = $_POST['iduser'];
            $idroom = $_POST['idroom'];
            $noidung = $_POST['comment'];
            $date = getdate();
            $ngaybinhluan = $date['year'] . "/" . $date['mon'] . "/" . $date['mday'];
            insert_binhluan($noidung, $iduser, $ngaybinhluan, $idroom);
            header("location:http://localhost/duan1/view/max-themes.net/demos/hoteller/hoteller/boutique/index.php?act=room&id=$idroom");
            break;
        case 'suabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadone_taikhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;
        case 'updatebl':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                update_taikhoan($id, $user, $password, $email, $address, $tel);
                $thongbao = "Cập nhật thành công!";
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/list.php";
            break;
        case 'xoabl':
            $idroom = $_GET['idp'];
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            // $listbl = load_binhluan($id);
            header("location:http://localhost/duan1/view/max-themes.net/demos/hoteller/hoteller/boutique/index.php?act=room&id=$idroom");
            break;
        case 'tk':
            include "taikhoan/info.php";
            break;
            // sua lai dang ki
        case 'dangki':
            $error = array();
            $data = array();
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                $data['username'] = isset($_POST['username']) ? $_POST['username'] : '';
                $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
                $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
                $data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
                $data['add'] = isset($_POST['add']) ? $_POST['add'] : '';
                if (empty($data['username'])) {
                    $error['username'] = 'Vui lòng nhập tên';
                }
                if (empty($data['email'])) {
                    $error['email'] = 'Vui lòng nhập địa chỉ email email';
                }
                if (empty($data['password'])) {
                    $error['password'] = 'Vui lòng nhập mật khẩu';
                }
                if (empty($data['phone'])) {
                    $error['phone'] = 'Vui lòng nhập số điện thoại';
                }
                if (empty($data['add'])) {
                    $error['add'] = 'Vui lòng nhập địa chỉ';
                }
                if (!$error) {
                    $user = $_POST['username'];
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $tel = $_POST['phone'];
                    $address = $_POST['add'];
                    $sql = "select * from taikhoan";
                    $listtaikhoan = pdo_query($sql);
                    $check = false;
                    foreach ($listtaikhoan as $taikhoan) {
                        if ($taikhoan['username'] == $user && $taikhoan['password'] == $pass) {
                            $check = true;
                        } else {
                            $check = false;
                        }
                    }
                    if ($check === true) {
                        $thongbao = "Tài khoản đã tồn tại!";
                    } else if ($check === false) {
                        insert_taikhoan($user, $pass, $email, $tel, $address);
                        header("location:http://localhost/duan1/view/max-themes.net/demos/hoteller/hoteller/boutique/taikhoan/dangnhap.php");
                    }
                }
            }
            include "taikhoan/dangki.php";
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
