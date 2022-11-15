<?php
    function loadall_hotro($id){
        $sql="select * from hotro where 1";
        if($id>0) $sql.=" AND id_hotro='".$id."'";
        $sql.=" order by id_hotro desc";
        $listhotro=pdo_query($sql);
        return $listhotro;   
    }

?>