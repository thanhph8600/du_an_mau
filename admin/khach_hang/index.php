<?php
require_once "../../global.php";
require_once "../../Dao/khach_hang.php";
extract($_REQUEST);

if (exist_parma("btn_add")) {
    $VIEW_NAME = "add.php";
}
// thêm
elseif (exist_parma("btn_insert")) {
    extract($_REQUEST);

    $trang_thai = (empty($trang_thai)) ? 0 : 1 ;
    $pass = md5($pass);
    $hinh = save_file('upload',$UPLOAD_URL);
    
    khach_hang_insert($pass,$name,$phone,$trang_thai,$hinh ,$email,$vai_tro);
    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
}
//sửa
elseif(exist_parma("btn_edit")){

    $khach_hang =  khach_hang_select_by_id($ma_kh);
    $VIEW_NAME = "edit.php";
}
elseif(exist_parma("btn_update")){
    extract($_REQUEST);

    $trang_thai = (empty($trang_thai)) ? 0 : 1 ;
    $pass = md5($pass);
    if(!empty($_FILES["upload"]["name"])){
        unlink($UPLOAD_URL.$hinh_cu);
        $hinh = save_file('upload',$UPLOAD_URL);
    }else{
        $hinh = $hinh_cu;
    }
    khach_hang_update($pass,$name,$phone,$trang_thai,$hinh,$email,$vai_tro,$ma_kh);
    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} 
//xóa
elseif (exist_parma("btn_delete")) {
    extract($_REQUEST);
    khach_hang_delete($ma_kh);
    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else {

    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
}

require '../layout.php';
