<?php
require_once '../../Dao/PDO.php';

function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM `binh_luan` WHERE `ma_bl` = ?";
    execute($sql,$ma_bl);
}


function binh_luan_select_by_hang_hoa($ma_hh) {
    $sql = "SELECT b.* , h.ten_hh FROM binh_luan b join hang_hoa h on h.ma_hh = b.ma_hh where b.ma_hh=? order by ngay_bl desc" ;
    return query($sql,$ma_hh);
}
?>