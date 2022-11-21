<?php
    // session_start();
    // include "model/pdo.php";
    // include "model/loaihang.php";
    // include "model/hanghoa.php";
    // include "view/header.php";
    // include "global.php";
    // include "model/taikhoan.php";
    // include "model/giohang.php";


    // if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    // $spnew=loadall_hanghoa_home();
    // $dsdm=loadall_loaihang();
    // $dstop10=loadall_hanghoa_top10();

    // if((isset($_GET['act']))&&($_GET['act']!="")){
    //     $act=$_GET['act'];
    //     switch ($act){
    //         case 'giothieu':
    //             include "view/gioithieu.php";
    //             break;
    //         case 'lienhe':
    //             include "view/lienhe.php";
    //             break;
    //         case 'gopy':
    //             include "view/gopy.php";
    //             break;
    //         case 'hoidap':
    //             include "view/hoidap.php";
    //             break;
    //         case 'sanphamchitiet':
    //             if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
    //                 $id=$_GET['idsp'];
    //                 $onesp=loadone_hanghoa($id);
    //                 extract($onesp);
    //                 $sp_cungloai=load_sanpham_cungloai($id,$iddm);
    //                 include "view/sanphamchitiet.php";
    //             }else{
    //                 include "view/home.php";
    //             }
    //             break;
    //         case 'sanpham':
    //             if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
    //                 $kyw=$_POST['kyw'];
    //             }else{
    //                 $kyw="";
    //             }
    //             if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
    //                 $iddm=$_GET['iddm'];
    //             }else{
    //                 $iddm=0;
    //             }
    //             $dssp=loadall_hanghoa($kyw,$iddm);
    //             $tendm=load_tendm($iddm);
    //             include "view/sanpham.php";
    //             break;
    //         case 'dangky':
    //             if(isset($_POST['dangky'])&&($_POST['dangky'])){
    //                 $user=$_POST['user'];
    //                 $email=$_POST['email'];
    //                 $password=$_POST['password'];
    //                 $address=$_POST['address'];
    //                 $tel=$_POST['tel'];
    //                 $checkuser=checkuser($user,$password);
    //                 if(is_array($checkuser)){
    //                     $_SESSION['user']=$checkuser;
    //                     $thongbao="Tài khoản đã tồn tại!";
    //                 }else{
    //                     $thongbao="Đăng ký thành công.Vui lòng đăng nhập!";
    //                     insert_taikhoan($user,$email,$password,$tel,$address);
    //                 }
                    
    //             }
    //             include "view/taikhoan/dangky.php";
    //             break;
    //         case 'dangnhap':
    //             if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
    //                 $user=$_POST['user'];
    //                 $password=$_POST['password'];
    //                 $checkuser=checkuser($user,$password);
    //                 if(is_array($checkuser)){
    //                     $_SESSION['user']=$checkuser;
    //                     header('Location: index.php?act=index.php');
    //                 }else{
    //                     $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
    //                 }
                    
    //             }
    //             include "view/taikhoan/dangnhap.php";
    //             break;
    //         case 'edit_taikhoan':
    //             if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
    //                 $user=$_POST['user'];
    //                 $password=$_POST['password'];
    //                 $email=$_POST['email'];
    //                 $tel=$_POST['tel'];
    //                 $address=$_POST['address'];
    //                 $id=$_POST['id'];
    //                 update_taikhoan($id,$user,$password,$email,$address,$tel);
    //                 $_SESSION['user']=checkuser($user,$password);
    //                 header('Location: index.php?act=index.php');
    //             }
    //             include "view/taikhoan/edit_taikhoan.php";
    //             break;
    //         case 'quenmk':
    //             if(isset($_POST['send'])&&($_POST['send'])){
    //                 $email=$_POST['email'];
    //                 $checkemail=checkemail($email);
    //                 if(is_array($checkemail)){
    //                     $thongbao="Your password's: ".$checkemail['password'];
    //                 }else{
    //                     $thongbao="Email doesn't exist.";
    //                 }
    //             }
    //             include "view/taikhoan/quenmk.php";
    //             break;
    //         case 'logout':
    //             session_unset();
    //             header('Location: index.php');
    //             break;
    //         case 'addtocart':
    //             if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
    //                 $id=$_POST['id'];
    //                 $product_name=$_POST['product_name'];
    //                 $price=$_POST['price'];
    //                 $img=$_POST['img'];
    //                 $soluong=1;
    //                 $thanhtien=$soluong * $price;
    //                 $ngaydathang=date('h:i:sa d/m/D');
    //                 $spadd=[$id,$product_name,$img,$price,$soluong,$thanhtien];
    //                 array_push($_SESSION['mycart'],$spadd);
                    
    //             }
    //             include "view/cart/viewcart.php";
    //             break;
    //         case 'delcart':
    //             if(isset($_GET['idcart'])){
    //                 array_slice($_SESSION['mycart'],$_GET['idcart'],1);
    //             }else{
    //                 $_SESSION['mycart']=[];
    //             }
    //             header('Location: index.php?act=viewcart');
    //             break;
    //         case 'bill':
    //             include "view/cart/bill.php";
    //             break;
    //         case 'billcomfirm':
    //             if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
    //                 $iddonhang=$_POST['iddonhang'];
    //                 $user=$_POST['name'];
    //                 $email=$_POST['email'];
    //                 $address=$_POST['address'];
    //                 $ghichu=$_POST['ghichu'];
    //                 $ngaydathang=date('h:i:sa d/m/D');
    //                 $vanchuyen=$_POST['vanchuyen'];
    //                 $donhang=insert_giohang($iddonhang,$user,$address,$tel,$ghichu,$ngaydathang,$vanchuyen);
    //             }
    //             include "view/cart/billcomfirm.php";
    //             break;
    //         default:
    //             include "view/home.php";
    //             break;
    //     }
    // }else{
    //     include "view/home.php";
    // }
    
    // include "view/footer.php";
?>

              