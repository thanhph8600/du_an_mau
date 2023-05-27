<?php
require_once '../../Dao/PDO.php';

    function hang_hoa_insert($name,$price,$sale,$hinh,$date,$category,$dacbiet,$content) {
        $sql = "INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `ma_loai`, `dac_biet`, `so_luot_xem`, `mo_ta`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '', ?)";
        execute($sql,$name,$price,$sale,$hinh,$date,$category,$dacbiet,$content);
    }

    function hang_hoa_update($name,$price,$sale,$hinh,$date,$category,$dacbiet,$content,$ma_hh){

            $sql = "UPDATE `hang_hoa` SET `ten_hh` = ?, `don_gia` = ?, `giam_gia` = ?, `ngay_nhap` = ?, `ma_loai` = ?, `dac_biet` = ?, `mo_ta` = ?,`hinh`=? WHERE `ma_hh` = ?";

        execute($sql,$name,$price,$sale,$date,$category,$dacbiet,$content,$hinh,$ma_hh);
    }

    function hang_hoa_delete($ma_hh){
        $sql = "DELETE FROM `hang_hoa` WHERE `ma_hh` = '" . $ma_hh . "'";
        execute($sql);
    }

    function hang_hoa_select_all() {
        $sql = 'SELECT * FROM `hang_hoa`';
        return query($sql);
    }

    function hang_hoa_select_by_id($ma_hh) {
        $sql = "SELECT * FROM `hang_hoa` WHERE `ma_hh` = ?";
        return query_one($sql,$ma_hh);
    }

    function hang_hoa_exist($ma_loai){
        $sql = "SELECT count(*) FROM `hang_hoa` WHERE `ma_loai` = ?";
        return query_value($sql,$ma_loai);
    }

?>