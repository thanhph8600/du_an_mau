<?php

include '../Dao/PDO.php';
include '../global.php';
if(!empty($_POST)){
    if($_POST['name'] == 'dangky') {
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $pass = md5($_POST['pass']);

        $sql = "SELECT * from `khach_hang` where `email` = '".$email."'";
        $checkEmail =  query_one($sql);
        if(empty($checkEmail)){
            $sql = "INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `sdt`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES (NULL, '".$pass."', '".$ten."', '".$sdt."', b'1', NULL, '".$email."', b'0')";
            execute($sql);
            setcookie('user',$email, time() + (86400 * 30), "/");
            echo 'ok';
        }else {
            echo 'Email đã tồn tại';
        }
    }

    if($_POST['name'] == 'dangnhap'){
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);

        $sql = "SELECT * FROM `khach_hang` WHERE `email` = '".$email."' AND `mat_khau` = '".$pass."'";
        $check  = query_one($sql);
        if(!empty($check)){
            add_cookie('user',$email,1);
            add_cookie('ma_kh',$check['ma_kh'],1);
            echo 'ok';
        }else {
            echo 'Email hoặc mật khẩu không chính xác!';
        }
    }

    if($_POST['name'] == 'dangXuat'){
        delete_cookie('user');
    }
}