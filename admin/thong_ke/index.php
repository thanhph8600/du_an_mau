<?php
require_once "../../global.php";
require_once "../../Dao/binh_luan.php";
require_once "../../Dao/thong_ke.php";


extract($_REQUEST);

if(exist_parma('chart',$_REQUEST)){
    $items = thong_ke_hang_hoa();
    $VIEW_NAME = 'chart.php';
}
else{
    $items = thong_ke_hang_hoa();
    $VIEW_NAME = 'list.php';
}

require '../layout.php';
