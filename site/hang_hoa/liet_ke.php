<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);
if(exist_parma('ma_loai')){
    $item = hang_hoa_select_by_ma_loai($ma_loai);
    $tong_sp = hang_hoa_exist($ma_loai);
    $ten_sp = loai_select_by_id($ma_loai);
}elseif(exist_parma('keyword',extract($_REQUEST))){
    $item = hang_hoa_select_keyword($keyword);
    $tong_sp = so_luong_hang_hoa_keyword($keyword);
    $ten_sp['ten_loai'] = $keyword;
}
elseif(exist_parma('seach_keyword',extract($_REQUEST))){
    $seach = $keyword;
    $item = hang_hoa_select_keyword($keyword);
    foreach ($item as $value) {
        echo $vaule['ten_hh'];
    }
    die;

}
else{
    $item = hang_hoa_select_all();
    $tong_sp =  so_luong_hang_hoa();
    $ten_sp['ten_loai'] = 'Tất cả sản phẩm';

}
$VIEW_NAME = 'liet_ke_ui.php';

require "../layout.php";