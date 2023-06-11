<?php
require_once '../../Dao/PDO.php';

function binh_luan_insert($noi_dung,$ma_kh,$ma_hh,$date,$vote){
    $sql = "INSERT INTO `binh_luan` ( `noi_dung`, `ma_kh`, `ma_hh`, `ngay_bl`,`vote`) VALUES ( ? , ? ,? ,?,?)";
    execute($sql,$noi_dung,$ma_kh,$ma_hh,$date,$vote);
}

function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM `binh_luan` WHERE `ma_bl` = ?";
    execute($sql,$ma_bl);
}

function binh_luan_exist($ma_hh){
    $sql = "SELECT count(*) FROM `binh_luan` WHERE `ma_hh` = ?";
    return query_value($sql,$ma_hh);
}

function binh_luan_select_by_hang_hoa($ma_hh) {
    $sql = "SELECT kh.ho_ten,kh.hinh, b.* , h.ten_hh FROM binh_luan b join hang_hoa h on h.ma_hh = b.ma_hh join khach_hang kh on b.ma_kh = kh.ma_kh where b.ma_hh=? order by ngay_bl desc" ;
    return query($sql,$ma_hh);
}
?>