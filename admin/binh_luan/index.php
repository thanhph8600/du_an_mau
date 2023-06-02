<?php
require_once "../../global.php";
require_once "../../Dao/binh_luan.php";
require_once "../../Dao/thong_ke.php";
require_once "../../Dao/hang_hoa.php";


extract($_REQUEST);

if(exist_parma('btn_hang_hoa')){
    extract($_REQUEST);
    $items = binh_luan_select_by_hang_hoa($ma_hh);
    $VIEW_NAME = 'detail.php';
}elseif(exist_parma('btn_delete')){
    extract($_REQUEST);
    binh_luan_delete($ma_bl);
    $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    $items = binh_luan_select_by_hang_hoa($ma_hh);
    $name = hang_hoa_select_by_id($ma_hh);
    $VIEW_NAME = 'detail.php';
}
else{
    $items = thong_ke_binh_luan();
    $VIEW_NAME = 'list.php';

}

function ten_khach_hang_binh_luan($ma_kh){
    $sql = "SELECT kh.ho_ten FROM binh_luan bl JOIN khach_hang kh ON bl.ma_kh = kh.ma_kh WHERE bl.ma_kh = ?";
    return query_value($sql,$ma_kh);
}
require '../layout.php';
