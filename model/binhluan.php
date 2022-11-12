<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro){
        $sql="select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idpro='".$idpro."'";
        $sql.=" order by id desc";
        $listbl=pdo_query($sql);


        return $listbl;


        
    }
    function delete_binhluan($id){
        $sql="delete from binhluan where id=".$id;
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