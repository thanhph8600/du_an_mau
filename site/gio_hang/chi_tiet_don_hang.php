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

    $VIEW_NAME= "../gio_hang/don_hang.php";

require "../layout.php";
