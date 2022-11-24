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
        $sql= "select loaiphong.id_loaiphong as malp,loaiphong.name_loaiphong as tenlp, count(phong.id_phong) as countp, min(phong.price) as minprice, max(phong.price) as maxprice, avg(phong.price) as avgprice";
        $sql.=" from phong left join loaiphong on loaiphong.id_loaiphong=phong.id_loaiphong";
        $sql.=" group by loaiphong.id_loaiphong order by loaiphong.id_loaiphong desc";
        $listthongke=pdo_query($sql);
        return $listthongke;
    }
?>