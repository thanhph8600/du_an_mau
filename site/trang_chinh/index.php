<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);
if(exist_parma('gioi_thieu',extract($_REQUEST))){
    $VIEW_NAME = 'gioi_thieu.php';
    
}else {
    $gio_vang = hang_hoa_select_giam_nhieu();
    $gia_re = hang_hoa_select_gia_thap();
    $goi_y = hang_hoa_select_ngau_nhien();
    $VIEW_NAME = 'home.php';
    $TOP10 = '../layout/top10.php';
}
$top10 = hang_hoa_select_top10();

require "../layout.php";
