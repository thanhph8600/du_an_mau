<?php
require_once '../../Dao/PDO.php';

function don_hang_insert($ma_order, $ma_kh, $name, $email, $phone, $address, $tong_tien, $ngay_mua, $tinh_trang)
{
    $sql = "INSERT INTO `order`(`ma_order`, `ma_kh`, `ten_kh`, `email`, `sdt`, `address`, `tong_tien`, `ngay_mua`, `tinh_trang`) VALUES (?,?,?,?,?,?,?,?,?)";
    execute($sql, $ma_order, $ma_kh, $name, $email, $phone, $address, $tong_tien, $ngay_mua, $tinh_trang);
}


function don_hang_chi_tiet_insert($id_order, $ma_hh, $so_luong)
{
    $sql = "INSERT INTO `order_detail`( `ma_order`, `id_hang_hoa`, `so_luong`) VALUES (?,?,?)";
    execute($sql, $id_order, $ma_hh, $so_luong);
}

function don_hang_update_so_luong($ma_order,$active){
    $sql= "UPDATE `order` SET `tinh_trang` = '".$active."' WHERE `order`.`ma_order` = '".$ma_order."'";
    execute($sql);
}

function don_hang_select_by_id($ma_order)
{
    $sql = "SELECT * FROM `order` WHERE ma_order = ?";
    return query_one($sql, $ma_order);
}

function don_hang_select_all()
{
    $sql = "SELECT * FROM `order`";
    return query($sql);
}

function don_hang_select_by_ma_kh($ma_kh)
{
    $sql = "SELECT * FROM `order` WHERE ma_kh = ?";
    return query($sql, $ma_kh);
}

function chi_tiet_don_hang_select_by_ma_order($ma_order)
{
    $sql = "SELECT * FROM `order_detail` WHERE ma_order = ?";
    return query($sql, $ma_order);
}


function tinh_trang_don_hang($tinh_trang)
{
    switch ($tinh_trang) {
        case 1:
            $tinh_trang = '<span  class=" text-dark p-2 rounded-3 fw-bold ">Chờ xác nhận</span>';
            break;
        case 2:
            $tinh_trang = '<span class="  text-light  bg-secondary p-2 rounded-3 fw-bold text-white rounded-md bg-gray-400">Chờ lấy hàng</span>';
            break;
        case 3:
            $tinh_trang =  '<span  class="  text-light p-2  bg-success rounded-3 fw-bold text-white rounded-md bg-green-500">Đang giao</span>';
            break;
        case 4:
            $tinh_trang = '<span  class=" text-light bg-primary bg-rose-600 p-2 rounded-3 fw-bold  text-white rounded-md ">Đã giao</span>';
            break;
        case 0:
            $tinh_trang = '<span style="background:black" class=" text-light text-white rounded-md  p-2 rounded-3 fw-bold ">Đã hủy</span>';
            break;


        default:
        $tinh_trang = '<span style="background:black" class=" text-light  p-2 rounded-3 fw-bold ">Đã hủy</span>';
            break;
    }
    return $tinh_trang;
}
