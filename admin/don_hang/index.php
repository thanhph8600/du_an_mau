<?php
require_once "../../global.php";
require_once "../../Dao/hang_hoa.php";
require_once "../../Dao/don_hang.php";

check_login();

extract($_REQUEST);

if (exist_parma('chi_tiet') && !empty($_POST)) {
    extract($_REQUEST);

    $order = don_hang_select_by_id($ma_order);
    $order_detail = chi_tiet_don_hang_select_by_ma_order($ma_order);
    $VIEW_NAME = "detail.php";
} elseif (exist_parma('xac_nhan') && !empty($_POST)) {

    $order = don_hang_select_by_id($ma_order);
    $order_detail = chi_tiet_don_hang_select_by_ma_order($ma_order);

    if($order['tinh_trang']<2 && $order['tinh_trang']!=0){
        don_hang_update_so_luong($ma_order,(int)$active);
    }elseif($order['tinh_trang'] < $active) {
        if ($order['tinh_trang'] != 0) {
            don_hang_update_so_luong($ma_order,(int)$active);
        }
    }
    var_dump($active);
    $order = don_hang_select_by_id($ma_order);
    $order_detail = chi_tiet_don_hang_select_by_ma_order($ma_order);
    $VIEW_NAME = "detail.php";
} else {
    $items = don_hang_select_all();
    $VIEW_NAME = "list.php";
}
require '../layout.php';
