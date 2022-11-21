<?php
session_start();
include 'header.php';
include 'model/pdo.php';
include 'model/loaiphong.php';
include 'model/phong.php';
include 'model/hotro.php';

if((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ourrooms':
            $id=$_GET['idlp'];
            $listlp=loadall_loaiphong_ourrooms($id);
            $listp=loadall_phong();
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
                $id = $_POST['id'];
                $name_user = $_POST['name_user'];
                $tel = $_POST['tel'];
                $ghichu = $_POST['ghichu'];

                insert_hotro($id, $name_user, $tel, $ghichu);
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
            include "room.php";
            break;
        case 'dangki':
            if(isset($_POST['dangki']) && ($_POST['dangki'])){

                $user = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $tel = $_POST['phone'];
                $address = $_POST['add'];
                // echo $user,$pass, $email,$tel,$address;
                insert_taikhoan($user,$email,$pass,$tel, $address);
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
            if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                $email = $_POST['email'];
                // echo $email;
                $checkemail = checkEmail($email);
                // echo "<pre>";
                // var_dump($checkemail);
                if(isset($checkemail)){
                    $thongbao = 'Mật khẩu của bạn là '.$checkemail['password'];
                }else{
                    $thongbao = 'Email này không tồn tại';
                }
               
            }
            include "./taikhoan/quenmk.php";
            break;
        case 'thoat':
            if (isset($_SESSION['user'])){
                unset($_SESSION['user']);
            } 
            
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

