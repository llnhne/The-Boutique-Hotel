<?php
include 'header.php';
include 'model/pdo.php';
include 'model/loaiphong.php';
include 'model/phong.php';
include 'model/hotro.php';
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ourrooms':
            
            $listlp=loadall_loaiphong_ourrooms();
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
        case 'room':
            include "room.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include 'footer.php';
