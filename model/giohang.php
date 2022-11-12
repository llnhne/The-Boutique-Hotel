<?php
    function insert_giohang($iddonhang,$user,$address,$tel,$ghichu,$ngaydathang,$vanchuyen){
        $sql="insert into giohang(iddonhang,user,address,tel,ghichu,ngaydathang,vanchuyen) values('$iddonhang','$user','$address','$tel','$ghichu','$ngaydathang','$vanchuyen')";
        pdo_execute($sql);
    }
    function loadall_donhang(){
        $sql="SELECT * FROM giohang order by iddonhang desc";
        $listdh=pdo_query($sql);
        return $listdh;
    }
    function delete_donhang($iddonhang){
        $sql="delete from giohang where iddonhang=".$iddonhang;
        pdo_execute($sql);
    }
    function loadall_thongke(){
        $sql= "select danhmuc.id as madm,danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
        $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
        $sql.=" group by danhmuc.id order by danhmuc.id desc";
        $listthongke=pdo_query($sql);
        return $listthongke;
    }
?>