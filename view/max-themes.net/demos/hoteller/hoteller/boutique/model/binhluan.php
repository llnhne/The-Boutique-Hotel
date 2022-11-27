<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan(){
        $query="SELECT * FROM binhluan order by id_comment desc";
        $listbl=pdo_query($query);
        return $listbl;
    }
    function delete_binhluan($id){
        $sql="delete from binhluan where id_comment=".$id;
        pdo_execute($sql);
    }
    function loadone_binhluan($id){
        $sql="select * from binhluan where id=".$id;
        $bl=pdo_query_one($sql);
        return $bl;
    }
    function update_binhluan($id,$noidung){
        $sql="update binhluan set noidung='".$noidung."' where id=".$id;
        pdo_execute($sql);
    }
?>