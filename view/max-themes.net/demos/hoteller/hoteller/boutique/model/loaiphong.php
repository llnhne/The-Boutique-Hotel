<?php
    function insert_loaiphong($tenloaiphong){
        $sql="INSERT INTO loaiphong(name_loaiphong) values('$tenloaiphong')";
        pdo_execute($sql);
    }
    function delete_loaiphong($id){
        $query="update phong set id_loaiphong = 1 where id_loaiphong=".$id;
        pdo_execute($query);
        $sql="delete from loaiphong where id_loaiphong=".$id;
        pdo_execute($sql);
    }
    function loadall_loaiphong_ourrooms($id){   
        $sql="select * from loaiphong";
        if($id>1)
        $sql.=" order by id_loaiphong asc";
        $listlp=pdo_query($sql);
        return $listlp;

}
    function loadone_loaiphong($id){
        $sql="select * from loaiphong where id_loaiphong=".$id;
        $lp=pdo_query_one($sql);
        return $lp;
    }
    function update_loaiphong($id,$tenloaiphong){
        $sql="update loaiphong set name_loaiphong='".$tenloaiphong."' where id_loaiphong=".$id;
        pdo_execute($sql);
    }
?>