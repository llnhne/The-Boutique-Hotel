<?php
session_start();
include 'header.php';
include 'model/pdo.php';
include 'model/loaiphong.php';
include 'model/phong.php';
include 'model/datphong.php';
include 'model/hotro.php';
include 'model/taikhoan.php';

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
        case 'contact':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $name_user = $_POST['name_user'];
                $tel = $_POST['tel'];
                $ghichu = $_POST['ghichu'];
                if (empty($tel)) {
                    $errname = "Vui lòng điền số điện thoại !";
                } else {
                    insert_hotro($name_user, $tel, $ghichu);
                    $thongbao = "Dữ liệu được gửi thành công!";
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
            
            
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                
                $id_user=$_SESSION['user']['id_user'];
                $sokhach = $_POST['sokhach'];
               
                $price=$_POST['price'];
                $ngayden = $_POST['ngayden'];
                $ngaytra = $_POST['ngaytra'];
                $id=$room['id_phong'];
                // $ngayden = strtotime('ngayden');
                // $ngaytra = strtotime('ngaytra');
                // $datediff = abs ($ngayden - $ngaytra);
                // $songay = floor($datediff / (60*60*24));
                // $tongtien = $songay * $price;
                insert_datphong($id, $id_user, $sokhach, $ngayden, $ngaytra);
                
                $thongbao = "Đặt phòng thành công!";
        } else {
            $thongbao = "Thất bại";
        }
            $id = $_GET['id'];
            $room = loadone_phong($id);
            include "room.php";
            break;
        // case 'comfirm':
        //     if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
        //         $sokhach = $_POST['sokhach'];
        //         $name_phong=$_POST['name_phong'];
        //         $price=$_POST['price'];
        //         $ngayden = strtotime('ngayden');
        //         $ngaytra = strtotime('ngaytra');
        //         $datediff = abs ($ngayden - $ngaytra);
        //         $songay = floor($datediff / (60*60*24));
        //         $tongtien = $songay * $price;
        //         $ngayden = $_POST['ngayden'];
        //         $ngaytra = $_POST['ngaytra'];
        //         insert_datphong($id_phong, $id_user, $sokhach, $ngayden, $ngaytra);
        //         $thongbao = "Đặt phòng thành công!";
        //         // var_dump(insert_datphong($id_phong, $id_user, $sokhach, $ngayden, $ngaytra));
        //     }
        //     include "comfirm.php";
        //     break;
        case 'tk':
            include "taikhoan/info.php";
            break;
        case 'timkiem':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $ngayden = $_POST['ngayden'];
                $ngaytra = $_POST['ngaytra'];

                $datphong = loadall_datphong();
                foreach ($datphong as $item) {
                    $id_datphong = $item['id_phong'];
                    extract($datphong);
                    if ((($ngayden === $ngayden) || ($ngaytra === $ngaytra)) && (($ngayden === $ngayden) || ($ngaytra <= $ngaytra)) && (($ngayden <= $ngayden) || ($ngaytra <= $ngaytra))) {
                        $listsearch = loadall_datphong_timkiem($id_datphong);
                        echo "<pre>";
                        var_dump($listsearch);
                    } else if ((($ngayden === $ngayden) || ($ngaytra < $ngaytra)) && (($ngayden) || ($ngaytra === $ngaytra)) && (($ngayden > $ngayden) || ($ngaytra < $ngaytra))) {
                        $listsearch = loadall_datphong_timkiem($id_datphong);
                        echo "<pre>";
                        var_dump($listsearch);
                    }
                }
            }

            break;
        case 'dangki':
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                $user = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $tel = $_POST['phone'];
                $address = $_POST['add'];
                // echo $user,$pass, $email,$tel,$address;
                insert_taikhoan($user, $email, $pass, $tel, $address);
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
            session_unset();
            include "home.php";
            break;
        case 'home':
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
