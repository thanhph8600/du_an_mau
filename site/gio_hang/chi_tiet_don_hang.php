<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/address.php";
require_once "../../Dao/don_hang.php";
require_once "../../Dao/hang_hoa.php";
extract($_REQUEST);

$ma_order = $_GET['ma_order'];
$order = don_hang_select_by_id($ma_order);
$order_detail = chi_tiet_don_hang_select_by_ma_order($ma_order);
if (!empty($_GET['thanh_cong']) || exist_parma('thanh_cong')) {
  $MESS = '<div class="bg-green-100 rounded-md border border-green-500 text-green-700 px-4 py-3" role="alert">
              <p class="font-bold text-xl">Thanh toán thành công</p>
              <p class="text-lg">cảm ơn bạn đã mua hàng của chúng tôi</p>
          </div>';
}


$VIEW_NAME = "../gio_hang/don_hang.php";

require "../layout.php";
