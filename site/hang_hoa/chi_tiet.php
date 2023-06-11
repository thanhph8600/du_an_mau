<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once '../../Dao/binh_luan.php';

require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);



if( exist_parma('noi_dung')){
    $date = date_format(date_create(),'Y-m-d');
    binh_luan_insert($nhap_binh_luan,$_COOKIE['ma_kh'],$ma_hh,$date,$voite);
}

$sanpham = hang_hoa_select_by_id($ma_hh);
$binh_luan = binh_luan_select_by_hang_hoa($ma_hh);
$tong_bl = binh_luan_exist($ma_hh);

$VIEW_NAME = 'chi_tiet_ui.php';

//thêm lượt xem
$top10 = hang_hoa_select_top10_where_ma_loai($sanpham['ma_loai']);
$TOP10 = '../layout/top10.php';

$so_luot_xem = $sanpham['so_luot_xem'] + 1;
hang_hoa_up_luot_xem($so_luot_xem,$ma_hh);

require "../layout.php";