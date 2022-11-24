<?php
    function insert_datphong($id,$maphong,$makhachhang,$sokhach,$ngayden,$ngaytra,$tinhtrang){
        $sql = "INSERT INTO datphong(id_order,id_phong,id_user,sokhach,ngaydat,ngaytra,tinhtrang) values ('$id','$maphong','$makhachhang','$sokhach','$ngayden','$ngaytra','$tinhtrang')";
        pdo_execute($sql);
    }
    function delete_datphong($id){
        $sql="delete from datphong where id_order=".$id;
        pdo_execute($sql);
    }
    function loadall_datphong(){
        $sql="SELECT * FROM datphong order by id_order desc";
        $listdp=pdo_query($sql);
        return $listdp; 
    }
    function loadall_datphong_timkiem($id_phong){
        $sql= "select DISTINCT phong.id_phong,phong.name_phong,phong.img,phong.sokhach,phong.price,phong.id_loaiphong,datphong.tinhtrang from phong
             ,datphong where phong.id_phong !=".$id_phong;
        $listsearch=pdo_query($sql);
        return $listsearch;
    }
    function loadone_datphong($id){
        $sql="select * from datphong where id_order=".$id;
        $dp=pdo_query_one($sql);
        return $dp;
    }
    function update_datphong($id,$maphong,$makhachhang,$sokhach,$ngayden,$ngaytra,$tinhtrang){
        $sql="UPDATE datphong
            SET id_phong = $maphong,id_user = '$makhachhang',sokhach = '$sokhach',ngayden = '$ngayden',ngaytra = '$ngaytra',tinhtrang = '$tinhtrang'
            WHERE id_order=$id";
        pdo_execute($sql);
    }
?>