<?php
require_once '../../Dao/PDO.php';

function thong_ke_hang_hoa() {
    $sql ="SELECT lo.ma_loai, lo.ten_loai, count(*) so_luong, MIN(hh.don_gia) gia_min, MAX(hh.don_gia) gia_max, AVG(hh.don_gia) gia_avg from hang_hoa hh join loai lo on lo.ma_loai = hh.ma_loai group by lo.ma_loai, lo.ten_loai";
    return query($sql);
}

function thong_ke_binh_luan() {
    $sql = "SELECT hh.ma_hh, hh.ten_hh, COUNT(*) so_luong, MIN(bl.ngay_bl) cu_nhat,MAX(bl.ngay_bl) moi_nhat FROM binh_luan bl JOIN hang_hoa hh ON hh.ma_hh = bl.ma_hh GROUP BY hh.ma_hh, hh.ten_hh HAVING so_luong > 0";

    return query($sql);
}