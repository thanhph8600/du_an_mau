<?php
require_once "../../global.php";
require_once "../../Dao/binh_luan.php";
require_once "../../Dao/thong_ke.php";
require_once "../../Dao/hang_hoa.php";
require_once "../../Dao/don_hang.php";
require_once "../../Dao/khach_hang.php";
require_once "../../Dao/loai.php";
check_login();


$order = don_hang_select_all();
$tong_don_hang = don_hang_count();
$tong_loai_hang = loai_count();
$tong_hang_hoa = so_luong_hang_hoa();
$tong_khach_hang = khach_hang_count();
$khach_hang =  khach_hang_moi();
$binh_luan = binh_luan_moi();
$tong_tien = 0;
foreach($order as $value){
    $tong_tien += $value['tong_tien'];
}
$items = thong_ke_hang_hoa();
$VIEW_NAME = 'dashboard.php';
function value_vote($vote){
    return select_so_luong_nhan_xet($vote) ;
}
require '../layout.php';
