<?php
session_start();
ob_start();
// if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {

    include "../model/pdo.php";
    include "../model/loaiphong.php";
    include "../model/phong.php";
    include "../model/datphong.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "../model/hoadon.php";
    include "../model/taikhoan.php";
    include "../model/hotro.php";
    include "header.php";
    // controller
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'addlp':
                $error = array();
                $data = array();
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    // Lấy dữ liệu
                    $data['tenloaiphong'] = isset($_POST['tenloaiphong']) ? $_POST['tenloaiphong'] : '';
                    if (empty($data['tenloaiphong'])) {
                        $error['tenloaiphong'] = 'Bạn chưa nhập tên';
                    }
                    if (!$error) {
                        $tenloaiphong = $_POST['tenloaiphong'];
                        insert_loaiphong($tenloaiphong);
                        $thongbao = "Thêm mới thành công!";
                    }
                }
                include "loaiphong/add.php";
                break;
            case 'listlp':
                $listlp = loadall_loaiphong();
                include "loaiphong/list.php";
                break;
            case 'xoalp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_loaiphong($_GET['id']);
                }
                $listlp = loadall_loaiphong();
                include "loaiphong/list.php";
                break;
            case 'sualp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $lp = loadone_loaiphong($_GET['id']);
                }
                include "loaiphong/update.php";
                break;
            case 'updatelp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloaiphong = $_POST['tenloaiphong'];
                    $id = $_POST['id'];
                    update_loaiphong($id, $tenloaiphong);
                    $thongbao = "Cập nhật thành công!";
                }
                $listlp = loadall_loaiphong();
                include "loaiphong/list.php";
                break;
                // phong
            case 'addp':
                //kiem tra xem ng dung co click vao nut add k
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenphong = $_POST['tenphong'];
                    $gia = $_POST['gia'];
                    $giasale = $_POST['giasale'];
                    $sokhach = $_POST['sokhach'];
                    $mota = $_POST['mota'];
                    $idlp = $_POST['idlp'];
                    $img = $_FILES['img']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    if (empty($tenphong)) {
                        $errname = "Vui lòng điền tên phòng !";
                    }
                    if (empty($sokhach)) {
                        $errsokhach = "Vui lòng điền số khách !";
                    }
                    if (empty($gia)) {
                        $errgia = "Vui lòng không bỏ trống giá tiền !";
                        // }
                        // if (empty($thongbao)) {
                        //     $thongbao = "Vui lòng không bỏ trống * !";
                    } else {
                        insert_phong($tenphong, $gia, $giasale, $sokhach, $img, $mota, $idlp);
                        $thongbao = "Thêm mới thành công!";
                    }
                }
                $listlp = loadall_loaiphong();
                include "phong/add.php";
                break;
            case 'listp':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $kyw = $_POST['kyw'];
                    $idlp = $_POST['idlp'];
                } else {
                    $kyw = '';
                    $idlp = 0;
                }
                $listlp = loadall_loaiphong();
                $listp = loadall_phong($kyw, $idlp);
                include "phong/list.php";
                break;
            case 'xoap':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_phong($_GET['id']);
                }
                $listp = loadall_phong("", 0);
                include "phong/list.php";
                break;
            case 'suap':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $phong = loadone_phong($_GET['id']);
                }
                $listlp = loadall_loaiphong();
                include "phong/update.php";
                break;
            case 'updatep':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tenphong = $_POST['tenphong'];
                    $gia = $_POST['gia'];
                    $giasale = $_POST['giasale'];
                    $sokhach = $_POST['sokhach'];
                    $mota = $_POST['mota'];
                    $idlp = $_POST['idlp'];
                    $img = $_FILES['img']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }
                update_phong($id, $tenphong, $gia, $giasale, $sokhach, $img, $mota, $idlp);
                $thongbao = "Cập nhật thành công!";
                $listlp = loadall_loaiphong();
                $listp = loadall_phong($kyw = "", $idlp = 0);
                include "phong/list.php";
                break;
            case 'searchp':
               
            case 'listdp':
                $listdp = loadall_datphong();
                update_tinhtrang();
                include "datphong/list.php";
                break;
    
            case 'suadp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dp = loadone_datphong($_GET['id']);
                }
                include "datphong/update.php";
                break;
            case 'updatedp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $maphong = $_POST['maphong'];
                    $makhachhang = $_POST['makhachhang'];
                    $tinhtrang = $_POST['tinhtrang'];
                    $sokhach = $_POST['sokhach'];
                    $ngayden = $_POST['ngayden'];
                    $ngaytra = $_POST['ngaytra'];
                    $tongtien = $_POST['tongtien'];
                    $giaodich=$_POST['giaodich'];
                    update_datphong($id, $maphong, $makhachhang, $sokhach, $ngayden, $ngaytra,$tongtien,$giaodich, $tinhtrang);
                    $thongbao = "Cập nhật thành công!";
                }
                $listdp = loadall_datphong();
                include "datphong/list.php";
                break;
            case 'xoadp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_datphong($_GET['id']);
                }
                $listdp = loadall_datphong();
                include "datphong/list.php";
                break;
                case 'dskh':
                    if (isset($_POST['gui']) && ($_POST['gui'])) {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = '';
                    }
                    $listtaikhoan = loadall_taikhoan($kyw);
                    include "taikhoan/list.php";
                    break;
                case 'xoatk':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        delete_taikhoan($_GET['id']);
                    }
                    $listtaikhoan = loadall_taikhoan("", 0);
                    include "taikhoan/list.php";
                    break;
                case 'suatk':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $tk = loadone_taikhoan($_GET['id']);
                    }
                    include "taikhoan/update.php";
                    break;
                case 'updatetk':
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
          
            case 'listhd':
                $listhoadon = loadall_hoadon();
                include "hoadon/list.php";
                break;
            case 'xoahd':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_hoadon($_GET['id']);
                }
                $listhoadon = loadall_hoadon();
                include "hoadon/list.php";
                break;
            case 'listbl':
                $listbinhluan = loadall_binhluan();
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan();
                include "binhluan/list.php";
                break;
            case 'dsht':
                $listhotro = loadall_hotro(0);
                include "hotro/list.php";
                break;
            case 'xoaht':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_hotro($_GET['id']);
                }
                $listhotro = loadall_hotro(0);
                include "hotro/list.php";
                break;
            case 'thongke':
                $listthongke = loadall_thongke_loaiphong();
                $listthongkep = loadall_thongke_phong();
                $listthongkedp = loadall_thongke_datphong();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listthongke = loadall_thongke_loaiphong();
                include "thongke/bieudo.php";
                break;
            case 'thoat':
                if (isset($_SESSION['user'])){
                    unset($_SESSION['user']);
                }
                header('Location:/duan1/view/max-themes.net/demos/hoteller/hoteller/boutique/index.php');
                break;
            default:
                include "home.php";
                break;
        }
    }
    include "home.php";

    include "footer.php";
// } else {
// }
