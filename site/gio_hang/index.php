<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/address.php";
require_once "../../Dao/don_hang.php";
require_once "../../Dao/hang_hoa.php";
extract($_REQUEST);

if(exist_parma('thanh_toan')){
    $tinh = render_Tinh();
    $VIEW_NAME ='../gio_hang/thanh_toan.php';
}
elseif(exist_parma('chi_tiet_don_hang')){
   global $order_detail;
    $ma_order = $_GET['ma_order'];
    $order = don_hang_select_by_id($ma_order);
    $order_detail = chi_tiet_don_hang_select_by_ma_order($ma_order);

    $MESS= '<div class="bg-green-100 rounded-md border border-green-500 text-green-700 px-4 py-3" role="alert">
    <p class="font-bold text-xl">Thanh toán thành công</p>
    <p class="text-lg">cảm ơn bạn đã mua hàng của chúng tôi</p>
  </div>';
    $VIEW_NAME= "../gio_hang/don_hang.php";
}elseif(exist_parma('list')){

    if(!empty($_SESSION['user'])){
        $don_hang = don_hang_select_by_ma_kh($_SESSION['user']['ma_kh']);
    }else{

    }
    $VIEW_NAME = "../gio_hang/don_hang.php";

}
else{
    $VIEW_NAME ='../gio_hang/gio_hang.php';

}
$user ='';
if(!empty($_SESSION['user'])){
    $user = $_SESSION['user'];
}

require "../layout.php";