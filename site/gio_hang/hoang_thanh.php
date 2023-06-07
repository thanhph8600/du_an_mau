<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/address.php";
require_once "../../Dao/don_hang.php";
extract($_REQUEST);

$tinh = tinh_select_by_id($tinh);
$quan = quan_select_by_id($quan);
$xa = xa_select_by_id($xa);
$address =$address  .', '. $xa['_name'].', ' .$quan['_name'].', '.$tinh['_name'];
$date = date('Y-m-d', time());
$ma_order = strtoupper(substr(md5(time()), 0, 6)) ;
don_hang_insert($ma_order,$ma_kh,$name,$email,$phone,$address,(int)$tong_tien,$date,1);

foreach ($favorites as  $value) {
    don_hang_chi_tiet_insert($ma_order ,$value['id'],$value['so_luong']);
}
echo $ma_order;