<?php
require_once "../../global.php";
require_once "../../Dao/binh_luan.php";
require_once "../../Dao/thong_ke.php";
require_once "../../Dao/don_hang.php";
check_login();


extract($_REQUEST);

if(exist_parma('chart_loai',$_REQUEST)){
    $items = thong_ke_hang_hoa();
    $VIEW_NAME = 'chart_loai.php';
}elseif(exist_parma('chart_don_hang',$_REQUEST)){
    $don_hang =  thong_ke_don_hang();
    $VIEW_NAME = 'chart_don_hang.php';
}
else{
    $items = thong_ke_hang_hoa();
    $don_hang =  thong_ke_don_hang();
    $VIEW_NAME = 'detail.php';
}

require '../layout.php';
