<?php
    function insert_taikhoan($username,$email,$password,$tel,$address){
        $sql="INSERT INTO taikhoan(username,email,password,tel,address) values('$username','$email','$password','$tel','$address')";
        pdo_execute($sql);
    }
    function checkuser($username,$password){
        $sql="select * from taikhoan where username='".$username."' and password='".$password."' ";
        $kq=pdo_query($sql);
        if(count($kq)>0) return $kq[0]['role'];
        else return 0;
    }
    function delete_taikhoan($id){
        $sql="delete from taikhoan where id_user=".$id;
        pdo_execute($sql);
    }
    function loadone_taikhoan($id){
        $sql="select * from taikhoan where id_user=".$id;
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function checkemail($email){
        $sql="select * from taikhoan where email='".$email."' ";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function update_taikhoan($id,$user,$password,$email,$address,$tel){
        $sql="UPDATE taikhoan
            SET username = '$user', password = $password,email = '$email',address = '$address',tel = $tel
            WHERE id_user=$id";
        pdo_execute($sql);
    }
    function loadall_taikhoan($kyw){
        $sql="SELECT * FROM taikhoan where 1";
        if($kyw!=""){
            $sql.=" and username like '%".$kyw."%'";
        }
        $sql.=" order by id_user desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
?>