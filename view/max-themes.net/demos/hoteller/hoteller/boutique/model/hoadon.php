<?php
 function loadall_hoadon(){
    $query="SELECT * FROM hoadon order by id_bill desc";
    $listhd=pdo_query($query);
    return $listhd;
}
function delete_hoadon($id){
    $sql="delete from hoadon where id_bill=".$id;
    pdo_execute($sql);
}
?>