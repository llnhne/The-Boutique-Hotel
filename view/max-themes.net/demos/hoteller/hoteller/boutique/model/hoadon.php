<?php
    function insert_hoadon($id, $id_phong,$id_user,$tongtien,$role){
        $sql = "INSERT INTO hoadon(id_order,id_phong,id_user,tongtien,role) values('$id', '$id_phong','$id_user','$tongtien','$role')";
        pdo_execute($sql);
    }
    function loadall_hoadon(){
        $query="SELECT * FROM hoadon order by id_bill desc";
        $listhd=pdo_query($query);
        return $listhd;
    }
    function delete_hoadon($id){
        $sql="delete from hoadon where id_bill=".$id;
        pdo_execute($sql);
    }
    function loadone_hoadon(){
        $sql="select tongtien from datphong inner join hoadon on hoadon.id_order = datphong.id_order";
        pdo_query_one($sql);
    }

?>