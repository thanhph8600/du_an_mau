<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once '../../Dao/binh_luan.php';

require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);



if( exist_parma('noi_dung')){
    $date = date_format(date_create(),'Y-m-d');
    binh_luan_insert($nhap_binh_luan,$_COOKIE['ma_kh'],$ma_hh,$date);
}
(empty($ma_hh)) ?  $ma_hh = '2' :  $ma_hh =  $ma_hh;
$sanpham = hang_hoa_select_by_id($ma_hh);
$binh_luan = binh_luan_select_by_hang_hoa($ma_hh);
$VIEW_NAME = 'chi_tiet_ui.php';

require "../layout.php";