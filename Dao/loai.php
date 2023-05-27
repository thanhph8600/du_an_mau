<?php
require_once '../../Dao/PDO.php';

    function loai_insert($ten_loai) {
        $sql = "INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES (NULL, '".$ten_loai."')";
        execute($sql);
    }

    function loai_update($ma_loai,$ten_loai){
        $sql = "UPDATE `loai` SET `ten_loai` = ? WHERE `loai`.`ma_loai` = ?";
        execute($sql,$ten_loai,$ma_loai);
    }

    function loai_delete($ma_loai){
        $sql = 'DELETE FROM `loai` WHERE `loai`.`ma_loai` = "' . $ma_loai . '"';
        execute($sql);
    }

    function loai_select_all() {
        $sql = 'SELECT * FROM `loai`';
        return query($sql);
    }

    function loai_select_by_id($ma_loai) {
        $sql = "SELECT * FROM `loai` WHERE `ma_loai` = ?";
        return query_one($sql,$ma_loai);
    }

    function loai_exist($ma_loai){
        $sql = "SELECT count(*) FROM `loai` WHERE `ma_loai` = '".$ma_loai."'";
        return query_value($sql);
    }

?>