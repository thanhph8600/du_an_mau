<?php
require_once '../../Dao/PDO.php';
    function khach_hang_insert($ma_kh,$pass,$name,$phone,$trang_thai,$hinh,$email,$vai_tro) {
        $sql = "INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `sdt`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES (?,  ? , ? ,   ? , ? ,  ? ,  ? , ?)";
        pdo_execute($sql,$ma_kh,$pass,$name,$phone,$trang_thai,$hinh,$email,$vai_tro);
    }

    function khach_hang_update($pass,$name,$phone,$trang_thai,$hinh,$email,$vai_tro,$ma_kh){
        $sql = "UPDATE `khach_hang` SET `mat_khau` = ? , `ho_ten` = ? , `sdt` = ? , `kich_hoat` = ? , `hinh` = ? , `email` = ? , `vai_tro` = ? WHERE `khach_hang`.`ma_kh` = ?";
        pdo_execute($sql,$pass,$name,$phone,$trang_thai,$hinh,$email,$vai_tro,$ma_kh);
    }

    function khach_hang_delete($ma_kh){
        $sql = 'DELETE FROM `khach_hang` WHERE `ma_kh` = ?';
        pdo_execute($sql,$ma_kh);
    }

    function khach_hang_select_all() {
        $sql = 'SELECT * FROM `khach_hang`';
        return pdo_query($sql);
    }
    function khach_hang_moi() {
        $sql = 'SELECT * FROM `khach_hang` ORDER by ma_kh DESC LIMIT 6';
        return pdo_query($sql);
    }


    function khach_hang_select_by_id($ma_kh) {
        $sql = "SELECT * FROM `khach_hang` WHERE `ma_kh` = ?";
        return pdo_query_one($sql,$ma_kh);
    }

    function khach_hang_select_by_email($email) {
        $sql = "SELECT * FROM `khach_hang` WHERE `email` = ?";
        return pdo_query_one($sql,$email);
    }

    function khach_hang_exist($ma_kh){
        $sql = "SELECT count(*) FROM `khach_hang` WHERE `ma_kh` = '".$ma_kh."'";
        return pdo_query_value($sql);
    }

    function khach_hang_count(){
        $sql = "SELECT count(*) FROM `khach_hang` ";
        return pdo_query_value($sql);
    }

    function khach_hang_doi_mat_khau($newpass,$ma_kh){
        $sql ="UPDATE `khach_hang` SET `mat_khau` = ? WHERE `khach_hang`.`ma_kh` = ?";
        pdo_execute($sql,$newpass,$ma_kh);
    }

    function khach_hang_cap_nhat_tai_khoan($name,$phone,$hinh,$email,$ma_kh){
        $sql = "UPDATE `khach_hang` SET  `ho_ten` = ? , `sdt` = ? , `hinh` = ? , `email` = ?  WHERE `khach_hang`.`ma_kh` = ?";
        pdo_execute($sql,$name,$phone,$hinh,$email,$ma_kh);
    }
?>