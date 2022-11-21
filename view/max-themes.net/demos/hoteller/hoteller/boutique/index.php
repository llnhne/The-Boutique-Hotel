<?php
include 'header.php';
include '../../../../../../model/pdo.php';
include '../../../../../../model/hotro.php';

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ourrooms':
            include "our-rooms.php";
            break;
        case 'dining':
            include "dining.php";
            break;
        case 'about':
            include "about.php";
            break;
        case 'contact':
            if(isset($_POST['submit'])&&($_POST['submit'])){           
                $name_user = $_POST['name_user'];
                $tel = $_POST['tel'];
                $ghichu = $_POST['ghichu'];
                $data['tel']= isset($_POST['tel'])? $_POST['tel']:'';
                insert_hotro($name_user,$tel,$ghichu);

            }
            include "contact.php";
            break;
        case 'booknow':
            include "booking-now.php";
            break;
        case 'deluxe':
            include "deluxe-room.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include 'footer.php';
